<div class="card">
	<div class="header bg-blue">Setting</div>
	<div class="body">
		<form action="<?php echo site_url('Admin/update_setting');?>" method="post">
			<table style="width: 100%">
				<tr>
					<td>Kampung / Komplek</td>
					<td>:</td>
					<td><input type="text" name="komplek" class="form-control" value="<?php echo get_setting('komplek');?>"></td>
				</tr>
				<tr>
					<td>RW</td>
					<td>:</td>
					<td><input type="text" name="rw" class="form-control" value="<?php echo get_setting('rw');?>"></td>
				</tr>
				<tr>
					<td>Kelurahan</td>
					<td>:</td>
					<td><input type="text" name="kelurahan" class="form-control" value="<?php echo get_setting('kelurahan');?>"></td>
				</tr>
				<tr>
					<td>Kecamatan</td>
					<td>:</td>
					<td><input type="text" name="kecamatan" class="form-control" value="<?php echo get_setting('kecamatan');?>"></td>
				</tr>
				<tr>
					<td>Kota / Kab</td>
					<td>:</td>
					<td><input type="text" name="kota" class="form-control" value="<?php echo get_setting('kota');?>"></td>
				</tr>
				<tr>
					<td>Kode Pos</td>
					<td>:</td>
					<td><input type="text" name="kode_pos" class="form-control" value="<?php echo get_setting('kode_pos');?>"></td>
				</tr>
				<tr>
					<td>Provinsi</td>
					<td>:</td>
					<td><input type="text" name="provinsi" class="form-control" value="<?php echo get_setting('provinsi');?>"></td>
				</tr>
				
			</table>
			<br>
			<button type="submit" class="btn bg-blue form-control">Simpan</button>
		</form>
	</div>
</div>