<form action="<?php echo site_url('Warga/update_rt');?>" method="post">
<div class="card">
	<div class="header bg-light-blue">Ganti RT Warga</div>
	<div class="body">
		<label class="form-label">Pilih RT Pengganti</label>
		<input type="hidden" name="no_ktp" value="<?php echo $p['no_ktp'];?>">
		<select class="select form-control" name="rtnya">
			<option value="<?php echo $p['rt'];?>"><?php echo get_name($p['no_ktp'],'nama_rt');?></option>
			<?php foreach($rt as $a) {?>
				<option value="<?php echo $a->id_rt;?>"><?php echo $a->nama_rt;?></option>
			<?php }?>
		</select>
	</div>
	<div class="footer"><button class="btn btn-primary form-control" type="submit">Simpan</button></div>
</div>
</form>