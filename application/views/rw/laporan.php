<div class="card">
	<div class="header"><h2>LAPORAN Keuangan RW</h2></div>
	<div class="body">
        <?php if($this->session->userdata('role')=='rw'){ ?>
		<button class="btn btn-primary" data-toggle="modal" data-target="#pendapatan">Buat Laporan</button>
        <?php } else {} ?>
		<br><br>
		<table class="table table-bordered table-striped table-hover dataTable js-basic-example">
			<thead>
				<th>No</th>
				<th>Nama Laporan</th>
				<th>Dari Tanggal</th>
				<th>Sampai Tanggal</th>
				<th>Detail</th>
			</thead>
			<tbody>
				<?php $no=0; foreach($k as $a):$no++ ;?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $a->nama_laporan;?></td>
					<td><?php echo date('d M Y', strtotime($a->dari));?></td>
					<td><?php echo date('d M Y', strtotime($a->ke));?></td>
					<td><a href="<?php echo site_url('RW/detail/'.$a->id_laporan);?>" class="btn btn-primary">detail</a></td>
				</tr>
			<?php endforeach;?>

			</tbody>
		</table>
		
	</div>
</div>

<form action="<?php echo site_url('RW/tambah_laporan/');?>" method="post">
<div class="modal fade" id="pendapatan" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Buat Laporan</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group form-float">
                            	<div class="form-line">
                            		<input type="text" name="nama_laporan" class="form-control">
                            		<label class="form-label">Laporan</label>
                            	</div>
                            </div>
                            <div class="form-group">
                            	<div class="form-line">
                            		<label>Dari Tanggal</label>
                            		<input type="text" class="datepicker form-control" name="dari" placeholder="Pilih tanggal...">
                            	</div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Sampai Tanggal</label>
                                    <input type="text" class="datepicker form-control" name="ke" placeholder="Pilih tanggal...">
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