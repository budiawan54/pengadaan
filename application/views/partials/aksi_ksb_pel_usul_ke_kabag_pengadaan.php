<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Aksi Pengajuan</h3>
	</div>

	<!-- <div class="panel-body"> -->
		<form action="<?php echo base_url('ksb_pel/pengajuan/usul_ke_kabag_pengadaan') ?>" method="POST" id="form-dek">
			<input type="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>">
			
			<div class="panel-body">
				<div class="form-group">
					<label class="control-label">Pilih POKJA</label>
					<select name="Id_Pokja" class="form-control">
						<?php
							foreach ($pokja as $key => $value) {
								echo '<option value="'.$value['Id_User'].'">'.$value['Nama_Lengkap'].' ('.$value['jml_tangani'].')</option>';
							}
						?>
					</select>
				</div>
			</div>


			<textarea class="summernote" name="Catatan">
Mohon ditindaklanjuti
			</textarea>

			<div class="panel-body">
				<button type="submit"  class="btn btn-success btn-block">Usulkan ke Kabag Pelayanan dan Pengadaan</button>

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
	        confBootBox('Apakah anda yakin akan mengirim ke Kabag Pengadaan dan Pelayanan?', function(resul){
	            if (resul == true){
	                submitPengajuan = true;
	                $('#form-dek').trigger('submit');
	            }
	        });
	    }
	});

</script>
