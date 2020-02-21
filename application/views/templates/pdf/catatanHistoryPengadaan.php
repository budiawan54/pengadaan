<?php $this->load->view('templates/pdf/header'); ?>
<br>
<h2 class="text-center text-subtitile" style="text-decoration: none !important;">PENGAJUAN PENGADAAN</h2>
<br>
<h4 class="text-subtitile text-center" style="text-decoration: underline;">HISTORY CATATAN</h4>

<hr class="dotted">
<br>
<br>


<style type="text/css">
	table tr td{
		vertical-align: top;
	}
</style>
<style type="text/css">
	.table-rekap tr th{
		text-align: left;
	}

	.table-rekap {
		border-collapse: collapse;
	}
	.table-rekap tr th, .table-rekap tr td{
		border : 1px solid #525252;
		/*padding: 0px;*/
	}
</style>

<table class="table-rekap">
	
	<tr>
		<th style="width: 10px;">No.</th>
		<th>Waktu</th>
		<th>Dari</th>
		<th>Ke</th>
		<th>Catatan</th>
	</tr>

	<?php
		$i = 1;
		foreach ($catatan as $key => $value) {
	?>	
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $value['Created_At']; ?></td>
				<td><?php echo $value['Nama_Jabatan']; ?></td>
				<td><?php echo $this->pengajuan_m->getNameJabatan($value['Slug_Jabatan_Target']); ?></td>
				<td><?php echo $value['Isi']; ?></td>
			</tr>
	<?php
			$i++;
		}
	?>
</table>

<p style="margin-top: 10px;">*) Berkas ini dicetak oleh <?php echo $userLogin['Nama_Lengkap'] ?> (<?php echo $this->pengajuan_m->getNameJabatan($userLogin['Slug_Jabatan']) ?>) pada <?php echo getDates(date('Y-m-d')); ?></p>
