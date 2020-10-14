<h4>Dashboard Pengurus <?php echo $rt['nama_rt'];?></h4>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="body">
				<div class="row">
				<div class="col-md-12"><label>Pencarian Cepat Warga</label></div>
				<form action="<?php echo site_url('Panel_rt/cari');?>" method="get">
				<div class="col-md-10"><input type="text" name="cari" class="form-control" placeholder="Ketik Nama Warga atau Ketik Nomor KTP"></div><div class="col-md-2"><button type="submit" class="btn btn-primary">Cari</button></div>
				
				
			</form>
			</div>			
			</div>
		</div>
	
		</div>
	<div class="col-md-4" >
		<div class="card" style="height: 250px">
			<div class="header bg-teal">DAFTAR WARGA</div>
			<div class="body">
				<p>Berisi Informasi mengenai daftar warga yang terdaftar dan penambahan warga.</p>
				<a href="<?php echo site_url('Panel_rt/warga_rt/'.$rt['id_rt']);?>" class="btn btn-primary"> + Selengkapnya</a>
			</div>
		</div>
	</div>
	<div class="col-md-4" >
		<div class="card" style="height: 250px">
			<div class="header bg-indigo">IURAN BULANAN WARGA</div>
			<div class="body">
				<p>Berisi Informasi mengenai iuran warga bulanan, di halaman ini bisa dilihat pembayaran yang telah dilakukan oleh warga dan membuat laporan keuangan.</p>
				<a href="<?php echo site_url('Panel_rt/iuran_rt/'.get_rt_by_ktp($this->session->userdata('no_ktp')));?>" class="btn btn-primary">+ Selengkapnya</a>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card" style="height: 250px" >
			<div class="header bg-orange">STATISTIK WARGA</div>
			<div class="body">
				<p>Berisi Informasi mengenai statistik warga berdasarkan kategori tertentu.</p>
				<a href="<?php echo site_url('Panel_rt/statistik/'.$rt['id_rt']);?>" class="btn btn-primary">+ Selengkapnya</a>
			</div>
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="card" style="height: 250px">
			<div class="header bg-cyan">PENGAJUAN SURAT</div>
			<div class="body">
				<p>Berisi Informasi Mengenai Pengajuan Surat dari Warga.</p>
				<a href="<?php echo site_url('Panel_rt/surat/'.$rt['id_rt']);?>" class="btn btn-primary">+ Selengkapnya</a>
			</div>
		</div>
	</div>
</div>