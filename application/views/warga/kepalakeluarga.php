<div class="card">
    <div class="header">
        <h2>DAFTAR KEPALA KELUARGA RT 05 (<?php echo $jml; ?> KEPALA KELUARGA TERDAFTAR)</h2>
        <!-- <a data-toggle="modal" data-target="#tambah" class="btn btn-warning">Tambah Warga</a> -->
    </div>

    <div class="body">

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                <thead>
                    <th width="3px">No</th>
                    <th>Nama Kepala Keluarga</th>
                    <th>Umur</th>
                    <th>Whatsapp</th>
                    <th>Status Tinggal</th>
                    <th>Blok/No. Rumah</th>
                    <!-- <th>Detail</th> -->
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($w as $a) : $no++; ?>
                        <tr>
                            <td><?php echo $no; ?></td>

                            <td><?php echo $a->nama_lengkap; ?> <?php if ($a->role != 'warga') {
                                                                    echo "<label class='label bg-green'>" . strtoupper($a->role) . "</label>";
                                                                } ?></td>
                            <td><?php echo hitung_umur($a->tgl_lahir); ?> Tahun</td>
                            <td><?php echo $a->no_kontak; ?></td>
                            <td><?php echo $a->status_tinggal; ?></td>
                            <td><?php echo $a->no_rumah; ?></td>

                            <!-- <td><?php if ($this->session->userdata('role') != 'Ketua' and $this->session->userdata('role') != 'Sekretaris') {
                                        } else { ?><a href="<?php echo site_url('Warga/profil/' . $a->no_ktp); ?>" class="btn bg-green waves-effect"><i class="material-icons">visibility</i></a><?php if ($a->role == 'Ketua' or $a->role == 'Bendahara' or $a->role == 'Sekretaris') { ?>
										<?php if ($a->role == 'Bendahara') { ?>
											<a href="<?php echo site_url('Panel_rt/hapus_bendahara/' . $a->id_user); ?>" class="btn bg-orange">Hapus Bendahara</a>
										<?php } ?>
										<?php if ($a->role == 'Sekretaris') { ?>
											<a href="<?php echo site_url('Panel_rt/hapus_sekretaris/' . $a->id_user); ?>" class="btn bg-orange">Hapus Sekretaris</a>
										<?php } ?>

									<?php } else { ?> <?php if (get_pengurus_rt($a->rt, 'Bendahara')->num_rows() > 0) {
                                                                                                                                                                                                        } else { ?>
											<a href="<?php echo site_url('Panel_rt/jadikan_bendahara/' . $a->id_user); ?>" class="btn bg-blue">Jadikan Bendahara</a>
										<?php } ?>
										<?php if (get_pengurus_rt($a->rt, 'Sekretaris')->num_rows() > 0) {
                                                                                                                                                                                                        } else { ?>
											<a href="<?php echo site_url('Panel_rt/jadikan_sekretaris/' . $a->id_user); ?>" class="btn bg-orange">Jadikan Sekretaris</a><?php }
                                                                                                                                                                                                    }
                                                                                                                                                                                                } ?></td> -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<form action="<?php echo site_url('Panel_rt/tambah_warga/'); ?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Tambah Warga</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="rt" value="<?php echo $id; ?>">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="no_ktp" class="form-control" required>
                            <label class="form-label">NIK</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="nama_lengkap" class="form-control" required>
                            <label class="form-label">Nama Lengkap</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="email_warga" class="form-control">
                            <label class="form-label">Email</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="sex" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Marital Status</label>
                        <select name="marital" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Kawin">Kawin</option>
                            <option value="Cerai Hidup">Cerai Hidup</option>
                            <option value="Cerai Mati">Cerai Mati</option>
                        </select>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" name="password" class="form-control" required>
                            <label class="form-label">Password</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="tempat_lahir" class="form-control" required>
                            <label class="form-label">Tempat Lahir</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">Tanggal Lahir</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">date_range</i>
                            </span>
                            <div class="form-line">
                                <input type="date" name="tgl_lahir" class="form-control" placeholder="yyyy-MM-dd">
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="form-label">Agama</label>
                        <select name="agama" required class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="Islam">Islam</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Katholik">Katholik</option>
                            <option value="Konghucu">Konghucu</option>
                            <option value="Kepercayaan">Kepercayaan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Blok/No. Rumah</label>
                        <select name="no_rumah" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <option value="N7. No.01">N7. No.01</option>
                            <option value="N7. No.02">N7. No.02</option>
                            <option value="N7. No.03">N7. No.03</option>
                            <option value="N7. No.04">N7. No.04</option>
                            <option value="N7. No.05">N7. No.05</option>
                            <option value="N7. No.06">N7. No.06</option>
                            <option value="N7. No.07">N7. No.07</option>
                            <option value="N7. No.08">N7. No.08</option>
                            <option value="N7. No.09">N7. No.09</option>
                            <option value="N7. No.10">N7. No.10</option>
                            <option value="N7. No.11">N7. No.11</option>
                            <option value="N7. No.12">N7. No.12</option>
                            <option value="N7. No.12A">N7. No.12A</option>
                            <option value="N7. No.14">N7. No.14</option>
                            <option value="N7. No.15">N7. No.15</option>
                            <option value="N7. No.16">N7. No.16</option>

                            <option value="N8. No.01">N8. No.01</option>
                            <option value="N8. No.02">N8. No.02</option>
                            <option value="N8. No.03">N8. No.03</option>
                            <option value="N8. No.04">N8. No.04</option>
                            <option value="N8. No.05">N8. No.05</option>
                            <option value="N8. No.06">N8. No.06</option>
                            <option value="N8. No.07">N8. No.07</option>
                            <option value="N8. No.08">N8. No.08</option>
                            <option value="N8. No.09">N8. No.09</option>
                            <option value="N8. No.10">N8. No.10</option>
                            <option value="N8. No.11">N8. No.11</option>
                            <option value="N8. No.12">N8. No.12</option>
                            <option value="N8. No.12A">N8. No.12A</option>
                            <option value="N8. No.14">N8. No.14</option>
                            <option value="N8. No.15">N8. No.15</option>
                            <option value="N8. No.16">N8. No.16</option>

                            <option value="N9. No.01">N9. No.01</option>
                            <option value="N9. No.02">N9. No.02</option>
                            <option value="N9. No.03">N9. No.03</option>
                            <option value="N9. No.04">N9. No.04</option>
                            <option value="N9. No.05">N9. No.05</option>
                            <option value="N9. No.06">N9. No.06</option>
                            <option value="N9. No.07">N9. No.07</option>
                            <option value="N9. No.08">N9. No.08</option>
                            <option value="N9. No.09">N9. No.09</option>
                            <option value="N9. No.10">N9. No.10</option>
                            <option value="N9. No.11">N9. No.11</option>
                            <option value="N9. No.12">N9. No.12</option>
                            <option value="N9. No.12A">N9. No.12A</option>
                            <option value="N9. No.14">N9. No.14</option>
                            <option value="N9. No.15">N9. No.15</option>
                            <option value="N9. No.16">N9. No.16</option>

                            <option value="N10. No.01">N10. No.01</option>
                            <option value="N10. No.02">N10. No.02</option>
                            <option value="N10. No.03">N10. No.03</option>
                            <option value="N10. No.04">N10. No.04</option>
                            <option value="N10. No.05">N10. No.05</option>
                            <option value="N10. No.06">N10. No.06</option>
                            <option value="N10. No.07">N10. No.07</option>
                            <option value="N10. No.08">N10. No.08</option>
                            <option value="N10. No.09">N10. No.09</option>
                            <option value="N10. No.10">N10. No.10</option>
                            <option value="N10. No.11">N10. No.11</option>
                            <option value="N10. No.12">N10. No.12</option>
                            <option value="N10. No.12A">N10. No.12A</option>
                            <option value="N10. No.14">N10. No.14</option>
                            <option value="N10. No.15">N10. No.15</option>
                            <option value="N10. No.16">N10. No.16</option>

                            <option value="N11. No.01">N11. No.01</option>
                            <option value="N11. No.02">N11. No.02</option>
                            <option value="N11. No.03">N11. No.03</option>
                            <option value="N11. No.04">N11. No.04</option>
                            <option value="N11. No.05">N11. No.05</option>
                            <option value="N11. No.06">N11. No.06</option>
                            <option value="N11. No.07">N11. No.07</option>
                            <option value="N11. No.08">N11. No.08</option>
                            <option value="N11. No.09">N11. No.09</option>
                            <option value="N11. No.10">N11. No.10</option>
                            <option value="N11. No.11">N11. No.11</option>
                            <option value="N11. No.12">N11. No.12</option>
                            <option value="N11. No.12A">N11. No.12A</option>
                            <option value="N11. No.14">N11. No.14</option>
                            <option value="N11. No.15">N11. No.15</option>
                            <option value="N11. No.16">N11. No.16</option>

                            <option value="N12. No.01">N12. No.01</option>
                            <option value="N12. No.02">N12. No.02</option>
                            <option value="N12. No.03">N12. No.03</option>
                            <option value="N12. No.04">N12. No.04</option>
                            <option value="N12. No.05">N12. No.05</option>
                            <option value="N12. No.06">N12. No.06</option>
                            <option value="N12. No.07">N12. No.07</option>
                            <option value="N12. No.08">N12. No.08</option>
                            <option value="N12. No.09">N12. No.09</option>
                            <option value="N12. No.10">N12. No.10</option>
                            <option value="N12. No.11">N12. No.11</option>
                            <option value="N12. No.12">N12. No.12</option>
                            <option value="N12. No.12A">N12. No.12A</option>
                            <option value="N12. No.14">N12. No.14</option>
                            <option value="N12. No.15">N12. No.15</option>
                            <option value="N12. No.16">N12. No.16</option>

                            <option value="N12A. No.01">N12A. No.01</option>
                            <option value="N12A. No.02">N12A. No.02</option>
                            <option value="N12A. No.03">N12A. No.03</option>
                            <option value="N12A. No.04">N12A. No.04</option>
                            <option value="N12A. No.05">N12A. No.05</option>
                            <option value="N12A. No.06">N12A. No.06</option>
                            <option value="N12A. No.07">N12A. No.07</option>
                            <option value="N12A. No.08">N12A. No.08</option>
                            <option value="N12A. No.09">N12A. No.09</option>
                            <option value="N12A. No.10">N12A. No.10</option>
                            <option value="N12A. No.11">N12A. No.11</option>
                            <option value="N12A. No.12">N12A. No.12</option>
                            <option value="N12A. No.12A">N12A. No.12A</option>
                            <option value="N12A. No.14">N12A. No.14</option>
                            <option value="N12A. No.15">N12A. No.15</option>
                            <option value="N12A. No.16">N12A. No.16</option>

                            <option value="N14. No.01">N14. No.01</option>
                            <option value="N14. No.02">N14. No.02</option>
                            <option value="N14. No.03">N14. No.03</option>
                            <option value="N14. No.04">N14. No.04</option>
                            <option value="N14. No.05">N14. No.05</option>
                            <option value="N14. No.06">N14. No.06</option>
                            <option value="N14. No.07">N14. No.07</option>
                            <option value="N14. No.08">N14. No.08</option>
                            <option value="N14. No.09">N14. No.09</option>
                            <option value="N14. No.10">N14. No.10</option>
                            <option value="N14. No.11">N14. No.11</option>
                            <option value="N14. No.12">N14. No.12</option>
                            <option value="N14. No.12A">N14. No.12A</option>
                            <option value="N14. No.14">N14. No.14</option>
                            <option value="N14. No.15">N14. No.15</option>
                            <option value="N14. No.16">N14. No.16</option>

                            <option value="N15. No.01">N15. No.01</option>
                            <option value="N15. No.02">N15. No.02</option>
                            <option value="N15. No.03">N15. No.03</option>
                            <option value="N15. No.04">N15. No.04</option>
                            <option value="N15. No.05">N15. No.05</option>
                            <option value="N15. No.06">N15. No.06</option>
                            <option value="N15. No.07">N15. No.07</option>
                            <option value="N15. No.08">N15. No.08</option>
                            <option value="N15. No.09">N15. No.09</option>
                            <option value="N15. No.10">N15. No.10</option>
                            <option value="N15. No.11">N15. No.11</option>
                            <option value="N15. No.12">N15. No.12</option>
                            <option value="N15. No.12A">N15. No.12A</option>
                            <option value="N15. No.14">N15. No.14</option>
                            <option value="N15. No.15">N15. No.15</option>

                            <option value="O2. No.01">O2. No.01</option>
                            <option value="O2. No.02">O2. No.02</option>
                            <option value="O2. No.03">O2. No.03</option>
                            <option value="O2. No.04">O2. No.04</option>
                            <option value="O2. No.05">O2. No.05</option>
                            <option value="O2. No.06">O2. No.06</option>
                            <option value="O2. No.07">O2. No.07</option>
                            <option value="O2. No.08">O2. No.08</option>
                            <option value="O2. No.09">O2. No.09</option>
                            <option value="O2. No.10">O2. No.10</option>
                            <option value="O2. No.11">O2. No.11</option>
                            <option value="O2. No.12">O2. No.12</option>
                            <option value="O2. No.12A">O2. No.12A</option>
                            <option value="O2. No.14">O14. No.14</option>

                            <option value="O3. No.01">O3. No.01</option>
                            <option value="O3. No.02">O3. No.02</option>
                            <option value="O3. No.03">O3. No.03</option>
                            <option value="O3. No.04">O3. No.04</option>
                            <option value="O3. No.05">O3. No.05</option>
                            <option value="O3. No.06">O3. No.06</option>
                            <option value="O3. No.07">O3. No.07</option>
                            <option value="O3. No.08">O3. No.08</option>
                            <option value="O3. No.09">O3. No.09</option>
                            <option value="O3. No.10">O3. No.10</option>
                            <option value="O3. No.11">O3. No.11</option>
                            <option value="O3. No.12">O3. No.12</option>
                            <option value="O3. No.12A">O3. No.12A</option>
                            <option value="O3. No.14">O3. No.14</option>
                            <option value="O3. No.05">O3. No.05</option>
                            <option value="O3. No.06">O3. No.06</option>
                            <option value="O3. No.07">O3. No.07</option>
                            <option value="O3. No.08">O3. No.08</option>
                            <option value="O3. No.09">O3. No.09</option>
                            <option value="O3. No.10">O3. No.10</option>
                            <option value="O3. No.11">O3. No.11</option>
                            <option value="O3. No.12">O3. No.12</option>
                            <option value="O3. No.12A">O3. No.12A</option>
                            <option value="O3. No.14">O3. No.14</option>
                            <option value="O3. No.15">O3. No.15</option>
                            <option value="O3. No.16">O3. No.16</option>
                            <option value="O3. No.17">O3. No.17</option>
                            <option value="O3. No.18">O3. No.18</option>
                            <option value="O3. No.19">O3. No.19</option>
                            <option value="O3. No.20">O3. No.20</option>
                            <option value="O3. No.21">O3. No.21</option>
                            <option value="O3. No.22">O3. No.22</option>
                            <option value="O3. No.23">O3. No.23</option>
                            <option value="O3. No.24">O3. No.24</option>
                            <option value="O3. No.25">O3. No.25</option>
                            <option value="O3. No.26">O3. No.26</option>
                            <option value="O3. No.27">O3. No.27</option>
                            <option value="O3. No.28">O3. No.28</option>
                            <option value="O3. No.29">O3. No.29</option>
                            <option value="O3. No.30">O3. No.30</option>
                            <option value="O3. No.31">O3. No.31</option>
                            <option value="O3. No.32">O3. No.32</option>
                            <option value="O3. No.33">O3. No.33</option>
                            <option value="O3. No.34">O3. No.34</option>
                            <option value="O3. No.35">O3. No.35</option>
                            <option value="O3. No.36">O3. No.36</option>

                            <option value="O4. No.01">O4. No.01</option>
                            <option value="O4. No.02">O4. No.02</option>
                            <option value="O4. No.03">O4. No.03</option>
                            <option value="O4. No.04">O4. No.04</option>
                            <option value="O4. No.05">O4. No.05</option>
                            <option value="O4. No.06">O4. No.06</option>
                            <option value="O4. No.07">O4. No.07</option>
                            <option value="O4. No.08">O4. No.08</option>
                            <option value="O4. No.09">O4. No.09</option>
                            <option value="O4. No.10">O4. No.10</option>
                            <option value="O4. No.11">O4. No.11</option>
                            <option value="O4. No.12">O4. No.12</option>
                            <option value="O4. No.12A">O4. No.12A</option>
                            <option value="O4. No.14">O4. No.14</option>
                            <option value="O4. No.05">O4. No.05</option>
                            <option value="O4. No.06">O4. No.06</option>
                            <option value="O4. No.07">O4. No.07</option>
                            <option value="O4. No.08">O4. No.08</option>
                            <option value="O4. No.09">O4. No.09</option>
                            <option value="O4. No.10">O4. No.10</option>
                            <option value="O4. No.11">O4. No.11</option>
                            <option value="O4. No.12">O4. No.12</option>
                            <option value="O4. No.12A">O4. No.12A</option>
                            <option value="O4. No.14">O4. No.14</option>
                            <option value="O4. No.15">O4. No.15</option>
                            <option value="O4. No.16">O4. No.16</option>
                            <option value="O4. No.17">O4. No.17</option>
                            <option value="O4. No.18">O4. No.18</option>
                            <option value="O4. No.19">O4. No.19</option>
                            <option value="O4. No.20">O4. No.20</option>
                            <option value="O4. No.21">O4. No.21</option>
                            <option value="O4. No.22">O4. No.22</option>
                            <option value="O4. No.23">O4. No.23</option>
                            <option value="O4. No.24">O4. No.24</option>
                            <option value="O4. No.25">O4. No.25</option>
                            <option value="O4. No.26">O4. No.26</option>
                            <option value="O4. No.27">O4. No.27</option>
                            <option value="O4. No.28">O4. No.28</option>
                            <option value="O4. No.29">O4. No.29</option>
                            <option value="O4. No.30">O4. No.30</option>
                        </select>
                    </div>
                    <!-- <div class="form-group form-float">
                            	<div class="form-line">
                            		<input type="text" name="no_rumah" class="form-control" required>
                            		<label class="form-label">Blok/Nomor Rumah</label>
                            	</div>
                            </div> -->
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="no_kontak" class="form-control">
                            <label class="form-label">Nomor Kontak/WA</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Pendidikan</label>
                        <select name="pendidikan" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA/SMK">SMA/SMK</option>
                            <option value="S1">D1</option>
                            <option value="S1">D2</option>
                            <option value="S1">D3</option>
                            <option value="S1">S1/D4</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Pekerjaan</label>
                        <select name="pekerjaan" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <option value="Belum/Tidak Bekerja">Belum/Tidak Bekerja</option>
                            <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                            <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                            <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                            <option value="Guru">Guru</option>
                            <option value="Tentara Nasional Indonesia">Tentara Nasional Indonesia</option>
                            <option value="Kepolisian Republik Indonesia">Kepolisian Republik Indonesia</option>
                            <option value="Dokter">Dokter</option>
                            <option value="Bidan">Bidan</option>
                            <option value="Honorer">Honorer</option>
                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                            <option value="Karyawan BUMN/BUMD">Karyawan BUMN/BUMD</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Buruh Harian Lepas">Buruh Harian Lepas</option>
                            <option value="Petani">Petani</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Hubungan Keluarga</label>
                        <select name="hubungan" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                            <option value="Istri">Istri</option>
                            <option value="Anak">Anak</option>
                            <option value="Saudara">Saudara</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status Tinggal</label>
                        <select name="status_tinggal" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <option value="Tetap">Tetap</option>
                            <option value="Tidak Tetap">Tidak Tetap</option>
                        </select>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="nokk" class="form-control" required>
                            <label class="form-label">Nomor KK</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="Aktif">--Pilih--</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Non Aktif">Non Aktif</option>
                        </select>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger waves-effect">SIMPAN</button>

                </div>
            </div>
        </div>
    </div>
</form>