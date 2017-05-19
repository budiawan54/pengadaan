<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Catatan</h3>
	</div>
		
		<div class="panel-body">
			<?php
				if ($pengajuan['File_Hasil_Kaji'] != null){
					echo '<a target="_BLANK" style="margin-bottom : 10px;" href="'.base_url('storage/hasil_kaji/'.$pengajuan['File_Hasil_Kaji']).'" class="btn btn-sm btn-info"><i class="fa fa-download"></i> Lihat File Hasil Kaji</a>';
				}
			?>
			
			<div class="alert alert-success">
				<h4 class="title semibold">Hasil Kajian dari Pokja</h4>
				<?php echo $pengajuan['Hasil_Kaji_Pokja']; ?>
			</div>
		</div>
	<!-- <div class="panel-body"> -->
		<form action="<?php echo base_url('ppk/pengajuan/kirim_ke_pokja') ?>" method="POST" id="form-ppk-kaji">
			<input type="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>">
			
			<textarea class="summernote" name="Catatan">
Mohon ditindaklanjuti
			</textarea>

			<div class="panel-body">
				<a href="javascript:void(0)" onclick="submitForm()" class="btn btn-primary btn-block">Kirim Kembali ke POKJA</a>
			</div>
		</form>	
	<!-- </div> -->

</div>


<script type="text/javascript">

	function submitForm(){

		confBootBox('Apakah anda yakin akan melakukan aksi ini?', function(resul){
			if (resul == true){
				$('#form-ppk-kaji').trigger('submit');
			}
		});
	}
</script>

