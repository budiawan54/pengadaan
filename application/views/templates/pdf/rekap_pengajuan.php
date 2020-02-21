<?php
	$tanggal = date('Y-m-d');
    $day = date('D', strtotime($tanggal));
    $dayList = array(
    	'Sun' => 'Minggu',
    	'Mon' => 'Senin',
    	'Tue' => 'Selasa',
    	'Wed' => 'Rabu',
    	'Thu' => 'Kamis',
    	'Fri' => 'Jumat',
    	'Sat' => 'Sabtu'
    );

?>

<style>
	body{
		font-size : 0.6em;
	}

</style>

<body>
<div style="text-align: center;">
<h4 class="text-center text-subtitile" style="text-decoration: none !important;"><U>LAPORAN SEMENTARA HASIL PENGADAAN BARANG/JASA UNIT LAYANAN PENGADAAN PROVINSI BALI AKHIR BULAN <?php echo strtoupper(getBulan($bulan)) ?></U></h4>
<h4 class="text-center text-subtitile" style="text-decoration: none !important;">Kondisi : Hari <?php echo $dayList[$day] ?>, <?php echo getDates($tanggal); ?></h4>
</div>

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
		border : 1px solid #525252;
		padding: 5px 7px;
	}
</style>
<table class="table-rekap">
	<tr>
		<th>No.</th>
		<th>Proses</th>
		<th>Nama Paket</th>
		<th>OPD</th>
		<th>Pagu (Rp)</th>
		<th>HPS (Rp)</th>
		<th>Kategori</th>
		<th>Nama Pemenang/Alamat/Tgl. SPPBJ</th>
		<th>Harga Penawaran (Rp)</th>
		<th>Sisa Anggaran (Rp)</th>
		<th>Prosentase dari HPS</th>
		<th>Jml Pendaftar</th>
		<th>Jml Penawar</th>
		<th>Pokja</th>
		<th>Ket</th>
	</tr>

	<?php

		foreach ($pengajuan as $key => $value) {
			$j = $key + 1;
			?>
				<tr>
					<td><?php echo $j ?></td>
					<td>
						<?php
							if ($value['Progress'] == 'lelang_diterima'){
								echo 'Selesai';
							}
							elseif($value['Progress'] == 'batal'){
								echo 'Batal';

							}
							else{
								echo 'Dalam proses';
							}
						?>
					</td>
					<td><?php echo $value['Paket_Pengadaan'] ?></td>
					<td><?php echo $value['Nama_Skpd'] ?></td>
					<td><?php echo $value['Pagu_Anggaran'] ?></td>
					<td><?php echo $value['HPS'] ?></td>
					<td></td>
					<td><?php echo $value['Nama_Pemenang'] ?>/<?php echo $value['Alamat_Pemenang'] ?>/<?php echo $value['Tgl_Sppbj'] ?></td>
					<td><?php echo $value['Nilai_Penawaran_Hasil'] ?></td>
					<td><?php echo $value['Sisa_Anggaran'] ?></td>
					<td><?php echo $value['Prosentase_HPS'] ?></td>
					<td><?php echo $value['Jml_Pendaftar'] ?></td>
					<td><?php echo $value['Jml_Penawar'] ?></td>
					<td><?php echo $value['nama_pokja'] ?></td>
					<td></td>
				</tr>
			<?php
		}

	?>
</table>
</body>
