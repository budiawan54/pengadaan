<?php $this->load->view('templates/pdf/header'); ?>

<h2 class="text-center text-subtitile" style="text-decoration: none !important;">DETAIL PENGAJUAN PENGADAAN</h2>



<table style="text-align: center;">
	<tr>
		<td colspan="2"></td>
		<td>Singaraja, <?php echo getDates(date('Y-m-d')) ?></td>
	</tr>
	<tr>
		<td></td>
		<td style="color: #FFF;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
		</td>
		<td>POKJA</td>
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
			<img src="<?php echo $base64; ?>" style="width: 150px;">
		</td>
		<td></td>
		<td>
			<span style="font-weight: bold; text-decoration: underline;"><?php echo '('. $pokja['Nama_Lengkap'] .')' ?></span>
		</td>
	</tr>
</table>

	
<br>
<br>
<br>
<?php $this->load->view('templates/pdf/footer'); ?>



</html>
