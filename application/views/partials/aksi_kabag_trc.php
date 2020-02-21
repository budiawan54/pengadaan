<form action="<?php echo base_url('kabag/pengajuan/submit_trc') ?>" method="POST" id="form-kabag-trc">

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Permintaan TRC dari POKJA</h3>
		</div>

		<!-- <div class="panel-body"> -->
			
			<input type="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>">
			<input type="hidden" name="Progress">
			<textarea class="summernote" name="Catatan">

			</textarea>

			<div class="panel-body">
				<center><a data-val="kabag_acc_trc" id="btn_terima_fo" href="javascript:void(0)" onclick="submitForm('kabag_acc_trc')"  class="btn btn-success">Setujui TRC</a></center>
				
				<!--
				<a data-val="kabag_tolak_trc"  href="javascript:void(0)" onclick="submitForm('kabag_tolak_trc')" class="btn btn-danger">Tolak</a>
			</div>-->
		<!-- </div> -->

	</div>

</form>

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
				var dialog = bootbox.dialog({
				    message: '<p class="text-center">Sedang mengirim data...</p>',
				    closeButton: false
				});
				
				$('#form-kabag-trc').trigger('submit');
			}
		});
	}


</script>