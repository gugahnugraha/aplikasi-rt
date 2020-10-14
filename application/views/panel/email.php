<div class="card">
	<div class="header bg-orange">Setting Email RT</div>
	<div class="body">
		Setting Email anda untuk mengirimkan email pemberitahuan jika ada warga yang mengajukan surat
		email yang didukung hanya GMAIL
	</div>
</div>

<form action="<?php echo site_url('Panel_rt/simpan_email');?>" method="post">
<div class="card">
	<div class="header bg-light-blue">Email Account</div>
	<div class="body">
		<div class="form-group form-float">
			<div class="form-line">
				<input type="hidden" name="id_rt" value="<?php echo $id_rt;?>">
				<input type="text" name="email" class="form-control" value="<?php echo email_set('email',$id_rt);?>">
				<label class="form-label">Alamat Email Lengkap(GMAIL)</label>
			</div>
		</div>
		<div class="form-group form-float">
			<div class="form-line">
				<input type="text" name="pass_email" class="form-control" value="<?php echo email_set('pass_email',$id_rt);?>">
				<label class="form-label">Password Email Anda</label>
			</div>
		</div>
	</div>
	<div class="footer">
		<button class="btn btn-primary form-control" type="submit">Simpan</button>
	</div>
</div>
</form>