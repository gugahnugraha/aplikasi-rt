<div class="card">
	<div class="header bg-blue">Daftar RT</div>
	<div class="body">
		<button class="btn btn-primary waves-effect" data-toggle="modal" data-target="#rt"><i class="material-icons">account_balance</i> Tambah RT</button>
		<br><br>
		<table class="table table-responsive table-bordered table-hover">
			<thead class="bg-light-blue">
				<th width="15px">No</th>
				<th>Nama RT</th>
				<th>Ketua RT</th>
			</thead>
			<tbody>
				<?php $no=0; foreach($rt as $a): $no++ ;?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $a->nama_rt;?></td>
					<td></td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal -->
<form action="<?php echo site_url('Rt/tambah/');?>" method="post">
            <div class="modal fade" id="rt" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Tambah RT</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                            	<div class="form-line">
                            		<input type="text" name="rt" class="form-control">
                            		<label class="form-label">Nama RT</label>
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