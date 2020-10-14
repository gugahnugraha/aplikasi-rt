<div class="card">
	<div class="header"><h2>PENGELUARAN RT <?php echo get_rt_by_ktp($this->session->userdata('no_ktp'));?></h2></div>
	<div class="body">
        <?php if($this->session->userdata('role')=='Bendahara'){ ?>
		<button class="btn bg-orange" data-toggle="modal" data-target="#pengeluaran">Tambah Pengeluaran</button>
        <?php }?>
		<br><br>
		<table class="table table-bordered table-striped table-hover dataTable js-basic-example">
			<thead>
				<th>No</th>
				<th>Nama Item</th>
				<th>Nominal</th>
				<th>Tgl Keluar</th>
				<th>Pembayaran</th>
			</thead>
			<tbody>
				<?php $no=0; foreach($k as $a):$no++ ;?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $a->nama_item;?></td>
					<td><?php echo rupiah($a->nominal);?></td>
					<td><?php echo date('d M Y', strtotime($a->tgl));?></td>
					<td><?php echo $a->via;?></td>
				</tr>
			<?php endforeach;?>

			</tbody>
		</table>
		<div class="alert bg-orange">
			Total Pengeluaran<p style="text-align: right"><?php echo rupiah($sum['total']);?></p>
		</div>
		
	</div>
</div>

<form action="<?php echo site_url('Keuangan/tambah_pengeluaran/');?>" method="post">
<div class="modal fade" id="pengeluaran" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Tambah Pengeluaran</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group form-float">
                            	<div class="form-line">
                            		<input type="text" name="nama_item" class="form-control" required>
                            		<label class="form-label">Nama Item</label>
                            	</div>
                            </div>
                            <div class="form-group form-float">
                                <label class="form-label">Jenis Pengeluaran</label>
                                <select name="peruntukan" class="form-control" required>
                                    <option value="Pengeluaran RT">Pengeluaran RT</option>
                                    <option value="Iuran RW">Iuran RW</option>
                                </select>
                            </div>
                            <div class="form-group form-float">
                            	<div class="form-line">
                            		<input type="number" name="nominal" class="form-control" required>
                            		<label class="form-label">Nominal</label>
                            	</div>
                            </div>
                            <div class="form-group">
                            	<div class="form-line">
                            		<label class="form-label">Metode Pembayaran</label>
                            		<select name="via" class="form-control" required>
                            			<option value="">--Pilih--</option>
                            			<option value="Cash">Cash</option>
                            			<option value="Transfer">Transfer</option>
                            		</select>
                            	</div>
                            </div>
                            <div class="form-group">
                            	<div class="form-line">
                            		
                            		<input type="text" class="datepicker form-control" name="tgl" placeholder="Pilih tanggal...">
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