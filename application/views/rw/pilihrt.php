<div class="card">
	<div class="header bg-blue">Pilih RT</div>
	<div class="body">
		<table class="table table-hover">
			<thead>
				<th>Nama RT</th>
				<th>Ketua</th>
				<th>Aksi</th>
			</thead>
			<tbody>
				<?php foreach($rt as $a){ ?>
				<tr>
					<td><?php echo $a->nama_rt;?></td>
					<td><?php if(get_ketua($a->id_rt)->num_rows() > 0){ echo nama_ketua($a->id_rt,'nama_lengkap');} else { ?>
						<a href="" class="btn bg-blue" data-toggle="modal" data-target="#pilih_ketua_<?php echo $a->id_rt;?>">Pilih Ketua RT</a>
						<?php } ?>
						</td>
						<td><?php if(get_ketua($a->id_rt)->num_rows() > 0){ ?>
							<a href="<?php echo site_url('RW/jadi_warga/'.nama_ketua($a->id_rt,'id_user'));?>" class="btn btn-primary">Reset Ketua</a>
							<?php } else{ }?>
						</td>
						
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</div>


<?php foreach($rt as $b) { ?>
<form action="<?php echo site_url('Panel_rt/tambah_warga/');?>" method="post" enctype="multipart/form-data">
<div class="modal fade" id="pilih_ketua_<?php echo $b->id_rt;?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Daftar Warga <?php echo $b->nama_rt;?></h4>
                        </div>
                        <div class="modal-body">
                        	<table class="table table-bordered table-hover dataTable js-basic-example" style="width: 100%">
                        		<thead>
                        			<th width="1%">No</th>
                        			<th>Nama Lengkap</th>
                        			<th>Aksi</th>
                        		</thead>
                        		<tbody>
                        			<?php $no=0; foreach(get_warga($b->id_rt)->result() as $a): $no++ ;?>
                        			<tr>
                        				<td><?php echo $no;?></td>
                        				<td><?php echo $a->nama_lengkap;?></td>
                        				<td><a href="<?php echo site_url('RW/jadi_ketua/'.$a->id_user);?>" class="btn-primary btn">Jadikan Ketua</a></td>
                        			</tr>
                        		<?php endforeach ;?>
                        		</tbody>
                        	</table>
                        </div>
                        <div class="modal-footer">
                                                   
                        </div>
                    </div>
                </div>
            </div>
</form>
<?php } ?>