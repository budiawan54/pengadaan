<link rel="stylesheet" type="text/css" href="<?php echo base_url('/resources/plugins/select2/css/select2-4.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/resources/plugins/jquery-ui/css/jquery-ui.css') ?>">
<!-- Sweet alert -->
<link rel="stylesheet" href="<?php echo base_url('/resources/sweetalert/sweetalert.css')?>" />
<!-- css loading -->
<link rel="stylesheet" href="<?php echo base_url('/resources/css/loading.css')?>" />
<script type="text/javascript" src="<?php echo base_url('/resources/plugins/jquery-ui/js/jquery-ui.js') ?>"></script>


<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">Ajukan Realisasi</h4>
    </div>
    <div class="page-header-section">
        <!-- Toolbar -->
        <div class="toolbar">
            <ol class="breadcrumb breadcrumb-transparent nm">
                <li><a href="javascript:void(0);">Realisasi</a></li>
                <li class="active">Edit Realisasi</li>
            </ol>
        </div>
        <!--/ Toolbar -->
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Data Umum</h3>
            </div>
            <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6 form-horizontal">
                          <form action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" id="form-pengajuan">
                            <div class="form-group">
                                <label class="control-label col-md-4">Bulan <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <select class="form-control" id="bulan" name="bulan" readonly >
                                      <option value="1" <?php if($input['bulan']==1){echo"selected";}?> readonly>Januari</option>
                                      <option value="2" <?php if($input['bulan']==2){echo"selected";}?> readonly >Pebruari</option>
                                      <option value="3" <?php if($input['bulan']==3){echo"selected";}?>>Maret</option>
                                      <option value="4" <?php if($input['bulan']==4){echo"selected";}?>>April</option>
                                      <option value="5" <?php if($input['bulan']==5){echo"selected";}?>>Mei</option>
                                      <option value="6" <?php if($input['bulan']==6){echo"selected";}?>>Juni</option>
                                      <option value="7" <?php if($input['bulan']==7){echo"selected";}?>>Juli</option>
                                      <option value="8" <?php if($input['bulan']==8){echo"selected";}?>>Agustus</option>
                                      <option value="9" <?php if($input['bulan']==9){echo"selected";}?> >September</option>
                                      <option value="10" <?php if($input['bulan']==10){echo"selected";}?>>Oktober</option>
                                      <option value="11" <?php if($input['bulan']==11){echo"selected";}?>>Nopember</option>
                                      <option value="12" <?php if($input['bulan']==12){echo"selected";}?>>Desember</option>
                                    </select>
                                    <!--<input type="text" name="Kode_lelang" required="" class="form-control input-normal">-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Tahun <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="number" name="tahun"  value="<?= $input['tahun'] ?>" class="form-control input-normal" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4"> Kode Lelang <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <div class="input-group add-on">
                                        <input type="text" name="kd_lelang" value="<?= $input['kd_lelang'] ?>" class="form-control input-normal" readonly>
                                        <span class="help-block"></span>
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary twoToneButton" id="search-lelang"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Nama Lelang <span class="text-danger">*</span></label>
                                <div class="col-md-8">
									              <textarea name="nama_paket"  class="form-control input-normal" readonly><?= $input['nama_paket'] ?></textarea>
                                </div>
                            </div>
			</div>
                        <div class="col-md-6 form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-4">Sumber Dana <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="sumber_dana" value="<?= $input['sumber_dana'] ?>"   class="form-control input-normal" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Satuan Kerja <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="kd_satker" value="<?= $input['kd_satker'] ?>" class="form-control input-normal" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Nilai Pagu <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="jum_pagu" value="<?= $input['jum_pagu'] ?>" class="form-control input-normal" readonly>
                                </div>
                            </div>
                        </div>

                    </div>

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Pemenang Lelang</h3>
            </div>
            <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6 form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-4">Nama Pemenang <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="nama_pemenang" value="<?= $input['nama_pemenang'] ?>" class="form-control input-normal" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">NPWP <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="npwp_penyedia" value="<?= $input['npwp_penyedia'] ?>" class="form-control input-normal" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-4">Harga Penawaran <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="nilai_penawaran3" value="<?= $input['nilai_penawaran3'] ?>" class="form-control input-normal" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Hasil Negosiasi <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="nilai_penawaran" value="<?= $input['nilai_penawaran'] ?>" class="form-control input-normal" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>


		<div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Realisasi Lelang</h3>
            </div>
            <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 form-horizontal">
						               <div class="form-group">
                                <label class="control-label col-md-4">Tanggal Proses Pengadaan <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="tgl_pengadaan" value="<?= $input['tgl_pengadaan'] ?>" id="datepicker-1" placeholder="Tanggal Proses Pengadaan" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Nomor BAST <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" name="no_bast" value="<?= $input['no_bast'] ?>" required="" class="form-control input-normal" placeholder="Nomor BAST">
                                </div>
                            </div>
							<div class="form-group">
                                <label class="control-label col-md-4">Tanggal BAST <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="tgl_bast" value="<?= $input['tgl_bast'] ?>" id="datepicker-2" placeholder="Tanggal Kontrak" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Nomor Kontrak <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" name="no_kontrak" value="<?= $input['no_kontrak'] ?>" required="" class="form-control input-normal" placeholder="Nomor Kontrak">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Tanggal Kontrak <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="tgl_kontrak" value="<?= $input['tgl_kontrak'] ?>" id="datepicker-3" placeholder="Tanggal Kontrak" required />
                                </div>
                            </div>
							<div class="form-group">
                                <label class="control-label col-md-4">Keterangan <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <textarea name="ket" class="form-control"><?= $input['ket'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

    </div>
    <div class="col-md-12">
        <div class="alert alert-danger" style="display: none;" id="alet_loading">
            <h4 class="semibold title">Mohon menunggu</h4>
            <p>Mohon menunggu, sedang dalam proses upload file.</p>
        </div>

        <!--<button type="submit" value="fo" data-loading-text="Loading..." id="btn_submit_pengajuan" name="" class="btn btn-primary btn-block btn-lg"><i class="fa fa-arrow-right"></i> Kirim Realisasi</button>
    </div> -->
    <div class="col-md-12">
        <button type="submit" value="process" name="tipe" class="btn btn-primary btn-block"><i class="fa fa-arrow-right"></i> Simpan Data Realisasi</button>
    </div>
</div>
</form>
<br>

<script type="text/javascript" src="<?php echo base_url('/resources/plugins/select2/js/select2-4.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/resources/plugins/maskMoney.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/resources/plugins/bootstrap-filestyle-1.2.1/src/bootstrap-filestyle.min.js') ?>"></script>
<!-- Sweet alert -->
<script src="<?php echo base_url('/resources/sweetalert/sweetalert.min.js') ?>"></script>
<script src="<?php echo base_url('/resources/sweetalert/sweetalert-dev.js') ?>"></script>

<script type="text/javascript">
	$('#datepicker-1').datepicker({
        dateFormat: 'yy-mm-dd',
    });

	$('#datepicker-2').datepicker({
        dateFormat: 'yy-mm-dd',
    });
    $('#datepicker-3').datepicker({
        dateFormat: 'yy-mm-dd',
    });

    function format1(n, currency) {
        n = parseFloat(n);
        return currency + " " + n.toFixed(2).replace(/./g, function(c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
        });
    }

    $('#paguInput').on("keyup", function(){
        var valueA = $(this).val();
        if (valueA != ""){
            var valueB = format1(valueA, 'Rp');
            $('#paguOutput').html(valueB);
        }
    })

    $('#hpsInput').on("keyup", function(){
        var valueA = $(this).val();
        if (valueA != ""){
            var valueB = format1(valueA, 'Rp');
            $('#hpsOutput').html(valueB);
        }
    })


    function confBootBox(pesan, callback2){
        bootbox.confirm({
            message: pesan,
            buttons: {
                confirm: {
                    label: 'Ya',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Batal',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                return callback2(result);
            }
        });
    }

    // $('.rupiahInput').maskMoney({prefix:'', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});

    $('.select2').select2();
    $(":file").filestyle();

    $(".filestyle").change(function () {
        var fileExtensionData = $(this).data('ext');
        var self = $(this);

        if (fileExtensionData != ""){

            var fileExtension = fileExtensionData.split(',');


            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {

               alert("Format yang di support adalah : "+fileExtension.join(', '));

               self.val("");
               return false;
            }
        }


   });


    //
    var submitPengajuan = false;
    $('#form-pengajuan').on("submit", function(e){
        if (submitPengajuan == false){
            e.preventDefault();
            confBootBox('Apakah anda yakin akan menyimpan data realisasi ini?', function(resul){
                if (resul == true){

                    submitPengajuan = true;

                    $('#btn_submit_pengajuan').button("loading");
                    $('input').attr("readonly", true);

                    var dialog = bootbox.dialog({
                        message: '<p class="text-center">Sedang mengirim data...</p>',
                        closeButton: false
                    });

                    $('#form-pengajuan').trigger('submit');
                }
            });
        }
    });

    $('#search-lelang').on("click", function(e){
        e.preventDefault();
        var twoToneButton = document.querySelector('.twoToneButton');
        var lelang = $('[name="kd_lelang"]').val();
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
                url: "<?= base_url('ppk/realisasi/tampil_data_lelang');?>",
                type : "POST",
                dataType: "JSON",
                data: "bulan="+bulan+"&tahun="+tahun+"&lelang="+lelang,
                success : function(data){
                    if(data.status == 'berhasil') {
                        $('[name="nama_paket"]').val(data.nama_paket);
                        $('[name="sumber_dana"]').val(data.sumber_dana);
                        $('[name="kd_satker"]').val(data.kd_satker);
                        $('[name="jum_pagu"]').val(data.jum_pagu);
                        $('[name="nama_pemenang"]').val(data.nama_pemenang);
                        $('[name="npwp_penyedia"]').val(data.npwp);
                        $('[name="nilai_penawaran3"]').val(data.nilai_penawaran3);
					            	$('[name="nilai_penawaran"]').val(data.nilai_penawaran);
                        twoToneButton.classList.remove('spinning');
                        twoToneButton.innerHTML = "<i class='fa fa-search'></i>";
                        document.getElementById("search-lelang").style.cursor = "pointer";
                    } else if(data.status == 'bermasalah') {
                        swal('Tidak ada data');
                        $('[name="nama_paket"]').val('tidak ada data');
                        $('[name="sumber_dana"]').val('tidak ada data');
                        $('[name="kd_satker"]').val('tidak ada data');
                        $('[name="jum_pagu"]').val('tidak ada data');
                        $('[name="nama_pemenang"]').val('tidak ada data');
                        $('[name="npwp_penyedia"]').val('tidak ada data');
                        $('[name="nilai_penawaran3"]').val('tidak ada data');
                        $('[name="nilai_penawaran"]').val('tidak ada data');
                        twoToneButton.classList.remove('spinning');
                        twoToneButton.innerHTML = "<i class='fa fa-search'></i>";
                        document.getElementById("search-lelang").style.cursor = "pointer";
                    } else {
                        swal('Tidak ada data');
                        $('[name="nama_paket"]').val('tidak ada data');
                        $('[name="sumber_dana"]').val('tidak ada data');
                        $('[name="kd_satker"]').val('tidak ada data');
                        $('[name="jum_pagu"]').val('tidak ada data');
                        $('[name="nama_pemenang"]').val('tidak ada data');
                        $('[name="npwp_penyedia"]').val('tidak ada data');
                        $('[name="nilai_penawaran3"]').val('tidak ada data');
                        $('[name="nilai_penawaran"]').val('tidak ada data');
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

    $('.select2CustomInput').select2({
        tags: true,
            createTag: function (params) {
                return {
                    id: params.term,
                    text: params.term,
                    newOption: true
                }
            }
    });
</script>
