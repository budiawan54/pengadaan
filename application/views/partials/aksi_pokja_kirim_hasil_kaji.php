<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Aksi Pengajuan Pengadaan</h3>
	</div>
	
	<div class="panel-body">
		<button type="submit" class="btn btn-success">Simpan Catatan Kelengkapan</button>
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHasilKaji">Permintaan Revisi</button>
		<a href="http://lpse.baliprov.go.id/eproc4" target="_BLANK" class="btn btn-info">Link Ke LPSE</a>
		<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSedangLelang">Sedang diajukan proses lelang</button>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalLelang">Masukan Hasil Lelang</button>
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModalTRC">Permintaan TRC</button>
	</div>
	
</div>

</form>

<!-- Modal -->
<div id="modalHasilKaji" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
  	<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hasil Kaji Pengajuan</h4>
      </div>
      <div class="modal-body">

			<form action="<?php echo base_url('pokja/pengajuan/kirim_hasil_kaji') ?>" method="POST" id="form-pokja-kaji">
				<input type="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>">
				
					<div class="form-group">
						<label class="control-label">Hasil Kaji</label>
						<textarea class="summernote" name="Hasil_Kaji_Pokja">
		
						</textarea>
					</div>
					
					<div class="form-group">
						<label class="control-label">Catatan</label>
						<textarea class="summernote" name="Catatan">
Mohon ditindaklanjuti
						</textarea>
					</div>
					
					<input type="submit" class="btn btn-primary btn-block" value="Kirim Ke PPK">
			</form>	
	</div>
	</div></div>
</div>



<div id="modalSedangLelang" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
  	<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Proses pengajuan lelang</h4>
      </div>
      <div class="modal-body">

			<form action="<?php echo base_url('pokja/pengajuan/proses_lelang') ?>" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>">
				<p>Ubah status pengajuan pengadaan dalam proses pengajuan lelang?</p>
				<button type="submit" class="btn btn-primary btn-block">Ya</button>
			</form>	
	</div>
	</div></div>
</div>


<div id="myModalTRC" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
  	<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">TRC Pengajuan</h4>
      </div>
      <div class="modal-body">

			<form action="<?php echo base_url('pokja/pengajuan/request_trc') ?>" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>">
				<p>Request TRC untuk pengajuan ini?</p>
				<button type="submit" class="btn btn-primary btn-block">Ya</button>
			</form>	
	</div>
	</div></div>
</div>




<div id="myModalLelang" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
  	<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hasil Lelang</h4>
      </div>
      <div class="modal-body">
		<form action="<?php echo base_url('pokja/pengajuan/kirim_hasil_lelang') ?>" method="POST" id="form-pokja-lelang" enctype="multipart/form-data" >
			<input type="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>">
				<div class="row">
					<div class="col-md-6">
						<div class="form-horizontal">
							<div class="form-group">
								<label class="control-label col-md-4">
									Tanggal Pengumuman
								</label>
								<div class="col-md-8">
									<input type="text" name="Tanggal_Pengumuman" class="form-control input-sm datepicker" value="<?php echo date('Y-m-d') ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-4">
									Nilai Penawaran Setelah Koreksi
								</label>
								<div class="col-md-8">
									<input type="text" name="Nilai_Penawaran_Hasil" class="form-control input-sm">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-4">
									NPWP
								</label>
								<div class="col-md-8">
									<input type="text" name="NPWP" class="form-control input-sm">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-4">
									Metode Pemilihan Penyedia
								</label>
								<div class="col-md-8">
									<input type="text" name="Metode_Pemilihan_Penyedia" class="form-control input-sm">
								</div>
							</div>
						</div>
						
					</div>
					<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-4">
									Status Lelang
								</label>
								<div class="col-md-8">
									<label class="checkbox-inline" style="margin-bottom: 10px;">
										<input type="checkbox" name="Lelang_Ulang"> Lelang Ulang?
									</label>

									<input type="number" name="Lelang_Ulang_Ke" class="form-control input-sm" placeholder="Lelang Ulang Ke">
								</div>
							</div>


										<div class="form-group">
											<label class="control-label">Catatan</label>
											<textarea class="summernote" name="Catatan">
Mohon ditindaklanjuti
											</textarea>
										</div>
					</div>
				</div>

				<table class="table">
					<thead>
						<tr>
							<th>Deskripsi</th>
							<th>File</th>
						</tr>
					</thead>
					<tbody>
					<?php

						$ar_kelengkapan = $this->config_m->kelengkapanBerkasHasilLelang();


						foreach ($ar_kelengkapan as $key => $value) {
							?>
								<tr>
									<td>
										<?php echo $value['isi'] ?> <span class="text-danger">*</span>
									</td>
									<td width="300">
										<input required="" class="filestyle" type="file" name="fileUpload[<?php echo $key ?>]">
									</td>
								</tr>
							<?php
						}

					?>
					<tbody>
				</table>

				
				
				
				<input type="submit" class="btn btn-success btn-block" value="Kirim Hasil Lelang ke Kasubag Monev">
		</form>	
      </div>
     </div>

   </div>
</div>


<script type="text/javascript" src="<?php echo base_url('/resources/plugins/bootstrap-filestyle-1.2.1/src/bootstrap-filestyle.min.js') ?>"></script>


<script type="text/javascript">
    $(":file").filestyle();

	function submitFormKaji(){

		confBootBox('Apakah anda yakin akan melakukan aksi ini?', function(resul){
			if (resul){
				alert("fuck");
				$('#form-pokja-kaji').trigger('submit');
			}
		});
	}

	var submitCatatanPokjaKetua = false;
	$('#form-catatan-pokja').on("submit", function(e){
	    if (submitCatatanPokjaKetua == false){
	        e.preventDefault();
	        confBootBox('Apakah anda yakin untuk menyimpan catatan ini?', function(resul){
	            if (resul == true){
	                submitCatatanPokjaKetua = true;
	                $('#form-catatan-pokja').trigger('submit');
	            }
	        });
	    }
	});


	function submitFormLelang(){
		confBootBox('Apakah anda yakin akan melakukan aksi ini?', function(resul){
			if (resul == true){
				$('#form-pokja-lelang').trigger('submit');
			}
		});
	}
</script>