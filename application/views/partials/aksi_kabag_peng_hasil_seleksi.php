<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Catatan</h3>
	</div>

	<!-- <div class="panel-body"> -->
		<form action="<?php echo base_url('kabag/pengajuan/hasil_seleksi') ?>" method="POST" enctype="multipart/form-data" id="submitPokja">
			<input type="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>">

			<div class="panel-body">
				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Nomor Surat Pokja</label>
	                        <input type="text" class="form-control " name="Surat_Tugas_Pokja" required="">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label">Pilih POKJA</label>
					<select name="Id_Pokja" class="form-control">
						<?php
							foreach ($pokja as $key => $value) {
								if ($value['Id_User'] == $pengajuan['Id_Pokja']){
									echo '<option value="'.$value['Id_User'].'" selected="">'.$value['Nama_Lengkap'].' ('.$value['jml_tangani'].')</option>';
								}
								else{
									echo '<option value="'.$value['Id_User'].'">'.$value['Nama_Lengkap'].' ('.$value['jml_tangani'].')</option>';
								}
							}
						?>
					</select>
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