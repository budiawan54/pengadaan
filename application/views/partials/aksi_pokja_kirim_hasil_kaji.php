<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Aksi Pengajuan Pengadaan</h3>
	</div>

	<div class="panel-body">
		<button type="submit" class="btn btn-success">Simpan Catatan Kelengkapan</button>
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHasilKaji">Permintaan Revisi</button>
		<a href="http://lpse.banglikab.go.id/eproc4/lelang" target="_BLANK" class="btn btn-info">Link Ke LPSE</a>
		<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSedangLelang">Proses review selesai</button>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalLelang">Masukan Hasil Lelang</button>
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModalTRC">Permintaan TRC</button>
		<!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalCetakRapat">Cetak Laporan Rapat</button> -->
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

						<div class="table-responsive">
							<table class="table" id="table_hasil_kaji">
								<tr>
									<td><input type="text" name="Hasil_Kaji_Pokja[]" class="form-control input-sm"></td>
									<td style="width: 10px;"><a href="javascript:void(0)" onclick="addNewHasilKaji()" class="btn btn-sm btn-success"><i class="fa fa-plus"></a></td>
								</tr>
							</table>
						</div>
						<!-- <textarea class="summernote" name="Hasil_Kaji_Pokja"> -->
						<!-- </textarea> -->
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


<div id="myModalCetakRapat" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

  	<form action="<?php echo base_url('pokja/pengajuan/cetak_hasil_laporan_rapat/' . $pengajuan['Id_Pengajuan_Pengadaan']) ?>" method="POST">
    <!-- Modal content-->
  	<div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title">Cetak Hasil Rapat Kaji Ulang</h4>
      	</div>
      	<div class="modal-body">

      		<div class="table-responsive">
      		<table class="table">

      			<?php
      				$statusOpt = ['Setuju' => 'Setuju', 'Tidak Setuju' => 'Tidak Setuju'];
      				$kaji = json_decode($pengajuan['Hasil_Kaji_Pokja']);
      				foreach ($kaji as $key => $value) {
      			?>

		      			<tr>
		      				<td>
		      					<input type="text" name="Hasil_Kaji_Pokja[]" class="form-control input-sm" readonly="" value="<?php  echo $value->isi ?>">
		      				</td>
		      				<td style="width: 200px;">
		      					<?php     echo form_dropdown('Status[]', $statusOpt, isset($value->status) ? $value->status : '' , 'class="form-control input-sm" required="required"'); ?>
		      				</td>
		      				<td>
		      					<input type="text" name="Keterangan[]" class="form-control input-sm" value="<?php echo isset($value->keterangan) ? $value->keterangan : '' ?>">
		      				</td>
		      			</tr>

      			<?php
      				}

      			?>

      		</table>
      	</div>

		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-success"><i class="ico ico-print"></i> Cetak</button>
		</div>
	</div>
	</form>
	</div>
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

				<div class="form-group">
					<label class="control-label">Catatan</label>
					<textarea class="summernote" name="Catatan"></textarea>
				</div>

				<button type="submit" class="btn btn-primary btn-block">Ya</button>
			</form>
	</div>
	</div></div>
</div>





<div id="myModalLelang" class="modal fade" role="dialog">
  <div class="modal-dialog modal-full">

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


					<div class="col-md-4">
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
									Tahun
								</label>
								<div class="col-md-8">
									<select name="tahun" type="number" class="form-control input-sm">
										<option value="2018">2018</option>
										<option value="2019">2019</option>
										<option value="2020">2020</option>
										<option value="2021">2021</option>
										<option value="2022">2022</option>
										<option value="2023">2023</option>
									</select>
									<!-- <input type="text" name="tahun" class="form-control input-sm" > -->
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-4">
									Bulan
								</label>
								<div class="col-md-8">
									<input type="text" name="bulan" class="form-control input-sm" >
								</div>
							</div>


									<div class="form-group">
										<label class="control-label col-md-4">
											Kode lelang
										</label>
										<div class="col-md-8">
											<div class="input-group add-on">
													<input type="text" name="kd_lelang" class="form-control input-normal">
													<span class="help-block"></span>
													<div class="input-group-btn">
															<button class="btn btn-primary twoToneButton" id="search-lelang"><i class="fa fa-search"></i></button>
													</div>
											</div>
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


					<div class="col-md-4">
						<div class="form-horizontal">

							<div class="form-group">
								<label class="control-label col-md-4">
									Nama Pemenang
								</label>
								<div class="col-md-8">
									<input type="text" name="Nama_Pemenang" class="form-control input-sm">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-4">
									Alamat
								</label>
								<div class="col-md-8">
									<textarea name="Alamat_Pemenang" class="form-control"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-4">
									Tanggal SPPBJ
								</label>
								<div class="col-md-8">
									<input type="text" name="Tgl_Sppbj" class="form-control input-sm datepicker">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-4">
									Jumlah Pendaftar
								</label>
								<div class="col-md-8">
									<input type="text" name="Jml_Pendaftar" class="form-control input-sm">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-4">
									Jumlah Penawar
								</label>
								<div class="col-md-8">
									<input type="text" name="Jml_Penawar" class="form-control input-sm">
								</div>
							</div>

						</div>
					</div>


					<div class="col-md-4">
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




				<input type="submit" class="btn btn-success btn-block" value="Kirim Hasil Lelang ke Kasubag Pengelolaan Pengadaan Barang/Jasa">
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
				var dialog = bootbox.dialog({
				    message: '<p class="text-center">Sedang mengirim data...</p>',
				    closeButton: false
				});
				$('#form-pokja-kaji').trigger('submit');
			}
		});
	}


	function addNewHasilKaji(){
		var field = '<tr><td><input type="text" name="Hasil_Kaji_Pokja[]" class="form-control input-sm"></td><td style="width: 10px;"><a href="javascript:void(0)" onclick="RemoveHasilKaji(this)" class="btn btn-sm btn-warning"><i class="fa fa-minus"></a></td></tr>';

		$('#table_hasil_kaji').append(field);
	}

	function RemoveHasilKaji(ele){
		ele.closest('tr').remove();
	}

	var submitCatatanPokjaKetua = false;
	$('#form-catatan-pokja').on("submit", function(e){
	    if (submitCatatanPokjaKetua == false){
	        e.preventDefault();
	        confBootBox('Apakah anda yakin untuk menyimpan catatan ini?', function(resul){
	            if (resul == true){
	            	var dialog = bootbox.dialog({
	            	    message: '<p class="text-center">Sedang mengirim data...</p>',
	            	    closeButton: false
	            	});
	                submitCatatanPokjaKetua = true;
	                $('#form-catatan-pokja').trigger('submit');
	            }
	        });
	    }
	});


	function submitFormLelang(){
		confBootBox('Apakah anda yakin akan melakukan aksi ini?', function(resul){
			if (resul == true){
				var dialog = bootbox.dialog({
				    message: '<p class="text-center">Sedang mengirim data...</p>',
				    closeButton: false
				});
				$('#form-pokja-lelang').trigger('submit');
			}
		});
	}


	$('#search-lelang').on("click", function(e){
			e.preventDefault();
			var twoToneButton = document.querySelector('.twoToneButton');
			var lelang =$('[name="kd_lelang"]').val();
			var bulan = $('[name="bulan"]').val();
			var tahun = $('[name="tahun"]').val();
			if (bulan == '0'){
					swal('Pilih bulan');
			} else if(tahun == '') {
					swal('Tahun harus diisi');
			} else if(lelang == '') {
					swal('Kode lelang harus diisi');
			} else {
					twoToneButton.innerHTML = "Searching";
					twoToneButton.classList.add('spinning');
					document.getElementById("search-lelang").style.cursor = "not-allowed";
					$.ajax({
							url: "<?= base_url('pokja/pengajuan/tampil_data_lelang');?>",
							type : "POST",
							dataType: "JSON",
							data: "bulan="+bulan+"&tahun="+tahun+"&lelang="+lelang,
							success : function(data){
									if(data.status == 'berhasil') {
											$('[name="Nilai_Penawaran_Hasil"]').val(data.nilai_penawaran);
											$('[name="NPWP"]').val(data.npwp_penyedia);
											$('[name="Jml_Pendaftar"]').val(data.jum_peserta);
											$('[name="Nama_Pemenang"]').val(data.nama_pemenang);
											twoToneButton.classList.remove('spinning');
											twoToneButton.innerHTML = "<i class='fa fa-search'></i>";
											document.getElementById("search-lelang").style.cursor = "pointer";
									} else if(data.status == 'bermasalah') {
											swal('Tidak ada data');
											$('[name="nilai_penawaran_hasil"]').val('tidak ada data');
											$('[name="npwp"]').val('tidak ada data');
											$('[name="jum_pendaftar"]').val('tidak ada data');
											$('[name="nama_pemenang"]').val('tidak ada data');
											twoToneButton.classList.remove('spinning');
											twoToneButton.innerHTML = "<i class='fa fa-search'></i>";
											document.getElementById("search-lelang").style.cursor = "pointer";
									} else {
											swal('Tidak ada data');
											$('[name="nilai_penawaran_hasil"]').val('tidak ada data');
											$('[name="npwp"]').val('tidak ada data');
											$('[name="jum_pendaftar"]').val('tidak ada data');
												$('[name="nama_pemenang"]').val('tidak ada data');
											twoToneButton.classList.remove('spinning');
											twoToneButton.innerHTML = "<i class='fa fa-search'></i>";
											document.getElementById("search-lelang").style.cursor = "pointer";
									}
							},error : function (jqXHR, textStatus, errorThrown) {
									swal('Opps.. Koneksi data API terganggu, silahkan coba refresh halaman lagi');
									twoToneButton.classList.remove('spinning');
									twoToneButton.innerHTML = "<i class='fa fa-search'></i>";
									document.getElementById("search-lelang").style.cursor = "pointer";
							}
					});
			}
	});


</script>
