<div class="card">
	<div class="header">Laporan Keuangan <?php echo $k['nama_laporan'];?> RW</div>
	<div class="body">
		<table class="table table-bordered table-hover">
			<thead>
				<th>No</th>
				<th>Nama Item</th>
				<th>Tgl Masuk/Keluar</th>
				<th>Metode</th>
				<th>Jenis</th>
				<th>Nominal</th>
			</thead>
			<tbody>
				<?php $no=0; foreach(get_laporan($k['dari'], $k['ke'],'rw') as $a):$no++ ;?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $a->nama_item;?></td>
					<td><?php echo date('d M Y', strtotime($a->tgl));?></td>
					<td><?php echo $a->via;?></td>
					<td><?php echo $a->jenis;?></td>
					<td><?php echo rupiah($a->nominal);?></td>
				</tr>
			<?php endforeach;?>
			<tr class="bg-green">
				<td colspan="5">Total Pendapatan</td>
				<td><?php echo rupiah(get_jml_laporan($k['dari'], $k['ke'],'rw','pendapatan RW'));?></td>
			</tr>
			<tr class="bg-orange">
				<td colspan="5">Total Pengeluaran</td>
				<td><?php echo rupiah(get_jml_laporan($k['dari'], $k['ke'],'rw','pengeluaran RW'));?></td>
			</tr>
			<tr class="bg-blue">
				<td colspan="5">Sisa Kas</td>
				<td><?php $sisa = get_jml_laporan($k['dari'], $k['ke'],'rw','pendapatan RW')-get_jml_laporan($k['dari'], $k['ke'],'rw','pengeluaran RW');
				echo rupiah($sisa);?></td>
			</tr>
			</tbody>
		</table>
	</div>
</div>