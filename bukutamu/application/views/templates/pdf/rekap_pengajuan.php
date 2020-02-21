<?php $this->load->view('templates/pdf/header'); ?>
<h2 class="text-center text-subtitile" style="text-decoration: none !important;">REKAPITULASI PENGAJUAN PENGADAAN</h2>
<h3 class="text-center text-subtitile" style="text-decoration: none !important;"><i>TANGGAL <?php echo getDates($tgl_mulai) .' - '. getDates($tgl_selesai); ?></i></h3>

<br>
<br>

<style type="text/css">
	.table-rekap tr th{
		text-align: left;
	}

	.table-rekap {
		border-collapse: collapse;
	}
	.table-rekap tr th, .table-rekap tr td{
		border : 1px solid #000;
		padding: 5px 7px;
	}
</style>
<table class="table-rekap">
	<tr>
		<th>No</th>
		<th>Tanggal Pengajuan</th>
		<th>Nama Pengaju</th>
		<th>Paket Kegiatan</th>
		<th>Pagu</th>
		<th>HPS</th>
	</tr>
	<?php

		foreach ($pengajuan as $key => $value) {
			$j = $key + 1;
			?>
				<tr>
					<td><?php echo $j ?></td>
					<td><?php echo getDates($value['Created_At']) ?></td>
					<td><?php echo $value['Nama_Lengkap'] ?></td>
					<td><?php echo $value['Paket_Pengadaan'] ?></td>
					<td><?php echo $value['Pagu_Anggaran'] ?></td>
					<td><?php echo $value['HPS'] ?></td>
				</tr>
			<?php
		}

	?>
</table>