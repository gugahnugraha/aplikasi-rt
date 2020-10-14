<div class="card">
	<div class="header bg-blue">Status Pengajuan Surat</div>
	<div class="body">
		<table class="table table-hover">
			<thead>
				<th>No</th>
				<th>Perihal</th>
				<th>Tgl Pengajuan</th>
				<th>Tgl Penerbitan</th>
				<th>Nomor Surat</th>
				<th>Status</th>
			</thead>
			<tbody>
				<?php $no=0; foreach($s as $a):$no++ ;?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $a->perihal;?></td>
					<td><?php echo date('d M Y', strtotime($a->tgl_pengajuan))?></td>
					<td><?php echo date('d M Y', strtotime($a->tgl_penerbitan));?></td>
					<td><?php echo $a->nomor_surat;?></td>
					<td><?php if($a->nomor_surat == null)
					{
						echo "<label class='label bg-orange'>Belum Disetujui</label>";
					}
					else {
						echo "<label class='label bg-green'>Disetujui</label>";
					}
				?>
				</td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>