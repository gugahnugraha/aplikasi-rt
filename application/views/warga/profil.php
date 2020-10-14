<div class="card">
	<div class="header">
		<h2>Profil Warga</h2>
	</div>
	<div class="body">

		<button class="btn btn-primary waves-effect" data-toggle="modal" data-target="#ktp">Lihat KTP</button> <button class="btn btn-primary waves-effect" data-toggle="modal" data-target="#kk">Lihat KK</button> <a href="<?php echo site_url('Warga/edit/' . $p['no_ktp']); ?>" class="btn bg-orange waves-effect">Edit Profil</a> <?php if ($this->session->userdata('role') == 'rw' or $this->session->userdata('role') == 'admin') {
																																																																																			echo "<a class='btn btn-success' href='" . site_url('Warga/ganti_rt/' . $p['no_ktp']) . "'>Ganti RT</a>";
																																																																																		} ?><br><br>
		<table border="0" width="100%" class="table table-hover">
			<tr>

				<td width="15%">Nama Lengkap</td>
				<td width="1%">:</td>
				<td width="40%"><?php echo $p['nama_lengkap']; ?></td>
			</tr>
			<tr>

				<td>Nomor KTP</td>
				<td>:</td>
				<td><?php echo $p['no_ktp']; ?></td>
			</tr>
			<tr>

				<td>Email</td>
				<td>:</td>
				<td><?php echo $p['email_warga']; ?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td><?php echo $p['sex']; ?></td>
			</tr>
			<tr>
				<td>Usia</td>
				<td>:</td>
				<td><?php echo hitung_umur($p['tgl_lahir']); ?> Tahun</td>
			</tr>
			<tr>
				<td>Agama</td>
				<td>:</td>
				<td><?php echo $p['agama']; ?></td>
			</tr>
			<tr>
				<td>Pendidikan</td>
				<td>:</td>
				<td><?php echo $p['pendidikan']; ?></td>
			</tr>
			<tr>
				<td>Pekerjaan</td>
				<td>:</td>
				<td><?php echo $p['pekerjaan']; ?></td>
			</tr>
			<tr>
				<td>Nomor Rumah</td>
				<td>:</td>
				<td><?php echo $p['no_rumah']; ?></td>
			</tr>
			<tr>
				<td>Nomor Kontak</td>
				<td>:</td>
				<td><?php echo $p['no_kontak']; ?></td>
			</tr>
			<tr>
				<td>Nomor KK</td>
				<td>:</td>
				<td><?php echo $p['nokk']; ?></td>
			</tr>
			<tr>
				<td>Status Tinggal</td>
				<td>:</td>
				<td><?php echo $p['status_tinggal']; ?></td>
			</tr>

			<tr>
				<td>Status</td>
				<td>:</td>
				<td><?php echo $p['status']; ?></td>
			</tr>
		</table>
		<br>
		<h4>Keluarga Dalam Satu KK</h4>
		<?php if ($this->session->userdata('role') === "Ketua" or $this->session->userdata('role') === "Sekretaris" ) { ?>
			<button class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah Anggota Keluarga</button><br>
		<?php } ?>
		<table class="table table-hover">
			<thead>
				<th>No</th>
				<th>Nama Lengkap</th>
				<th>Umur</th>
				<th>Hubungan</th>
			</thead>
			<tbody>
				<?php $no = 0;
				foreach ($hub as $a) : $no++; ?>
					<tr>
						<td width="3%"><?php echo $no; ?></td>
						<td><a href="<?php echo site_url('Warga/profil/' . $a->no_ktp); ?>"><?php echo $a->nama_lengkap; ?></a></td>
						<td><?php echo hitung_umur($a->tgl_lahir); ?> Tahun</td>
						<td><?php echo $a->hubungan; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<form action="<?php echo site_url('Warga/tambah_keluarga/'); ?>" method="post" enctype="multipart/form-data">
	<div class="modal fade" id="tambah" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="largeModalLabel">Tambah Warga</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="no_parent" value="<?php echo $p['no_ktp']; ?>">
					<input type="hidden" name="rt" value="<?php echo $p['rt']; ?>">
					<input type="hidden" name="nokk" value="<?php echo $p['nokk']; ?>">
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" name="no_ktp" class="form-control" required>
							<label class="form-label">NIK</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" name="nama_lengkap" class="form-control" required>
							<label class="form-label">Nama Lengkap</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" name="email_warga" class="form-control">
							<label class="form-label">Email</label>
						</div>
					</div>
					<div class="form-group">
						<label class="form-label">Jenis Kelamin</label>
						<select name="sex" class="form-control" required>
							<option value="">--Pilih--</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>

					<div class="form-group">
						<label class="form-label">Marital Status</label>
						<select name="marital" class="form-control" required>
							<option value="">--Pilih--</option>
							<option value="Belum Kawin">Belum Kawin</option>
							<option value="Kawin">Kawin</option>
							<option value="Cerai Hidup">Cerai Hidup</option>
							<option value="Cerai Mati">Cerai Mati</option>
						</select>
					</div>


					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" name="tempat_lahir" class="form-control" required>
							<label class="form-label">Tempat Lahir</label>
						</div>
					</div>

					<div class="form-group form-float">
						<label class="form-label">Tanggal Lahir</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="material-icons">date</i>
							</span>
							<div class="form-line">
								<input type="date" name="tgl_lahir" class="date" placeholder="Format : thn-bln-tgl Ex: 2000-03-30">
							</div>
						</div>

					</div>
					<div class="form-group">
						<label class="form-label">Agama</label>
						<select name="agama" required class="form-control">
							<option value="">--Pilih--</option>
							<option value="Islam">Islam</option>
							<option value="Hindu">Hindu</option>
							<option value="Budha">Budha</option>
							<option value="Protestan">Protestan</option>
							<option value="Katholik">Katholik</option>
							<option value="Konghucu">Konghucu</option>
						</select>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" name="no_rumah" class="form-control" value="<?php echo $p['no_rumah']; ?>" required readonly>
							<label class="form-label">Blok/No. Rumah </label>
						</div>
					</div>

					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" name="no_kontak" class="form-control">
							<label class="form-label">Nomor Kontak</label>
						</div>
					</div>
					<div class="form-group">
						<label class="form-label">Pendidikan</label>
						<select name="pendidikan" class="form-control" required>
							<option value="">--Pilih--</option>
							<option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
							<option value="SD">SD</option>
							<option value="SMP">SMP</option>
							<option value="SMA">SMA/SMK</option>
							<option value="D1">D1</option>
							<option value="D2">D2</option>
							<option value="D3">D3</option>
							<option value="S1/D4">S1/D4</option>
							<option value="S2">S2</option>
							<option value="S3">S3</option>
						</select>
					</div>
					<div class="form-group">
						<label class="form-label">Pekerjaan</label>
						<select name="pekerjaan" class="form-control" required>
							<option value="">--Pilih--</option>
							<option value="Belum/Tidak Bekerja">Belum/Tidak Bekerja</option>
							<option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
							<option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
							<option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
							<option value="Guru">Guru</option>
							<option value="Tentara Nasional Indonesia">Tentara Nasional Indonesia</option>
							<option value="Kepolisian Republik Indonesia">Kepolisian Republik Indonesia</option>
							<option value="Dokter">Dokter</option>
							<option value="Bidan">Bidan</option>
							<option value="Honorer">Honorer</option>
							<option value="Karyawan Swasta">Karyawan Swasta</option>
							<option value="Karyawan BUMN/BUMD">Karyawan BUMN/BUMD</option>
							<option value="Wiraswasta">Wiraswasta</option>
							<option value="Buruh Harian Lepas">Buruh Harian Lepas</option>
							<option value="Petani">Petani</option>
						</select>
					</div>
					<div class="form-group">
						<label class="form-label">Hubungan</label>
						<select name="hubungan" class="form-control">
							<option value="">--Pilih--</option>
							<option value="Istri">Istri</option>
							<option value="Anak">Anak</option>
							<option value="Saudara">Saudara</option>
						</select>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" name="nokk" class="form-control" value="<?php echo $p['nokk']; ?>" required readonly>
							<label class="form-label">Nomor KK</label>
						</div>
					</div>
					<div class="form-group">
						<label class="form-label">Status Tinggal</label>
						<input type="text" name="status_tinggal" class="form-control" value="<?php echo $p['status_tinggal']; ?>" required readonly>
					</div>
					<div class="form-group">
						<label class="form-label">Status</label>
						<input type="text" name="status" class="form-control" value="<?php echo $p['status']; ?>" required readonly>
					</div>

					<!-- <div class="form-group">
						<label class="form-label">Foto</label>
						<input type="file" name="foto" class="form-control">
					</div> -->


				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>

				</div>
			</div>
		</div>
	</div>

</form>

<form action="<?php echo site_url('Warga/upload_ktp/'); ?>" method="post" enctype="multipart/form-data">
	<div class="modal fade" id="ktp" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="largeModalLabel">Upload / Lihat KTP</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="no_ktp" value="<?php echo $p['no_ktp']; ?>">
					<label class="form-label">Upload KTP</label>
					<input type="file" name="ktp" class="form-control" required>

					<hr>
					<?php if ($dok['foto_ktp'] == null) { ?>

					<?php } else { ?>
						<img src="<?php echo base_url('assets/upload/' . $p['no_ktp'] . '/' . $dok['foto_ktp']); ?>" style="width: 100%">
					<?php } ?>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary waves-effect">Upload</button>

				</div>
			</div>
		</div>
	</div>

</form>

<form action="<?php echo site_url('Warga/upload_kk/'); ?>" method="post" enctype="multipart/form-data">
	<div class="modal fade" id="kk" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="largeModalLabel">Upload / Lihat KK</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="no_ktp" value="<?php echo $p['no_ktp']; ?>">
					<label class="form-label">Upload KK</label>
					<input type="file" name="kk" class="form-control" required>

					<hr>
					<?php if ($dok['foto_kk'] == null) { ?>

					<?php } else { ?>
						<img src="<?php echo base_url('assets/upload/' . $p['no_ktp'] . '/' . $dok['foto_kk']); ?>" style="width: 100%">
					<?php } ?>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary waves-effect">Upload</button>

				</div>
			</div>
		</div>
	</div>
</form>
<div class="card">
	<div class="body">
		<a class="btn btn-block btn-danger" href="<?php echo base_url('Panel_rt/Warga_rt/5') ?>"">Kembali ke Daftar Warga</a>
</div>
</div>

			