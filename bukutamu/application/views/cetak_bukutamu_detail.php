<style type="text/css">
	.table{
		width: 100%;
		border-collapse: collapse;
	}
	.table tr th, .table tr td{
		/*border : 1px solid #7B7B7B;*/
		padding: 3px;
	}
	body{
		font-size: 0.9em;
		padding-right: 30px;
	}
</style>

<body>

<h3>Detail Pengunjung</h3>
<hr>
<img style="width: 200px;" src="<?php echo $buku['foto'] ?>">

<table class="table">
	<tr>
		<td style="width: 200px;">Nama</td>
		<td style="width: 300px;"><?php echo $buku['nama'] ?></td>
	</tr>
	<tr>
		<td>NIP/No. KTP</td>
		<td><?php echo $buku['nip_noktp'] ?></td>
	</tr>
	<tr>
		<td>Nama Skpd</td>
		<td><?php echo $nama_skpd ?></td>
	</tr>
	<tr>
		<td>Jenis</td>
		<td><?php echo $buku['jenis'] ?></td>
	</tr>
	<tr>
		<td>Penyedia/Instansi</td>
		<td><?php echo $buku['instansi'] ?></td>
	</tr>
	<tr>
		<td>No. Telp</td>
		<td><?php echo $buku['no_telp'] ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo $buku['email'] ?></td>
	</tr>
	<tr>
		<td>Unit Tujuan</td>
		<td><?php echo $buku['Nama_Jabatan'] ?></td>
	</tr>
	<tr>
		<td>Keperluan</td>
		<td><?php echo $buku['keperluan'] ?></td>
	</tr>

	<tr>
		<td>Catatan</td>
		<td><?php echo $buku['catatan'] ?></td>
	</tr>

</table>
</body>