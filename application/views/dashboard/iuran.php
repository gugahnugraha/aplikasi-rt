<div class="card">
	<div class="header bg-blue">Status Iuran Bulanan</div>
	<div class="body">
		<table class="table table-bordered table-striped table-hover dataTable js-basic-example">
			<thead>
				<th>No</th>
				<th>Bulan</th>
				<th>Tahun</th>
				<th>Status</th>
				<th>Aksi</th>
			</thead>
			<tbody>

				<?php $no = 0;
				foreach ($i as $a) : $no++; ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $a->bulan; ?></td>
						<td><?php echo $a->tahun; ?></td>
						<td><?php if (cek_tagihan_current($a->id_b_iuran, $ktp) == NULL) { ?>
								<label class="label bg-orange">Belum Bayar</label>
							<?php } else { ?>
								<label class="label bg-blue">Sudah Bayar</label>
							<?php } ?>
						</td>
						<td>
							<?php if (cek_tagihan_current($a->id_b_iuran, $ktp) == NULL) { ?>
								<a href="<?php echo site_url('Home/bayar_iuran/' . $a->id_b_iuran); ?>" class="btn btn-primary">Bayar</a>
							<?php } else { ?>
								<label class="label bg-grey">Bayar</label>
							<?php } ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>