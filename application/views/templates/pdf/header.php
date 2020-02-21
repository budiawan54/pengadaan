<html>
<?php
	$file = './resources/image/logo.png';
    $imtype = pathinfo($file, PATHINFO_EXTENSION);
    $imdata = file_get_contents($file);
    $logo = 'data:image/' . $imtype . ';base64,' . base64_encode($imdata);
?>

<style type="text/css">
	body{
		padding: 0px;
		margin: 0px 20px;
		font-size: 0.8em;
		font-family: 'AdobeArabic';
	}
	h1, h2, h3, h4, p{
		/*line-height: 10px;*/
		margin: 0px;
	}
	h1{
		font-size: 1.5em;
		font-weight: normal;
	}
	h2{
		font-size: 1.4em;
		font-weight: normal;

	}
	h3{
		font-size: 1.2em;
		font-weight: normal;

	}
	h4{
		font-size: 1em;
		font-weight: normal;
	}
	table{
		width: 100%;
	}
	table td{
		padding: 0;
		margin: 0;
		text-align: left;
	}
	hr{
		border: none;
		height: 2px;
		border-top: 1px solid #000;
		border-bottom: 1px solid #000;
	}

	hr.dotted{
		margin-top: 18px;
		border:none;
		 border-top:1px dotted #000;
		  color:#fff;
		  background-color:#fff;
		  height:1px;
	}
	.pull-right{
		margin-left: 250px;
	}
</style>

<style type="text/css">
	.text-center{
		text-align: center;
	}
	.text-subtitile{
		text-align: center;
		text-decoration: underline;
		text-transform: uppercase;
	}
</style>

<body>
	<table style="width: 100%;">
		<tr>
			<td width="70px;">
				<img style="width: 100%;" src="<?php echo $logo ?>">
			</td>
			<td>
				<center>
					<h2 style="margin-bottom: 0px;">PEMERINTAH PROVINSI BALI</h2>
					<h1 style="text-transform: uppercase;">SEKRETARIAT DAERAH</h1>
					<h1 style="text-transform: uppercase;">BIRO PENGADAAN</h1>
					<?php
					/*
					<p style="font-size: 0.9em;">Alamat : <?php echo showKontenByKey('alamat', $konten); ?>&nbsp;&nbsp;&nbsp;&#8226;&nbsp;&nbsp;&nbsp;Telp./Fax : <?php echo showKontenByKey('telp_fax', $konten); ?></p> */
					?>
				</center>
			</td>
		</tr>
	</table>
	<hr>
