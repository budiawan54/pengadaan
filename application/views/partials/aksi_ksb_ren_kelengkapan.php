<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Catatan</h3>
	</div>

	<!-- <div class="panel-body"> -->
		
			<input type="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>">
			<input type="hidden" name="Progress">
			
			<!-- <div class="panel-body">
				<div class="form-group">
					<a href="<?php echo base_url('/ksb_ren/pengajuan/download/lembarverifikasi/'.$pengajuan['Id_Pengajuan_Pengadaan']) ?>" class="btn btn-primary btn-xs"><i class="fa fa-print"></i> Download Template Lembar Verifikasi</a>
				</div>
				
				<div class="form-group">
					<div class="row">
						<div class="col-md-4">
							
							<label class="control-label">Lembar Verifikasi <span class="text-danger">*</span></label>
							<input type="file" class="filestyle" name="fileUpload" required="">
							<div class="help-block">Silahkan masukan lembar verifikasi yang telah di TTD oleh PPTK</div>
						</div>
					</div>

				</div>
			</div> -->


			<textarea class="summernote" name="Catatan">
Mohon ditindaklanjuti
			</textarea>
			
			<div class="panel-body">
				<a href="javascript:void(0)" onclick="gantiProgress('terima_ksb_ren')"  class="btn btn-success">Pengajuan Lengkap</a>
				<a href="javascript:void(0)" onclick="submitForm('tolak_fo')" class="btn btn-danger">Pengajuan Kurang Lengkap</a>
			</div>

	<!-- </div> -->

</div>



</form>



<!-- Modal -->
<div id="modalPass" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

	    <!-- Modal content-->
	  	<div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Konfirmasi Persetujuan</h4>
	      </div>
	      <div class="modal-body">

				<form action="<?php echo base_url('fo/pengajuan/verifikasi') ?>" method="POST">
					<input type="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>">
					
					<p>Silahkan masukan password anda untuk verifikasi</p>
					<div class="form-group">
						<input type="password" class="form-control" name="password">
					</div>


		<textarea class="summernote" name="Catatan">
Mohon ditindaklanjuti
		</textarea>

					<input type="submit" class="btn btn-info" value="Verifikasi">
				</form>	
		</div>
		</div></div>
</div>





<script type="text/javascript" src="<?php echo base_url('/resources/plugins/bootstrap-filestyle-1.2.1/src/bootstrap-filestyle.min.js') ?>"></script>

<script type="text/javascript">
    $(":file").filestyle();

	function gantiProgress(progress){
		$('input[name=Progress]').val(progress);


		if (progress == 'tolak_fo'){
			confBootBox('Apakah anda yakin akan menolak permohonan pengajuan ini?', function(resul){
				if (resul == true){
					var dialog = bootbox.dialog({
					    message: '<p class="text-center">Sedang mengirim data...</p>',
					    closeButton: false
					});
					$('#form-dek').trigger('submit');
				}
			});
		}
		else{
			$('#modalPass').modal('show');

		}

	}

	function submitForm(progress){
		$('input[name=Progress]').val(progress);

		confBootBox('Apakah anda yakin akan melakukan aksi ini?', function(resul){
			if (resul == true){
				var dialog = bootbox.dialog({
				    message: '<p class="text-center">Sedang mengirim data...</p>',
				    closeButton: false
				});
				$('#form-catatan-fo').trigger('submit');
				
			}
		});
	}



	// var submitPengajuan = false;
	// $('#form-dek').on("submit", function(e){
	//     if (submitPengajuan == false){
	//         e.preventDefault();
	//         confBootBox('Apakah anda yakin untuk melakukan aksi ini?', function(resul){
	//             if (resul == true){
	//                 submitPengajuan = true;
	//                 $('#form-dek').trigger('submit');
	//             }
	//         });
	//     }
	// });


</script>