
	
	<div class="col-md-4">
		<form action="<?php echo site_url('Admin/upload_logo');?>" method="post" enctype="multipart/form-data">
			<div class="card">
				<div class="header bg-blue">Upload Logo</div>
				<div class="body">
					<input type="file" name="logo" class="form-control">
				</div>
				<div class="footer">
					<button type="submit" class="btn btn-primary waves-effect form-control">Upload</button>
				</div>
			</div>
		</form>
	</div>
	<div class="col-md-8">
		<div class="card">
				<div class="header bg-blue">Logo Saat ini</div>
				<div class="body">
					<img src="<?php echo base_url('assets/upload/'.$l['logo']);?>">
				</div>
			</div>
	</div>
	
