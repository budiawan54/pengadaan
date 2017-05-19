<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Catatan</h3>
	</div>

	<!-- <div class="panel-body"> -->
		
		<input type="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>">
		<input type="hidden" name="Progress">
		<textarea class="summernote" name="Catatan">
Mohon ditindaklanjuti
		</textarea>

		<div class="panel-body">
			<a data-val="terima_fo" id="btn_terima_fo" href="javascript:void(0)" onclick="submitForm('terima_fo')"  class="btn btn-success">Pengajuan Lengkap</a>
			<a data-val="tolak_fo"  href="javascript:void(0)" onclick="submitForm('tolak_fo')" class="btn btn-danger">Pengajuan Kurang Lengkap</a>
		</div>
	<!-- </div> -->

</div>

<script type="text/javascript">

	// function submitFormSetuju(){
	// 	$('.chc_kelengkapan_item').each(function(){
	// 		if (!$(this).is(':selected') && $(this).data('isrequired') == '1'){
	// 			alert("Maaf, mohon check semua kelengkapan untuk menyetujui kelengkapan pengadaan");
	// 		}
	// 	});
	// }

	function submitForm(progress){
		$('input[name=Progress]').val(progress);

		confBootBox('Apakah anda yakin akan melakukan aksi ini?', function(resul){
			if (resul == true){
				$('#form-catatan-fo').trigger('submit');
			}
		});
	}


</script>