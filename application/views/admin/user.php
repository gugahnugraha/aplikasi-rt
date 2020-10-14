<div class="card">
	<div class="header bg-blue">Pilih Ketua RW</div>
	<div class="body">
		<table class="table table-hover dataTable js-exportable">
			<thead>
				<th>No</th>
				<th>Nama Lengkap</th>
				<th>Status Warga</th>
				<th>Aksi</th>
			</thead>
			<tbody>
				<?php if($rw > 0){ ?>
				<tr>
					<td>1</td>
					<td><a href="<?php echo site_url('Warga/profil/'.$t['no_ktp']) ;?>"><?php echo $t['nama_lengkap'];?></a></td>
					<td>Warga <?php echo $t['nama_rt'];?></td>
					<td>KETUA RW <a href="<?php echo site_url('Admin/jadikan_warga/'.$t['id_user']);?>" class="btn bg-blue" onclick="confirm('Role User ini akan dijadikan warga, apakah anda yakin?');">Jadikan Role Warga</a></td>
				</tr>
				<?php } else {  ?>
				<?php $no=0; foreach($w as $a):$no++ ;?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $a->nama_lengkap;?></td>
					<td><?php echo $a->nama_rt;?></td>
					<td><a href="<?php echo site_url('Admin/jadikan_rw/'.$a->id_user);?>" class="btn bg-blue" onclick="confirm('Role User ini akan dijadikan ketua RW, apakah anda yakin?');">Jadikan Ketua RW</a></td>
				</tr>
			<?php endforeach;?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>