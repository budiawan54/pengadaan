<?php $this->load->view('templates/pdf/header'); ?>

<h2 class="text-center text-subtitile" style="text-decoration: none !important;">LEMBAR VERIFIKASI/PEMANTAPAN KAK, SPESIFIKASI TEKNIK, HPS, DAN RANCANGAN KONTRAK</h2>
<br>
<h4 class="text-subtitile text-center" style="text-decoration: underline;">VERIFIKASI/PEMANTAPAN</h4>

<br>
<br>

<style type="text/css">
	table tr td{
		vertical-align: top;
	}
</style>

<table class="table">
	<tr>
		<td style="width: 5px;">1.</td>
		<td width="300px">OPD</td>
		<td width="10px;">:</td>
		<td colspan="2"><?php echo $skpd['Nama_Skpd'] ?></td>
	</tr>
	<tr>
		<td style="width: 5px;">2.</td>
		<td>ALAMAT SKPD</td>
		<td>:</td>
		<td colspan="2"><?php echo $skpd['Alamat'] ?></td>
	</tr>
	<tr>
		<td style="width: 5px;">3.</td>
		<td>NAMA KEGIATAN</td>
		<td>:</td>
		<td colspan="2"><?php echo $pengajuan['Nama_Kegiatan'] ?></td>
	</tr>
	<tr>
		<td style="width: 5px;">4.</td>
		<td>PAKET PENGADAAN</td>
		<td>:</td>
		<td colspan="2"><?php echo $pengajuan['Paket_Pengadaan'] ?></td>
	</tr>

	<tr>
		<td style="width: 5px;">5.</td>
		<td>PAGU ANGGARAN</td>
		<td>:</td>
		<td colspan="2"><?php echo rupiahFormat($pengajuan['Pagu_Anggaran']) ?></td>
	</tr>

	<tr>
		<td style="width: 5px;">6.</td>
		<td>HPS</td>
		<td>:</td>
		<td colspan="2"><?php echo rupiahFormat($pengajuan['HPS']) ?></td>
	</tr>

	<tr>
		<td style="width: 5px;">7.</td>
		<td>SUMBER DANA</td>
		<td>:</td>
		<td colspan="2"><?php echo $pengajuan['Sumber_Dana'] ?></td>
	</tr>

	<tr>
		<td style="width: 5px;">8.</td>
		<td>NAMA PPK</td>
		<td>:</td>
		<td><?php echo $pengajuan['Nama_Lengkap'] ?></td>
		<td>HP. <?php echo $pengajuan['No_Hp_User'] ?></td>
	</tr>
	<tr>
		<td style="width: 5px;"></td>
		<td>NIP.</td>
		<td>:</td>
		<td colspan="2"><?php echo $pengajuan['NIP_User'] ?></td>
	</tr>
	<tr>
		<td style="width: 5px;">9.</td>
		<td>JABATAN PPK</td>
		<td>:</td>
		<td colspan="2"><?php echo $pengajuan['Jabatan_User'] ?></td>
	</tr>

	<tr>
		<td style="width: 5px;">10.</td>
		<td>NAMA PPTK</td>
		<td>:</td>
		<td><?php echo $pengajuan['Nama_PPTK'] ?></td>
		<td>HP. <?php echo $pengajuan['No_Hp'] ?></td>
	</tr>
	<tr>
		<td style="width: 5px;"></td>
		<td>NIP.</td>
		<td>:</td>
		<td colspan="2"><?php echo $pengajuan['NIP'] ?></td>
	</tr>

	<?php


		foreach ($kelengkapan as $key => $value) {
			$i = 11 + $key;

			?>

				<tr>
					<td><?php echo $i.'.'; ?></td>
					<td><?php echo $value['Deskripsi'] ?></td>
					<td>:</td>
					<td>
						<?php
							if (isset($value['isian']) && $value['isian']['Nama_File'] != null){
								echo 'Ada';
							}
							else{
								echo '<i>Tidak Ada</i>';
							}
						?>
					</td>
				</tr>

			<?php
		}

	?>
</table>

<br>


<table style="text-align: center;">
	<tr>
		<td colspan="2"></td>
		<td>Singaraja, <?php echo getDates(date('Y-m-d')) ?></td>
	</tr>
	<tr>
		<td>PPK</td>
		<td style="color: #FFF;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		</td>
		<td>PPTK</td>
	</tr>
	<tr>
		<td colspan="3">
			<br>
			<br>
			<br>
		</td>
	</tr>
	<tr>
		<td>
			<span style="font-weight: bold; text-decoration: underline;"><?php echo '('. $pengajuan['Nama_Lengkap'] .')' ?></span><br>
			<!-- <p style="margin-top: 5px;">Kode Verifikasi : <?php echo $pengajuan['Kode_Verifikasi'] ?></p> -->
			<p>

				<!-- <img src="<?php //echo $base64 ?>" style="width: 120px;"> -->
			</p>
		</td>
		<td></td>
		<td>
			<span style="font-weight: bold; text-decoration: underline;"><?php echo '('. $pengajuan['Nama_PPTK'] .')' ?></span>
		</td>
	</tr>
</table>


<br>
<br>
<br>
<?php $this->load->view('templates/pdf/footer'); ?>



</html>
