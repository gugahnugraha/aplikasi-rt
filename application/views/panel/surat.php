<div class="card">
	<div class="header bg-orange">PENGAJUAN SURAT BARU</div>
	<div class="body">
		<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
			<thead>
				<th>No</th>
				<th>Nama</th>
				<th>Perihal</th>
				<th>Tgl Pengajuan</th>
				<th>Keperluan</th>
				<th>Lihat</th>
			</thead>
			<tbody>
				<?php $no=0; foreach($w as $a): $no++ ;?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $a->nama_lengkap;?></td>
					<td><?php echo $a->perihal;?></td>
					<td><?php echo date('d M Y', strtotime($a->tgl_pengajuan));?></td>
					<td><?php echo $a->keperluan;?></td>
					<td><a href="<?php echo site_url('Panel_rt/penerbitan_surat/'.$a->id_surat);?>" class="btn btn-primary">Terbitkan</a></td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>

<div class="card">
	<div class="header bg-blue">ARSIP PENGAJUAN SURAT</div>
	<div class="body">
		<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
			<thead>
				<th>No</th>
				<th>Nama</th>
				<th>Perihal</th>
				<th>Tgl Pengajuan</th>
				<th>Keperluan</th>
				<th>Tgl Penerbitan</th>
				<th>Lihat</th>
			</thead>
			<tbody>
				<?php $no=0; foreach($k as $a): $no++ ;?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $a->nama_lengkap;?></td>
					<td><?php echo $a->perihal;?></td>
					<td><?php echo date('d M Y', strtotime($a->tgl_pengajuan));?></td>
					<td><?php echo $a->keperluan;?></td>
					<td><?php echo date('d M Y', strtotime($a->tgl_penerbitan));?></td>
					<td><a href="<?php echo site_url('Panel_rt/cetak_surat/'.$a->id_surat);?>" class="btn btn-primary">Lihat</a></td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>