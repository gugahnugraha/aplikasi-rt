<div class="card">
	<div class="header bg-blue">Pembayaran Iuran Bulan <?php echo $i['bulan']." ".$i['tahun'];?></div>
	<div class="body">

		<form action="<?php echo site_url('Home/bayarkan/');?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id_b_iuran" value="<?php echo $i['id_b_iuran'];?>">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<input type="hidden" name="status" value="Menunggu Konfirmasi">
			<div class="form-group form-float">
				<div class="form-line">
					<input type="number" name="besaran" class="form-control" required>
					<label class="form-label">Nominal </label>
				</div>
			</div>
			<div class="form-group">
				<label class="form-label">Metode Pembayaran</label>
				<select name="via" class="form-control" required>
					<option value="">--Pilih--</option>
					<option value="Transfer">Transfer</option>
					<option value="Cash">Cash</option>
				</select>
			</div>
			<div class="form-group">
				<label class="form-label">Bukti</label>
				<input type="file" name="bukti" class="form-control" required>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Bayarkan</button>
			</div>
		</form>
	</div>
</div>