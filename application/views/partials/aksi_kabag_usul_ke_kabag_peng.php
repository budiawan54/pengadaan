<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Aksi Pengajuan</h3>
	</div>

	<!-- <div class="panel-body"> -->
		<form action="<?php echo base_url('kabag/pengajuan/usul_ke_kabag_pengadaan') ?>" method="POST" id="form-dek">
			<input type="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>">
			<input type="hidden" name="Id_Pengaju" value="<?php echo $pengajuan['Id_User'] ?>">

			<input type="hidden" name="Slug_Posisi" value="pokja">
			
			<div class="panel-body">
				<div class="form-group">
					<label class="control-label">Pilih POKJA</label>
					<?php 
					foreach ($pokja as $key=>$value){
							echo '
							<div class="form-group">
                  				<div class="checkbox">
                    				<label>
                      					<input type="checkbox" value="'.$value['Id_User'].'" name="Id_Pokja[]"> '.$value['Nama_Lengkap'].'
                    				</label>
                  				</div> 
                  			</div>
							';
					}
					?>


				</div>
			</div>


			<textarea class="summernote" name="Catatan">
Mohon ditindaklanjuti
			</textarea>

			<div class="panel-body">
				<button type="submit"  class="btn btn-success btn-block">Kirim ke Kasubag Pengelolaan Pengadaan Barang/Jasa</button>

			</div>
		</form>	
	<!-- </div> -->
</div>



<script type="text/javascript">

	// function submitForm(){
	// 	confBootBox('Apakah anda yakin akan melakukan aksi ini?', function(resul){
	// 		if (resul == true){
	// 			$('#form-dek').trigger('submit');
	// 		}
	// 	});
	// }

	var submitPengajuan = false;
	$('#form-dek').on("submit", function(e){
	    if (submitPengajuan == false){
	        e.preventDefault();
	        confBootBox('Apakah anda yakin akan mengirim ke Kasubag Pengelolaan Pengadaan Barang/Jasa?', function(resul){
	            if (resul == true){
	                submitPengajuan = true;
	                var dialog = bootbox.dialog({
	                    message: '<p class="text-center">Sedang mengirim data...</p>',
	                    closeButton: false
	                });
	                $('#form-dek').trigger('submit');
	            }
	        });
	    }
	});

</script>
