<div class="card">
	<div class="header bg-blue">Menu RW</div>
	<div class="body">
		<div class="row">
			<div class="col-md-12"><label>Pencarian Cepat Warga</label></div>
				<form action="<?php echo site_url('RW/cari');?>" method="get">
				<div class="col-md-10"><input type="text" name="cari" class="form-control" placeholder="Ketik Nama Warga atau Ketik Nomor KTP"></div><div class="col-md-2"><button type="submit" class="btn btn-primary">Cari</button></div></form>
				<hr>
				<div class="col-md-3">
					<a href="<?php echo site_url('RW/keuangan');?>" class="btn btn-primary waves-effect form-control">Keuangan RW</a>
				</div>
				<div class="col-md-3">
					<a href="<?php echo site_url('RW/statistik');?>" class="btn bg-green waves-effect form-control">Statistik Warga</a>
				</div>
				<div class="col-md-3">
					<a href="<?php echo site_url('RW/pilih_rt');?>" class="btn bg-blue waves-effect form-control">Set Ketua RT</a>
				</div>
				<div class="col-md-3">
					<a href="<?php echo site_url('Admin/warga');?>" class="btn bg-blue waves-effect form-control">Tambah Warga</a>
				</div>
		</div>
	</div>
</div>