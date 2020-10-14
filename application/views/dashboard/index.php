<div class="card">
	<div class="header bg-light-blue">DASHBOARD</div>
	<div class="body">

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="body">
						<div class="row">
							<div class="col-md-12"><label>Pencarian Cepat Warga</label></div>
							<form action="<?php echo site_url('Warga/cari'); ?>" method="get">
								<div class="col-md-10"><input type="text" name="cari" class="form-control" placeholder="Ketik NIK atau Nama atau No. Rumah "></div>
								<div class="col-md-2"><button type="submit" class="btn btn-warning">Cari</button></div>


							</form>
						</div>
					</div>
				</div>

			</div>
			<div class="col-md-3">
				<a data-toggle="modal" data-target="#surat">
					<div class="card">
						<div class="header bg-light-green">
							<center> AJUKAN SURAT</center>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="<?php echo site_url('Home/status_pengajuan'); ?>">
					<div class="card">
						<div class="header bg-brown">
							<center> STATUS PENGAJUAN SURAT</center>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="<?php echo site_url('Home/iuran'); ?>">
					<div class="card">
						<div class="header bg-pink">
							<center> IURAN BULANAN RT</center>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="<?php echo site_url('Warga/profil/' . $this->session->userdata('no_ktp')); ?>">
					<div class="card">
						<div class="header bg-blue">
							<center> PROFIL</center>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="<?php echo site_url('Keuangan/Laporan'); ?>">
					<div class="card">
						<div class="header bg-purple">
							<center> LAPORAN KEUANGAN</center>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>

<form action="<?php echo site_url('Home/ajukan_surat'); ?>" method="post">
	<div class="modal fade" id="surat" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="largeModalLabel">Pengajuan Surat RT</h4>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<select name="perihal" class="form-control">
							<option value="">--Pilih--</option>
							<option value="KTP Baru / Perpanjang">KTP Baru / Perpanjang</option>
							<option value="Kartu Keluarga (KK)">Kartu Keluarga (KK)</option>
							<option value="Kelahiran Baru / Lama">Kelahiran Baru / Lama</option>
							<option value="Kematian / Keterangan Waris">Kematian / Keterangan Waris</option>
							<option value="Pindah Keluar / Masuk">Pindah Keluar / Masuk</option>
							<option value="Ijin Keramaian">Ijin Keramaian</option>
							<option value="Keterangan Keluarga Ekonomi Lemah">Keterangan Keluarga Ekonomi Lemah</option>
							<option value="Ijin Usaha / IMB">Ijin Usaha / IMB</option>
							<option value="Keterangan Tempat Tinggal / Domisili">Keterangan Tempat Tinggal / Domisili</option>
							<option value="Nikah / Talak / Rujuk / Cerai">Nikah / Talak / Rujuk / Cerai</option>
							<option value="Keterangan Belum Menikah">Keterangan Belum Menikah</option>
							<option value="Pensiunan / Taspen / Asabri / Astek">Pensiunan / Taspen / Asabri / Astek</option>
							<option value="Keterangan Kelakuan Baik (SKCK)">Keterangan Kelakuan Baik (SKCK)</option>
							<option value="Wesel Paket Berharga">Wesel Paket Berharga</option>
							<option value="Akta Tanah / Pertanahan / SPPT / PBB">Akta Tanah / Pertanahan / SPPT / PBB</option>
						</select>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" name="keperluan" class="form-control">
							<label class="form-label">Keperluan</label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>

				</div>
			</div>
		</div>
	</div>
</form>