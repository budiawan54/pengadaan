<?php $this->load->view('templates/pdf/header'); ?>
<style type="text/css">
	.table-bordered {
		border-collapse: collapse;
	}
	.table-bordered tr th, .table-bordered tr td{
		border : 1px solid #525252;
		padding: 5px;
	}
</style>
<center>
	<h3><b>Laporan Hasil Rapat Kaji Ulang Persiapan Pengadaan</b></h3>
</center>

<br>

<table>
	<tr>
		<td>PAKET PENGADAAN</td>
		<td><?php echo $pengajuan['Paket_Pengadaan'] ?></td>
	</tr>
	<tr>
		<td>HPS</td>
		<td><?php echo rupiahFormat($pengajuan['HPS']) ?></td>
	</tr>
	<tr>
		<td>SKPD</td>
		<td><?php echo $pengajuan['Nama_Skpd'] ?></td>
	</tr>
	<tr>
		<td>Pokja</td>
		<td><?php echo $pokja['Username'] . ' ('. $pokja['Nama_Lengkap'] .')' ?></td>
	</tr>
	<tr>
		<td>Nama PPK</td>
		<td><?php echo $pengajuan['Nama_Lengkap'] ?></td>
	</tr>
</table>


<hr>

<table class="table-bordered">
	<tr>
		<th style="width: 10px;">No.</th>
		<th>Kajian, Catatan, dan Usulan Pokja Bagian Layanan Pengadaan</th>
		<th style="width: 150px;">Tanggapan PPK</th>
		<th style="width: 150px;">Keterangan</th>
	</tr>

	<?php
		foreach ($hasil_kaji as $key => $value) {
	?>
			<tr>
				<td><?php echo ($key + 1) ?></td>
				<td><?php echo $value['isi'] ?></td>
				<td><?php echo $value['status'] ?></td>
				<td><?php echo $value['keterangan'] ?></td>
			</tr>
	<?php
		}
	?>

</table>

<br>
<br>

<center>
	<h4><b>POKJA BAGIAN LAYANAN PENGADAAN</b></h4>
</center>
<br>

<table class="table-bordered">
	<tr>
		<th>Nama</th>
		<th style="width: 200px;">Tanda Tangan</th>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td></td>
	</tr>
</table>

<br>
<br>

<center>
	<h4><b>PIHAK <?php echo strtoupper($pengajuan['Nama_Skpd']) ?></b></h4>
</center>
<br>

<table class="table-bordered">
	<tr>
		<th>Nama</th>
		<th style="width: 200px;">Tanda Tangan</th>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td></td>
	</tr>
</table>