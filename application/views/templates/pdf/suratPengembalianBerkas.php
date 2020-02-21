<?php $this->load->view('templates/pdf/header'); ?>



<div style="margin-left: 450px;">
	Bali, <?php echo getDates($pengajuan['Tgl_Pengembalian']); ?>
</div>


<table >

	<tr>
		<td>
			Nomor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $pengajuan['No_Surat_Pengembalian'] ?><br>
			Lampiran&nbsp;&nbsp;: 1 (satu) gabung<br>
			Peribah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <u><b><i>Pengembalian Dokumen Paket Pengadaan</i></b></u><br>
		</td>
		<td>

			Kepada : <br>
			Yth. Pejabat Pembuat Komitmen<br>
			<?php echo $pengajuan['Nama_Lengkap'] ?><br>

			di - <br>
				Bali
		</td>
	</tr>


</table>




<br>
<br>
<br>
<br>
<br>


<div style="margin-left: 30px;">

	<p style="text-align: justify;">
		<?php echo space(10) ?>Sehubungan dengan dokumen paket pengadaan yang disampaikan kepada kami sebagai berikut : <br>

		<table >
			<tr>
				<td width="70px;">Nama paket</td>
				<td width="10px;">:</td>
				<td><?php echo $pengajuan['Paket_Pengadaan'] ?></td>
			</tr>
			<tr>
				<td>Pagu</td>
				<td>:</td>
				<td><?php echo rupiahFormat($pengajuan['Pagu_Anggaran']) ?></td>
			</tr>
			<tr>
				<td>HPS</td>
				<td>:</td>
				<td><?php echo rupiahFormat($pengajuan['HPS']) ?></td>
			</tr>
		</table>
	</p>

	<p style="text-align: justify;">

	<?php echo space(10) ?>Mohon kiranya dilengkapi dokumen sesuai hasil verifikasi terlampir. Demikian atas perhatian dan kerjasamanya disampaikan terima kasih
	</p>
</div>


<br>
<br>
<br>

<table style="margin-left: 280px;">
	<tr>
		<td style="vertical-align: top;">An.</td>
		<td>Sekretaris Daerah Provinsi Bali,<br>Asisten Administrasi Perekonomian dan Pembangunan</td>
	</tr>
	<tr>
		<td style="vertical-align: top;">Ub.</td>
		<td>Kepala Bagian Layanan Pengadaan


			<br>
			<br>
			<br>
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


<br>
<br>
<br>

<u><i>Tembusan disampaikan kepada</i></u><br>
1. Arsip
