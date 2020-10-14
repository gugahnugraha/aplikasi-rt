<form action="<?php echo site_url('Home/updatePass');?>" method='post'>
	<div class="card">
		<div class="header bg-blue">Update Password</div>
		<div class="body">
			<div class="form-group form-float">
				<div class="form-line">
					<input type="password" name="password" class="form-control" required>
					<label class="form-label">Ketik Password Baru Anda</label>
				</div>
			</div>
			<br>
			<button type="submit" class="btn btn-primary form-control">Update</button>
		</div>
	</div>
</form>