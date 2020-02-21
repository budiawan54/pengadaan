<style type="text/css">
	.table{
		width: 95%;
		border-collapse: collapse;
	}
	.table tr th, .table tr td{
		border : 1px solid #7B7B7B;
		padding: 3px;
	}
	body{
		font-size: 0.8em;
	}
</style>

<body>

<h3 style="text-align: center">
	Daftar Isi Buku Tamu
</h3>
<h5 style="text-align: center">Tanggal <?php echo $tanggal ?>
	

	<?php
		if ($nama_skpd != ''){
			echo 'SKPD ' . $nama_skpd;
		}

	?>
</h5>


<table class="table">
	
	<tr>
		<th style="width: 10px;">No</th>
		<th style="width : 50px;">Foto</th>
		<th>Nama</th>
		<th width="40">Jenis</th>
		<th>Penyedia/Instansi</th>
		<th>Unit Tujuan</th>
		<th>Keperluan</th>
		<th>Tanggal</th>
	</tr>
	<?php  
		foreach ($buku_tamu as $key => $value) {
			$i = $key  + 1;
			?>
				<tr>
					<td><?php echo $i ?></td>
					<td><img src="<?php echo $value['foto'] ?>" style="width: 100px;"></td>
					<td><?php echo $value['nama'] ?></td>
					<td><?php echo $value['jenis'] ?></td>
					<td><?php echo $value['instansi'] ?></td>
					<td><?php echo $value['Nama_Jabatan'] ?></td>
					<td><?php echo $value['keperluan'] ?></td>
					<td><?php echo $value['created_at'] ?></td>
				</tr>
			<?php
		}
	?>
</table>
</body>