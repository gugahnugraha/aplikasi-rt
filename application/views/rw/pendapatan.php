<div class="card">
	<div class="header bg-blue">Daftar Pendapatan RW</div>
	<div class="body">
		<button class="btn btn-primary" data-toggle="modal" data-target="#pendapatan">Tambah Pendapatan Lain</button><br><br>
		<table class="table table-bordered table-striped table-hover dataTable js-exportable">
			
				<thead>
					<th>No</th>
					<th>Nama Item</th>
					<th>Nominal</th>
					<th>Tgl Masuk</th>
					<th>Metode</th>
				</thead>
				<tbody>
					<?php $no=0; foreach($k as $a): $no++;?>
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
		<table class="table table-hover" style="width: 100%">
			<tr class="bg-green">
			<td>Total Pendapatan Keseluruhan</td>
			<td><?php echo rupiah($sum['total']);?></td>
		</tr>
		</table>
		
	</div>
</div>


<form action="<?php echo site_url('RW/tambah_pendapatan/');?>" method="post">
<div class="modal fade" id="pendapatan" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Tambah Pendapatan Lainnya</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group form-float">
                            	<div class="form-line">
                            		<input type="text" name="nama_item" class="form-control" required>
                            		<label class="form-label">Nama Item</label>
                            	</div>
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