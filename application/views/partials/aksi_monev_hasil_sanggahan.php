


<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Aksi Pengajuan</h3>
	</div>

	<form action="<?php echo base_url('ksb_pel/pengajuan/kirimKeKabag') ?>" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>">
		
		<div class="row">
			<div class="col-sm-5">
			<div class="panel-body ">

				<div class="form-group">
					<label class="control-label">Jumlah Sanggahan</label>
					<input type="text" name="Jumlah_Sanggahan_Monev" id="jumlah_sanggahan_monev" class="form-control" required="" value="0">	
				</div>
				<div class="form-group" id="targetFile">
							<label class="control-label">File Pendukung</label>
							<input type="file" name="fileUpload" class="filestyle" id="filePendukung">
				</div>
			</div>
			</div>
		</div>
		<textarea class="summernote" name="Catatan">
Mohon ditindaklanjuti
		</textarea>
		
		<div class="panel-body">
			<input type="submit" class="btn btn-success btn-block" value="Verifikasi dan Kirim ke PPK">
		</div>
	</form>	

</div>

<script type="text/javascript" src="<?php echo base_url('/resources/plugins/bootstrap-filestyle-1.2.1/src/bootstrap-filestyle.min.js') ?>"></script>
<script type="text/javascript">
	$(":file").filestyle();


	function onchangejml(){
		var nilai = $('#jumlah_sanggahan_monev').val();

		if (nilai > 0){

			$('#targetFile').show();
			$('#filePendukung').attr('required', true);
		}
		else{
			$('#targetFile').hide();
			$('#filePendukung').removeAttr('required');
		}
	}

	$(function(){

		onchangejml();
		
		$('#jumlah_sanggahan_monev').on("change", function(){
			onchangejml();
		});
		
	})
</script>