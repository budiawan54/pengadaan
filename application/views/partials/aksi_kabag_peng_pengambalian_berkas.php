<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Pengembalian Berkas Ke PPK</h3>
	</div>

	<!-- <div class="panel-body"> -->
		<form action="<?php echo base_url('kabag/pengajuan/pengembalian_berkas') ?>" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>">
			
			<div class="panel-body">
				<div class="form-group">
					<label class="control-label">Surat Pengembalian Berkas</label>
					<input type="file" name="fileUpload" required="">
				</div>
				<div class="form-group">
					<label class="control-label">Catatan</label>
					<textarea class="summernote" name="Catatan">
Mohon ditindaklanjuti
					</textarea>
				</div>

				<button type="submit" name="Progress" value="blm_lengkap" class="btn btn-info btn-block">Kirim Berkas Ke PPK</button>
			</div>
		</form>	
	<!-- </div> -->

</div>