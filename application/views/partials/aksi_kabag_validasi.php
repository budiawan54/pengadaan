


<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Aksi Pengajuan</h3>
	</div>

	<form action="<?php echo base_url('kabag/pengajuan/kirimKePPK') ?>" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>">
		
		<textarea class="summernote" name="Catatan">
Mohon ditindaklanjuti
		</textarea>
		
		<div class="panel-body">
			<input type="submit" class="btn btn-success btn-block" value="Kirim Ke PPK">
		</div>
	</form>	

</div>