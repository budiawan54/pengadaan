


<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Upload Hasil TRC</h3>
	</div>

	<form action="<?php echo base_url('ksb_pel/pengajuan/upload_hasil_trc') ?>" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>">
		
		<div class="row">
			<div class="col-sm-5">
			<div class="panel-body ">

				<div class="form-group">
					<label class="control-label">File Pendukung</label>
					<input type="file" name="fileUpload" required="" class="filestyle">
				</div>
			</div>
			</div>
		</div>
		<textarea class="summernote" name="Catatan">
Mohon ditindaklanjuti
		</textarea>
		
		<div class="panel-body">
			<input type="submit" class="btn btn-success btn-block" value="Upload Hasil TRC">
		</div>
	</form>	

</div>

<script type="text/javascript" src="<?php echo base_url('/resources/plugins/bootstrap-filestyle-1.2.1/src/bootstrap-filestyle.min.js') ?>"></script>
<script type="text/javascript">
	$(":file").filestyle();
</script>