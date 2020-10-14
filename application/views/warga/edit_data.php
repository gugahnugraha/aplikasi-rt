<form action="<?php echo site_url('Warga/update/'); ?>" method="post">
    <div class="card">
        <input type="hidden" name="no_parent" value="<?php echo $p['no_ktp']; ?>">
        <div class="header bg-blue">
            Edit Profil <?php echo $p['nama_lengkap']; ?>
        </div>
        <div class="body">
            <table border="0" width="100%" class="table table-hover">
                <tr>
                    <td width="15%">Nama Lengkap</td>
                    <td width="1%">:</td>
                    <td width="40%"><input type="text" name="nama_lengkap" value="<?php echo $p['nama_lengkap']; ?>" class="form-control"></td>
                </tr>
                <tr>

                    <td>NIK</td>
                    <td>:</td>
                    <td><input type="number" name="no_ktp" class="form-control" value="<?php echo $p['no_ktp']; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        <select name="sex" class="form-control">
                            <?php if ($p['sex'] === 'Perempuan') { ?>
                                <option selected="selected" value="Perempuan">Peremuan</option>
                                <option value="Laki-laki">Laki-laki</option>
                            <?php } ?>
                            <?php if ($p['sex'] === 'Laki-laki') { ?>
                                <option selected="selected" value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>

                            <?php } else { ?>

                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Marital Status</td>
                    <td>:</td>
                    <td>
                        <select name="marital" required class="form-control">
                            <option value="<?php echo $p['marital']; ?>" selected="selected"><?php echo $p['marital']; ?></option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Kawin">Kawin</option>
                            <option value="Cerai">Cerai</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="15%">Tempat Lahir</td>
                    <td width="1%">:</td>
                    <td width="40%"><input type="text" name="tempat_lahir" value="<?php echo $p['tempat_lahir']; ?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td><input type="date" name="tgl_lahir" value="<?php echo date('Y-m-d', strtotime($p['tgl_lahir'])); ?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td>
                        <select name="agama" required class="form-control">
                            <option value="<?php echo $p['agama']; ?>" selected="selected"><?php echo $p['agama']; ?></option>
                            <option value="Islam">Islam</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Pendidikan</td>
                    <td>:</td>
                    <td>
                        <select name="pendidikan" class="form-control" required>
                            <option value="<?php echo $p['pendidikan']; ?>"><?php echo $p['pendidikan']; ?></option>
                            <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA/SMK">SMA/SMK</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="S1/D4">S1/D4</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>
                        <select name="pekerjaan" class="form-control" required>
                            <option value="<?php echo $p['pekerjaan']; ?>"><?php echo $p['pekerjaan']; ?></option>
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

                    </td>
                </tr>
                <tr>
                    <td>Blok/Nomor Rumah</td>
                    <td>:</td>
                    <td>
                        <select name="no_rumah" class="form-control">
                            <option value="<?php echo $p['no_rumah']; ?>"><?php echo $p['no_rumah']; ?></option>

                            <option value="N7. No.01">N7. No.01</option>
                            <option value="N7. No.02">N7. No.02</option>
                            <option value="N7. No.03">N7. No.03</option>
                            <option value="N7. No.04">N7. No.04</option>
                            <option value="N7. No.05">N7. No.05</option>
                            <option value="N7. No.06">N7. No.06</option>
                            <option value="N7. No.07">N7. No.07</option>
                            <option value="N7. No.08">N7. No.08</option>
                            <option value="N7. No.09">N7. No.09</option>
                            <option value="N7. No.10">N7. No.10</option>
                            <option value="N7. No.11">N7. No.11</option>
                            <option value="N7. No.12">N7. No.12</option>
                            <option value="N7. No.12A">N7. No.12A</option>
                            <option value="N7. No.14">N7. No.14</option>
                            <option value="N7. No.15">N7. No.15</option>
                            <option value="N7. No.16">N7. No.16</option>
                            <option value="N8. No.01">N8. No.01</option>
                            <option value="N8. No.02">N8. No.02</option>
                            <option value="N8. No.03">N8. No.03</option>
                            <option value="N8. No.04">N8. No.04</option>
                            <option value="N8. No.05">N8. No.05</option>
                            <option value="N8. No.06">N8. No.06</option>
                            <option value="N8. No.07">N8. No.07</option>
                            <option value="N8. No.08">N8. No.08</option>
                            <option value="N8. No.09">N8. No.09</option>
                            <option value="N8. No.10">N8. No.10</option>
                            <option value="N8. No.11">N8. No.11</option>
                            <option value="N8. No.12">N8. No.12</option>
                            <option value="N8. No.12A">N8. No.12A</option>
                            <option value="N8. No.14">N8. No.14</option>
                            <option value="N8. No.15">N8. No.15</option>
                            <option value="N8. No.16">N8. No.16</option>
                            <option value="N9. No.01">N9. No.01</option>
                            <option value="N9. No.02">N9. No.02</option>
                            <option value="N9. No.03">N9. No.03</option>
                            <option value="N9. No.04">N9. No.04</option>
                            <option value="N9. No.05">N9. No.05</option>
                            <option value="N9. No.06">N9. No.06</option>
                            <option value="N9. No.07">N9. No.07</option>
                            <option value="N9. No.08">N9. No.08</option>
                            <option value="N9. No.09">N9. No.09</option>
                            <option value="N9. No.10">N9. No.10</option>
                            <option value="N9. No.11">N9. No.11</option>
                            <option value="N9. No.12">N9. No.12</option>
                            <option value="N9. No.12A">N9. No.12A</option>
                            <option value="N9. No.14">N9. No.14</option>
                            <option value="N9. No.15">N9. No.15</option>
                            <option value="N9. No.16">N9. No.16</option>
                            <option value="N10. No.01">N10. No.01</option>
                            <option value="N10. No.02">N10. No.02</option>
                            <option value="N10. No.03">N10. No.03</option>
                            <option value="N10. No.04">N10. No.04</option>
                            <option value="N10. No.05">N10. No.05</option>
                            <option value="N10. No.06">N10. No.06</option>
                            <option value="N10. No.07">N10. No.07</option>
                            <option value="N10. No.08">N10. No.08</option>
                            <option value="N10. No.09">N10. No.09</option>
                            <option value="N10. No.10">N10. No.10</option>
                            <option value="N10. No.11">N10. No.11</option>
                            <option value="N10. No.12">N10. No.12</option>
                            <option value="N10. No.12A">N10. No.12A</option>
                            <option value="N10. No.14">N10. No.14</option>
                            <option value="N10. No.15">N10. No.15</option>
                            <option value="N10. No.16">N10. No.16</option>
                            <option value="N11. No.01">N11. No.01</option>
                            <option value="N11. No.02">N11. No.02</option>
                            <option value="N11. No.03">N11. No.03</option>
                            <option value="N11. No.04">N11. No.04</option>
                            <option value="N11. No.05">N11. No.05</option>
                            <option value="N11. No.06">N11. No.06</option>
                            <option value="N11. No.07">N11. No.07</option>
                            <option value="N11. No.08">N11. No.08</option>
                            <option value="N11. No.09">N11. No.09</option>
                            <option value="N11. No.10">N11. No.10</option>
                            <option value="N11. No.11">N11. No.11</option>
                            <option value="N11. No.12">N11. No.12</option>
                            <option value="N11. No.12A">N11. No.12A</option>
                            <option value="N11. No.14">N11. No.14</option>
                            <option value="N11. No.15">N11. No.15</option>
                            <option value="N11. No.16">N11. No.16</option>
                            <option value="N12. No.01">N12. No.01</option>
                            <option value="N12. No.02">N12. No.02</option>
                            <option value="N12. No.03">N12. No.03</option>
                            <option value="N12. No.04">N12. No.04</option>
                            <option value="N12. No.05">N12. No.05</option>
                            <option value="N12. No.06">N12. No.06</option>
                            <option value="N12. No.07">N12. No.07</option>
                            <option value="N12. No.08">N12. No.08</option>
                            <option value="N12. No.09">N12. No.09</option>
                            <option value="N12. No.10">N12. No.10</option>
                            <option value="N12. No.11">N12. No.11</option>
                            <option value="N12. No.12">N12. No.12</option>
                            <option value="N12. No.12A">N12. No.12A</option>
                            <option value="N12. No.14">N12. No.14</option>
                            <option value="N12. No.15">N12. No.15</option>
                            <option value="N12. No.16">N12. No.16</option>
                            <option value="N12A. No.01">N12A. No.01</option>
                            <option value="N12A. No.02">N12A. No.02</option>
                            <option value="N12A. No.03">N12A. No.03</option>
                            <option value="N12A. No.04">N12A. No.04</option>
                            <option value="N12A. No.05">N12A. No.05</option>
                            <option value="N12A. No.06">N12A. No.06</option>
                            <option value="N12A. No.07">N12A. No.07</option>
                            <option value="N12A. No.08">N12A. No.08</option>
                            <option value="N12A. No.09">N12A. No.09</option>
                            <option value="N12A. No.10">N12A. No.10</option>
                            <option value="N12A. No.11">N12A. No.11</option>
                            <option value="N12A. No.12">N12A. No.12</option>
                            <option value="N12A. No.12A">N12A. No.12A</option>
                            <option value="N12A. No.14">N12A. No.14</option>
                            <option value="N12A. No.15">N12A. No.15</option>
                            <option value="N12A. No.16">N12A. No.16</option>
                            <option value="N14. No.01">N14. No.01</option>
                            <option value="N14. No.02">N14. No.02</option>
                            <option value="N14. No.03">N14. No.03</option>
                            <option value="N14. No.04">N14. No.04</option>
                            <option value="N14. No.05">N14. No.05</option>
                            <option value="N14. No.06">N14. No.06</option>
                            <option value="N14. No.07">N14. No.07</option>
                            <option value="N14. No.08">N14. No.08</option>
                            <option value="N14. No.09">N14. No.09</option>
                            <option value="N14. No.10">N14. No.10</option>
                            <option value="N14. No.11">N14. No.11</option>
                            <option value="N14. No.12">N14. No.12</option>
                            <option value="N14. No.12A">N14. No.12A</option>
                            <option value="N14. No.14">N14. No.14</option>
                            <option value="N14. No.15">N14. No.15</option>
                            <option value="N14. No.16">N14. No.16</option>
                            <option value="N15. No.01">N15. No.01</option>
                            <option value="N15. No.02">N15. No.02</option>
                            <option value="N15. No.03">N15. No.03</option>
                            <option value="N15. No.04">N15. No.04</option>
                            <option value="N15. No.05">N15. No.05</option>
                            <option value="N15. No.06">N15. No.06</option>
                            <option value="N15. No.07">N15. No.07</option>
                            <option value="N15. No.08">N15. No.08</option>
                            <option value="N15. No.09">N15. No.09</option>
                            <option value="N15. No.10">N15. No.10</option>
                            <option value="N15. No.11">N15. No.11</option>
                            <option value="N15. No.12">N15. No.12</option>
                            <option value="N15. No.12A">N15. No.12A</option>
                            <option value="N15. No.14">N15. No.14</option>
                            <option value="N15. No.15">N15. No.15</option>

                            <option value="O2. No.01">O2. No.01</option>
                            <option value="O2. No.02">O2. No.02</option>
                            <option value="O2. No.03">O2. No.03</option>
                            <option value="O2. No.04">O2. No.04</option>
                            <option value="O2. No.05">O2. No.05</option>
                            <option value="O2. No.06">O2. No.06</option>
                            <option value="O2. No.07">O2. No.07</option>
                            <option value="O2. No.08">O2. No.08</option>
                            <option value="O2. No.09">O2. No.09</option>
                            <option value="O2. No.10">O2. No.10</option>
                            <option value="O2. No.11">O2. No.11</option>
                            <option value="O2. No.12">O2. No.12</option>
                            <option value="O2. No.12A">O2. No.12A</option>
                            <option value="O2. No.14">O14. No.14</option>

                            <option value="O3. No.01">O3. No.01</option>
                            <option value="O3. No.02">O3. No.02</option>
                            <option value="O3. No.03">O3. No.03</option>
                            <option value="O3. No.04">O3. No.04</option>
                            <option value="O3. No.05">O3. No.05</option>
                            <option value="O3. No.06">O3. No.06</option>
                            <option value="O3. No.07">O3. No.07</option>
                            <option value="O3. No.08">O3. No.08</option>
                            <option value="O3. No.09">O3. No.09</option>
                            <option value="O3. No.10">O3. No.10</option>
                            <option value="O3. No.11">O3. No.11</option>
                            <option value="O3. No.12">O3. No.12</option>
                            <option value="O3. No.12A">O3. No.12A</option>
                            <option value="O3. No.14">O3. No.14</option>
                            <option value="O3. No.05">O3. No.05</option>
                            <option value="O3. No.06">O3. No.06</option>
                            <option value="O3. No.07">O3. No.07</option>
                            <option value="O3. No.08">O3. No.08</option>
                            <option value="O3. No.09">O3. No.09</option>
                            <option value="O3. No.10">O3. No.10</option>
                            <option value="O3. No.11">O3. No.11</option>
                            <option value="O3. No.12">O3. No.12</option>
                            <option value="O3. No.12A">O3. No.12A</option>
                            <option value="O3. No.14">O3. No.14</option>
                            <option value="O3. No.15">O3. No.15</option>
                            <option value="O3. No.16">O3. No.16</option>
                            <option value="O3. No.17">O3. No.17</option>
                            <option value="O3. No.18">O3. No.18</option>
                            <option value="O3. No.19">O3. No.19</option>
                            <option value="O3. No.20">O3. No.20</option>
                            <option value="O3. No.21">O3. No.21</option>
                            <option value="O3. No.22">O3. No.22</option>
                            <option value="O3. No.23">O3. No.23</option>
                            <option value="O3. No.24">O3. No.24</option>
                            <option value="O3. No.25">O3. No.25</option>
                            <option value="O3. No.26">O3. No.26</option>
                            <option value="O3. No.27">O3. No.27</option>
                            <option value="O3. No.28">O3. No.28</option>
                            <option value="O3. No.29">O3. No.29</option>
                            <option value="O3. No.30">O3. No.30</option>
                            <option value="O3. No.31">O3. No.31</option>
                            <option value="O3. No.32">O3. No.32</option>
                            <option value="O3. No.33">O3. No.33</option>
                            <option value="O3. No.34">O3. No.34</option>
                            <option value="O3. No.35">O3. No.35</option>
                            <option value="O3. No.36">O3. No.36</option>

                            <option value="O4. No.01">O4. No.01</option>
                            <option value="O4. No.02">O4. No.02</option>
                            <option value="O4. No.03">O4. No.03</option>
                            <option value="O4. No.04">O4. No.04</option>
                            <option value="O4. No.05">O4. No.05</option>
                            <option value="O4. No.06">O4. No.06</option>
                            <option value="O4. No.07">O4. No.07</option>
                            <option value="O4. No.08">O4. No.08</option>
                            <option value="O4. No.09">O4. No.09</option>
                            <option value="O4. No.10">O4. No.10</option>
                            <option value="O4. No.11">O4. No.11</option>
                            <option value="O4. No.12">O4. No.12</option>
                            <option value="O4. No.12A">O4. No.12A</option>
                            <option value="O4. No.14">O4. No.14</option>
                            <option value="O4. No.05">O4. No.05</option>
                            <option value="O4. No.06">O4. No.06</option>
                            <option value="O4. No.07">O4. No.07</option>
                            <option value="O4. No.08">O4. No.08</option>
                            <option value="O4. No.09">O4. No.09</option>
                            <option value="O4. No.10">O4. No.10</option>
                            <option value="O4. No.11">O4. No.11</option>
                            <option value="O4. No.12">O4. No.12</option>
                            <option value="O4. No.12A">O4. No.12A</option>
                            <option value="O4. No.14">O4. No.14</option>
                            <option value="O4. No.15">O4. No.15</option>
                            <option value="O4. No.16">O4. No.16</option>
                            <option value="O4. No.17">O4. No.17</option>
                            <option value="O4. No.18">O4. No.18</option>
                            <option value="O4. No.19">O4. No.19</option>
                            <option value="O4. No.20">O4. No.20</option>
                            <option value="O4. No.21">O4. No.21</option>
                            <option value="O4. No.22">O4. No.22</option>
                            <option value="O4. No.23">O4. No.23</option>
                            <option value="O4. No.24">O4. No.24</option>
                            <option value="O4. No.25">O4. No.25</option>
                            <option value="O4. No.26">O4. No.26</option>
                            <option value="O4. No.27">O4. No.27</option>
                            <option value="O4. No.28">O4. No.28</option>
                            <option value="O4. No.29">O4. No.29</option>
                            <option value="O4. No.30">O4. No.30</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nomor Kontak/WA</td>
                    <td>:</td>
                    <td><input type="text" name="no_kontak" class="form-control" value="<?php echo $p['no_kontak']; ?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input type="text" name="email_warga" class="form-control" value="<?php echo $p['email_warga']; ?>"></td>
                </tr>
                <tr>
                    <td>Status Tinggal</td>
                    <td>:</td>
                    <td>
                        <select name="status_tinggal" class="form-control" required>
                            <option value="<?php echo $p['status_tinggal']; ?>"><?php echo $p['status_tinggal']; ?></option>
                            <option value="Tetap">Tetap</option>
                            <option value="Tidak Tetap">Tidak Tetap</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>SHDK</td>
                    <td>:</td>
                    <td>
                        <select name="hubungan" class="form-control" required>
                            <option value="<?php echo $p['hubungan']; ?>"><?php echo $p['hubungan']; ?></option>
                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                            <option value="Istri">Istri</option>
                            <option value="Anak">Anak</option>
                            <option value="Saudara">Saudara</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nomor KK</td>
                    <td>:</td>
                    <td><input type="text" name="nokk" class="form-control" value="<?php echo $p['nokk']; ?>"></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        <select name="status" class="form-control" required>
                            <option value="<?php echo $p['status']; ?>"><?php echo $p['status']; ?></option>
                            <option value="Aktif">Aktif</option>
                            <option value="Non Aktif">Non Aktif</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="btn bg-green form-control waves-effect">Simpan</button></td>
                    <td></td>
                    <td>
                        <a class="btn bg-orange form-control waves-effect" href="<?php echo site_url('Warga/profil/' . $p['no_ktp']); ?>">Back</a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="footer">

        </div>
    </div>
</form>