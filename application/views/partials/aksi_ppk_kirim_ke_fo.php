


<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Aksi Pengajuan</h3>
	</div>

	<div class="panel-body">
		<div class="alert alert-info">
			<h4 class="semibold title">Petunjuk</h4>
			<p>Silahkan cek data pengajuan sebelum dikirim ke Frontoffice</p>
		</div>
	</div>
		<form action="<?php echo base_url('ppk/pengajuan/kirimkefo') ?>" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>">
			

			<!-- <div class="panel-body">
				<div class="form-group">
					<a href="<?php echo base_url('/ppk/pengajuan/download/lembarverifikasi/'.$pengajuan['Id_Pengajuan_Pengadaan']) ?>" class="btn btn-primary btn-xs"><i class="fa fa-print"></i> Download Template Lembar Verifikasi</a>
				</div>
				
				<div class="form-group">
					<label class="control-label">Lembar Verifikasi</label>
					<input type="file" name="fileUpload" required="">
					<div class="help-block">Silahkan masukan lembar verifikasi yang telah di TTD oleh PPTK</div>
				</div>
			</div> -->

			<textarea class="summernote" name="Catatan">
Mohon ditindaklanjuti
			</textarea>

			<div class="panel-body">
				<input type="submit" class="btn btn-success btn-block" value="Kirim Ke BLP Buleleng">
			</div>
		</form>	
	<!-- </div> -->

</div>