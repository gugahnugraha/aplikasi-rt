<button class="btn btn-primary" data-toggle="modal" data-target="#tagihan">Buat Tagihan Iuran Bulanan</button>
<br><br>
<?php foreach ($i as $a) { ?>
    <div class="card">
        <div class="header bg-blue">Data Iuran Bulanan, Tahun <?php echo $a->tahun; ?></div>
        <div class="body">
            <!--  -->

            <!-- Nav tabs -->
            <div class="alert bg-orange">
                Data Belum Bayar
            </div>

            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <?php foreach (get_bulan_iuran($a->tahun) as $b) { ?>
                    <li role="presentation"><a href="#<?php echo $b->bulan . $b->tahun; ?>" data-toggle="tab"><?php echo $b->bulan; ?></a></li>
                <?php }; ?>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <?php foreach (get_bulan_iuran($a->tahun) as $b) { ?>
                    <div role="tabpanel" class="tab-pane fade in" id="<?php echo $b->bulan . $b->tahun; ?>">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Rumah</th>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                foreach ($tampil as $c) : $no++; ?>
                                    <?php if (cek_tagihan_current($b->id_b_iuran, $c->no_ktp) == NULL) { ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $c->nama_lengkap; ?></td>
                                            <td><?php echo $c->no_rumah; ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php endforeach; ?>
                                
                            </tbody>
                        </table>
                    </div>
                <?php }; ?>
            </div>
            <!--  -->
            <!--  -->
            <!-- Nav tabs -->
            <div class="alert bg-green">
                Data Sudah Bayar
            </div>
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <?php foreach (get_bulan_iuran($a->tahun) as $b) { ?>
                    <li role="presentation"><a href="#sudah<?php echo $b->bulan . $b->tahun; ?>" data-toggle="tab"><?php echo $b->bulan; ?></a></li>
                <?php }; ?>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <?php foreach (get_bulan_iuran($a->tahun) as $b) { ?>
                    <div role="tabpanel" class="tab-pane fade in" id="sudah<?php echo $b->bulan . $b->tahun; ?>">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Rumah</th>
                                <th>Nominal</th>
                                <!-- <th>Status</th> -->
                                <th>Bukti</th>
                                <!-- <th>Tindakan</th> -->
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                foreach (get_ktp_iuran($b->id_b_iuran) as $c) : $no++; ?>
                                    <?php if (get_ktp_iuran($b->id_b_iuran) != null) { ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $c->nama_lengkap; ?></td>
                                            <td><?php echo $c->no_rumah; ?></td>
                                            <td><?php echo rupiah($c->besaran); ?></td>
                                            <!-- <td><?php echo $c->status; ?></td> -->
                                            <td><a href="<?php echo base_url('assets/upload/' . $c->no_ktp . '/' . $c->bukti); ?>" class="btn btn-primary" target="_blank">Lihat</a></td>
                                            <!-- <td>
                                                <form method="post" action="<?php echo site_url('Panel_rt/konfirmasi/' . $c->id_b_iuran); ?>"> <button type="submit" class="btn btn-warning  btn-block">Konfirmasi</button></form>
                                            </td> -->
                                        </tr>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php }; ?>
            </div>
            <!--  -->
        </div>
    </div>
<?php }; ?>
<form action="<?php echo site_url('Panel_rt/buat_tagihan'); ?>" method="post">
    <div class="modal fade" id="tagihan" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Buat Tagihan Iuran Bulanan</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="bulan" class="form-control" required>
                            <label class="form-label">Nama Tagihan / Nama Bulan</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>
                </div>
            </div>
        </div>
    </div>
</form>