<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Kirim Hasil Kaji Kelengkapan Dokumen dan RPP</h3>
	</div>

	<!-- <div class="panel-body"> -->
		<form action="<?php echo base_url('pokja/pengajuan/kirim_hasil_lelang') ?>" method="POST" id="form-pokja-hasil-lelang" enctype="multipart/form-data">
			<input type="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>">
			
			<div class="panel-body">

				<div class="form-group">
					<label class="control-label">File Hasil Lelang (Opsional)</label>
					<input type="file" name="fileUpload">
				</div>

				<div class="form-group">
					<label class="control-label">Hasil Lelang</label>
					<textarea class="summernote" name="Hasil_Lelang" required="">
Mohon ditindaklanjuti
					</textarea>
				</div>

				
				<div class="form-group">
					<label class="control-label">Catatan</label>
					<textarea class="summernote" name="Catatan">
					</textarea>
				</div>

				<a href="javascript:void(0)" onclick="submitForm()" class="btn btn-primary btn-block">Kirim Hasil ke PPK</a>
			</div>
		</form>	
	<!-- </div> -->

</div>

<script type="text/javascript">

	function submitForm(){

		confBootBox('Apakah anda yakin akan melakukan aksi ini?', function(resul){
			if (resul == true){
				$('#form-pokja-hasil-lelang').trigger('submit');
			}
		});
	}
</script>