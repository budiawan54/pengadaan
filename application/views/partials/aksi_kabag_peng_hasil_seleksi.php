<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Catatan</h3>
	</div>

	<!-- <div class="panel-body"> -->
		<form action="<?php echo base_url('ksb_pel/pengajuan/hasil_seleksi') ?>" method="POST" enctype="multipart/form-data" id="submitPokja">
			<input type="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>">

			<div class="panel-body">
				<div class="form-group">
					<label class="control-label">POKJA YG DIPILIH KABAG</label>
					<?php 
					foreach ($pokja as $key=>$value){
							echo '
							<div class="form-group">
                  				<div class="checkbox">
                    				<label>
                      					<input type="checkbox" value="'.$value['User_Id'].'" name="Id_Pokja[]" checked disabled> '.$value['Nama_Lengkap'].'
                    				</label>
                  				</div> 
                  			</div>
							';
					}
					?>


				</div>
			</div>
			

			<div class="panel-body">
				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">SK POKJA</label>
	                        <input type="file" class="form-control " name="fileUpload" required="">
						</div>
					</div>
				</div>
 

				<div class="form-group">
					<div class="row">
						<div class="col-sm-4">
							<label class="control-label">Password User <span class="text-danger">*</span></label>
							<input type="password" name="Password" class="form-control" required="">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Catatan</label>
					<textarea class="summernote" name="Catatan">
Mohon ditindaklanjuti
					</textarea>
				</div>

				<input type="hidden" name="Progress" value="setuju_seleksi">

				<input type="submit" class="btn btn-primary btn-block" value="Setujui dan Kirim Ke Pokja">
			</div>

		</form>	
	<!-- </div> -->

</div>
<script type="text/javascript" src="<?php echo base_url('/resources/plugins/bootstrap-filestyle-1.2.1/src/bootstrap-filestyle.min.js') ?>"></script>


<script type="text/javascript">

	// function submitFormPokja(){

	// 	confBootBox('Apakah anda yakin akan melakukan aksi ini?', function(resul){
	// 		if (resul == true){
	// 			$('form#submitPokja').trigger('submit');
	// 		}
	// 	});
	// }

	$(function(){
    $(":file").filestyle();
		
		var submitPengajuan = false;
		$('#submitPokja').on("submit", function(e){
		    if (submitPengajuan == false){
		        e.preventDefault();
		        confBootBox('Apakah anda yakin akan mengirim ke Pokja?', function(resul){
		            if (resul == true){
		            	
		            	var dialog = bootbox.dialog({
		            	    message: '<p class="text-center">Sedang mengirim data...</p>',
		            	    closeButton: false
		            	});

		                submitPengajuan = true;
		                $('#submitPokja').trigger('submit');
		            }
		        });
		    }
		});

		// $('#submitPokja').submit(function() {
		//     var c = confirm("Apakah anda setuju untuk mengirim pengajuan ini?");
		//     return c;
		// });

	});

	function downloadSuratTugas(hrefTarget){
		var nomor = $('#nomorSuratTugas').val();
		var href = hrefTarget + '?nomor='+nomor;
		window.location.href = href;
	}
</script>