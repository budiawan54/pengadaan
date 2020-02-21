<?php $this->load->view('templates/pdf/header'); ?>

<h2 class="text-center text-subtitile">SURAT TUGAS</h2>
<h4 class="text-center text-subtitile" style="text-decoration: none !important">Nomor : <?php echo $nomor; ?></h4>

<br>

<p style="text-align: justify;">
	<?php echo space(10) ?>Sehubungan dengan proses pemilihan penyediaan paket pekerjaan <?php echo $pengajuan['Nama_Kegiatan'] ?>, pagu anggaran Rp.<?php echo $pengajuan['Pagu_Anggaran'] ?> <!--dari Dinas Pertanian-->, maka untuk kelancaran dan optimalisasi proses tahapan-tahapan pemilihan penyedia, ditugaskan kepada POKJA. Untuk dapat melakukan hal-hal sebagai berikut :
</p>

<br>
<br>

<ol>
	<li>Komunikasi dan Koordinasi Pengadaan</li>
	<li>Pengelolaan Data dan Informasi Pengadaan</li>
	<li>Pengalolaan / Penataan Dokumen Pengadaan</li>
	<li>Evaluasi Kinerja Pengadaan</li>
	<li>Ekspose hasil pemilihan penyedia</li>
</ol>

<br>
<br>

<p style="text-align: justify;">
<?php echo space(10) ?>Demikian surat tugas ini dibuat untuk dapat dipergunakan sebagaimana mestinya, dan atas perhatiannya diucapkan terimakasih.
</p>

<br>
<br>

<table style="text-align: center;">
	<tr>
		<td style="width: 450px;">
			<!-- <img src="<?php echo $base64 ?>" width="120px;"> -->
		</td>
		<td>
			Singaraja, <?php echo getDates(date('Y-m-d')) ?><br>


					Kepala Bagian Layanan Pengadaan<br>
					Provinsi Bali
					<br>
					<br>
					<br>
					<!-- <h3> -->
						<strong style="border-bottom: 1px solid #000;">
						<?php echo $kabag_peng['Nama_Lengkap']; ?>
						</strong><br>
						NIP.<?php echo $kabag_peng['NIP_User'] ?>
					<!-- </h3> -->


		</td>
	</tr>
</table>
</html>
