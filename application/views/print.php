<div class="card">
	<div class="body">


		<div class="container" style="width: 595px;height: 842px; ">
			<center>
				<div class="col-md-2"><img src="<?php echo logo(); ?>" width="87px" height="100px"></div>
				<div class="col-md-10">
					<h3>PENGURUS RT 00<?php echo $rt . " RW 0" . get_setting('rw'); ?></h3>
					<h5>Desa <?php echo get_setting('kelurahan') . " Kecamatan " . get_setting('kecamatan') . " Kabupaten " . get_setting('kota'); ?></h5>
					<hr style="line-height: 6px; border-color: black">
					<h4><u>SURAT KETERANGAN</u></h4>
					No. <?php echo $k['nomor_surat']; ?>
				</div>
			</center><br><br>
			<p style="text-align: justify">Yang bertanda tangan dibawah ini <b>Ketua RT 00<?php echo $rt; ?> RW 0<?php echo get_setting('rw'); ?> Desa <?php echo get_setting('kelurahan') . " Kecamatan " . get_setting('kecamatan') . " Kabupaten " . get_setting('kota'); ?> </b>dengan ini menerangkan bahwa :</p>
			<center>
				<table width="70%">
					<tr>
						<td width="25%">Nama</td>
						<td width="5%">:</td>
						<td><?php echo $k['nama_lengkap']; ?></td>
					</tr>
					<tr>
						<td>Tgl. Lahir</td>
						<td>:</td>
						<td><?php echo date('d-m-Y', strtotime($k['tgl_lahir'])); ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td><?php echo $k['sex']; ?></td>
					</tr>
					<tr>
						<td>Pekerjaan</td>
						<td>:</td>
						<td><?php echo $k['pekerjaan']; ?></td>
					</tr>
					<tr>
						<td>Agama</td>
						<td>:</td>
						<td><?php echo $k['agama']; ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><?php echo get_setting('komplek') . " " . $k['no_rumah']; ?></td>
						<td></td>
						
					</tr>
				</table>
			</center><br><br>
			<p style="text-align: justify">
				Orang tersebut diatas, adalah <b>benar-benar warga kami dan berdomisili di RT 00<?php echo $rt; ?> RW 0<?php echo get_setting('rw'); ?> Desa <?php echo get_setting('kelurahan') . " Kecamatan " . get_setting('kecamatan') . " Kabupaten " . get_setting('kota'); ?>. </b>Surat Keterangan ini dibuat sebagai kelengkapan pengurusan <b><?php echo $k['keperluan']; ?></b>.
			</p>
			<br>
			<p style="text-align: justify">
				Demikian surat keterangan ini kami buat, untuk dapat dipergunakan sebagaimana mestinya.
			</p>
			<br>
			<br>
			<br>
			<p style="text-align: right">
				<?php echo get_setting('kota') . ", " . date('d M Y', strtotime($k['tgl_penerbitan'])); ?><br>
				<b>Ketua RT 00<?php echo $rt; ?> RW 0<?php echo get_setting('rw'); ?></b>
				<br>
				<br>
				<br>
				<br>
				<u><?php echo $ketua['nama_lengkap']; ?></u>
			</p>
		</div>
	</div>

</div>