<form action="<?php echo site_url('Admin/tambah_warga');?>" method="post">
<div class="card">
	<div class="header bg-orange">Tambah Warga</div>
	<div class="body">
		<div class="form-group form-float">
                            	<div class="form-line">
                            		<input type="number" name="no_ktp" class="form-control" required>
                            		<label class="form-label">NIK KTP</label>
                            	</div>
                            </div>
                            <div class="form-group form-float">
                            	<div class="form-line">
                            		<input type="text" name="nama_lengkap" class="form-control" required>
                            		<label class="form-label">Nama Lengkap</label>
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
                            <div class="form-group form-float">
                            	<div class="form-line">
                            		<input type="password" name="password" class="form-control" required>
                            		<label class="form-label">Password</label>
                            	</div>
                            </div>
                            <div class="form-group form-float">
                            	<label class="form-label">Tanggal Lahir</label>
                            	<div class="input-group">
                            		<span class="input-group-addon">
                            			<i class="material-icons">date_range</i>
                            		</span>
                            		<div class="form-line">
                            			<input type="text" name="tgl_lahir" class="datepicker form-control"  placeholder="DD-MM-YYYY">
                            		</div>
                            	</div>

                            </div>
                            <div class="form-group">
                            	<label class="form-label">Agama</label>
                            	<select name="agama" required class="form-control">
                            		<option value="">--Pilih--</option>
                            		<option value="Islam">Islam</option>
                            		<option value="Hindu">Hindu</option>
                            		<option value="Buddha">Buddha</option>
                            		<option value="Protestan">Protestan</option>
                            		<option value="Katolik">Katolik</option>
                            		<option value="Konghucu">Konghucu</option>
                                    <option value="Konghucu">Kepercayaan</option>
                            	</select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">RT</label>
                                <select class="form-control" name="rt" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($r as $a){ ?>
                                    <option value="<?php echo $a->id_rt;?>"><?php echo $a->nama_rt;?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group form-float">
                            	<div class="form-line">
                            		<input type="text" name="no_rumah" class="form-control" required>
                            		<label class="form-label">Blok/Nomor Rumah</label>
                            	</div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" name="no_kontak" class="form-control" required>
                                    <label class="form-label">Nomor Kontak/WA</label>
                                </div>
                            </div>
                            <div class="form-group">
                            	<label class="form-label">Pendidikan</label>
                            	<select name="pendidikan" class="form-control" required>
                            		<option value="">--Pilih--</option>
                            		<option value="SD">Tidak/Belum Sekolah</option>
                                    <option value="SD">SD</option>
                            		<option value="SMP">SMP</option>
                            		<option value="SMA">SMA/SMK</option>
                            		<option value="S1">S1</option>
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
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary form-control">Simpan</button>
	</div>
</div>
</form>