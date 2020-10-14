<div class="card">
	<div class="header">Hasil Pencarian untuk "<?php echo $kata;?>"</div>
	<div class="body">
		<table class="table table-bordered table-hover">
			<thead>
				<th>No</th>
				<th>Nama Lengkap</th>
				<th>Status Tinggal</th>
				<th>Blok/No.Rumah</th>
				<th>Tlp/WA</th>
				<th>Detail</th>
			</thead>
			<tbody>
				<?php $no=0; foreach($hasil as $a):$no++;?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $a->nama_lengkap;?></td>
					<td><?php echo $a->status_tinggal;?></td>
					<td><?php echo $a->no_rumah;?></td>
					<td><?php echo $a->no_kontak;?></td>
					<td><a href="<?php echo site_url('Warga/profil/'.$a->no_ktp);?>" class="btn btn-primary">Detail</a></td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>