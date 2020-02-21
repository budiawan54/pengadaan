<link rel="stylesheet" type="text/css" href="<?php echo base_url('/resources/plugins/select2/css/select2-4.css') ?>">
<!-- Sweet alert -->
<link rel="stylesheet" href="<?php echo base_url('/resources/sweetalert/sweetalert.css')?>" />
<!-- css loading -->
<link rel="stylesheet" href="<?php echo base_url('/resources/css/loading.css')?>" />

<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">Ajukan Pengadaan</h4>
    </div>
    <div class="page-header-section">
        <!-- Toolbar -->
        <div class="toolbar">
            <ol class="breadcrumb breadcrumb-transparent nm">
                <li><a href="javascript:void(0);">Pengajuan</a></li>
                <li class="active">Tambah Pengajuan</li>
            </ol>
        </div>
        <!--/ Toolbar -->
    </div>
</div>

<form action="<?php echo base_url('ppk/pengajuan/tambah/submit'); ?>" method="POST" enctype="multipart/form-data" id="form-pengajuan">

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Data Umum</h3>
            </div>
            <div class="panel-body">


                    <div class="row">
                        <div class="col-md-6 form-horizontal">

                            <div class="form-group">
                                <label class="control-label col-md-4">Tahun<span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <?php $date_now = date('d-m-Y'); ?>
                                    <select name="tahun" type="number" class="form-control input-normal">
                                      <option value="2018">2018</option>
                                      <option value="2019">2019</option>
                                      <option value="2020">2020</option>
                                      <option value="2021">2021</option>
                                      <option value="2022">2022</option>
                                      <option value="2023">2023</option>
                                    </select>
                                    <!-- <input type="number" name="tahun" class="form-control input-normal"> -->
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4"> Kode RUP <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <div class="input-group add-on">
                                        <input type="text" name="Kode_RUP" class="form-control input-normal">
                                        <span class="help-block"></span>
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary twoToneButton" id="kode-rup"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Nama Kegiatan <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="Nama_Kegiatan" required="" class="form-control input-normal" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Paket Pengadaan <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="Paket_Pengadaan" class="form-control input-normal" required="" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Sumber Dana <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                	<input type="text" name="sumber_dana" class="form-control input-normal" required="" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Pagu Anggaran <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                	<input type="text" name="Pagu_Anggaran" class="form-control input-normal " required="" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">HPS <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                	<input type="text" name="HPS" class="form-control input-normal " required="">
                            	</div>
                            </div>

			</div>
                        <div class="col-md-6 form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-4">Kode Rekening/MAK <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="Kode_Rekening_Max" class="form-control input-normal" required="" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Jenis Kontrak <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                  <select name="Jenis_Kontrak" class="form-control input-normal">
                                    <option value="Lumsum">Lumsum</option>
                                    <option value="Harga Satuan">Harga Satuan</option>
                                    <option value="Gabungan Lumsum dan Harga Satuan">Gabungan Lumsum dan Harga Satuan</option>
                                    <option value="Terima Jadi"> Terima Jadi (Turnkey)</option>
                                    <option value="Kontrak Payung">Kontrak Payung</option>
                                  </select>
                                	<!-- <input type="text" name="Jenis_Kontrak" class="form-control input-normal" required=""> -->
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Jenis Pengadaan <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                	<input type="text" name="Jenis_Barang" class="form-control input-normal" required="" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Nama PPTK <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="Nama_PPTK" class="form-control input-normal" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">NIP <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="NIP" class="form-control input-normal" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">No. Hp <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="No_Hp" class="form-control input-normal" required="">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-2">Catatan</label>
                                <div class="col-md-10">
                                <textarea rows="20" name="Catatan" class="form-control summernote">
Mohon ditindaklanjuti
                                </textarea>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>

        <!-- <input class="filerInput2" data-jfiler-limit="1" data-jfiler-extensions="pdf"  type="file"> -->


        <div class="panel panel-color panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Kelengkapan Berkas</h3>
            </div>
            <div class="panel-bodys table-responsive">

                <table class="table table-striped table-hover">
                    <?php
                        foreach ($kelengkapan as $key => $value) {
                            $i = $key + 1;
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $value['Deskripsi'] ?>
                                        <?php
                                            $require = '';
                                            if($value['Is_Required'] == 1){
                                                echo ' <span class="text-danger">*</span>';
                                                $require = 'required="1"';
                                            }
                                        ?>
                                        <?php
                                            if ($value['Tipe'] != ''){
                                                echo '<small>('.$value['Tipe'].')</small>';
                                            }
                                        ?>
                                    </td>
                                    <td width="300px;">
                                        <input class="filestyle"  data-ext="<?php echo str_replace(' ', '', $value['Tipe']) ?>" name="fileUpload[<?php echo $value['Id_Kelengkapan'] ?>]" type="file" <?php echo $require; ?>>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
        </div>

    </div>
    <div class="col-md-12">
        <div class="alert alert-danger" style="display: none;" id="alet_loading">
            <h4 class="semibold title">Mohon menunggu</h4>
            <p>Mohon menunggu, sedang dalam proses upload file.</p>
        </div>

        <button type="submit" value="fo" data-loading-text="Loading..." id="btn_submit_pengajuan" name="tipe" class="btn btn-primary btn-block btn-lg"><i class="fa fa-arrow-right"></i> Kirim Pengajuan</button>
    </div>
    <!-- <div class="col-md-6">
        <button type="submit" value="process" name="tipe" class="btn btn-primary btn-block"><i class="fa fa-arrow-right"></i> Simpan dan Ajukan</button>
    </div> -->
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
            confBootBox('Apakah anda yakin akan mengajukan pengadaan ini?', function(resul){
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

    $('#kode-rup').on("click", function(e){
        e.preventDefault();
        var twoToneButton = document.querySelector('.twoToneButton');
        var id = $('[name="Kode_RUP"]').val();
        var tahun = $('[name="tahun"]').val();
        if(tahun == ''){
            swal('Tahun harus diisi');
        } else if(id == '') {
            swal('Kode RUP harus diisi');
        } else {
            twoToneButton.innerHTML = "Searching";
            twoToneButton.classList.add('spinning');
            document.getElementById("kode-rup").style.cursor = "not-allowed";
            $.ajax({
                url: "<?= base_url('ppk/pengajuan/tampil_data_rup');?>",
                type : "POST",
                dataType: "JSON",
                data: "id="+id+"&tahun="+tahun,
                success : function(data){
                    if(data.status == 'aman') {
                        $('[name="Paket_Pengadaan"]').val(data.paket_pengadaan);
                        $('[name="Nama_Kegiatan"]').val(data.kegiatan);
                        $('[name="sumber_dana"]').val(data.sumber_dana);
                        $('[name="Kode_Rekening_Max"]').val(data.max);
                        $('[name="Jenis_Barang"]').val(data.jenis_pengadaan);
                        $('[name="Pagu_Anggaran"]').val(data.pagu_anggaran);
                        twoToneButton.classList.remove('spinning');
                        twoToneButton.innerHTML = "<i class='fa fa-search'></i>";
                        document.getElementById("kode-rup").style.cursor = "pointer";
                    } else if(data.status == 'bermasalah') {
                        swal('Tidak ada data');
                        $('[name="Paket_Pengadaan"]').val('tidak ada data');
                        $('[name="Nama_Kegiatan"]').val('tidak ada data');
                        $('[name="sumber_dana"]').val('tidak ada data');
                        $('[name="Kode_Rekening_Max"]').val('tidak ada data');
                        $('[name="Jenis_Barang"]').val('tidak ada data');
                        $('[name="Pagu_Anggaran"]').val('tidak ada data');
                        twoToneButton.classList.remove('spinning');
                        twoToneButton.innerHTML = "<i class='fa fa-search'></i>";
                        document.getElementById("kode-rup").style.cursor = "pointer";
                    } else if(data.status == 'ada') {
                        swal('Kode RUP sudah digunakan pada Paket '+data.paket+' dan kegiatan '+data.keg);                                               
                        twoToneButton.classList.remove('spinning');
                        twoToneButton.innerHTML = "<i class='fa fa-search'></i>";
                        document.getElementById("kode-rup").style.cursor = "pointer";
                    } else {
                        swal('Tidak ada data');
                        $('[name="Paket_Pengadaan"]').val('tidak ada data');
                        $('[name="Nama_Kegiatan"]').val('tidak ada data');
                        $('[name="sumber_dana"]').val('tidak ada data');
                        $('[name="Kode_Rekening_Max"]').val('tidak ada data');
                        $('[name="Jenis_Barang"]').val('tidak ada data');
                        $('[name="Pagu_Anggaran"]').val('tidak ada data');
                        twoToneButton.classList.remove('spinning');
                        twoToneButton.innerHTML = "<i class='fa fa-search'></i>";
                        document.getElementById("kode-rup").style.cursor = "pointer";
                    }
                },error : function (jqXHR, textStatus, errorThrown) {
                    swal('Opps.. ada masalah koneksi data API SIRUP, silahkan coba refresh halaman lagi');
                    twoToneButton.classList.remove('spinning');
                    twoToneButton.innerHTML = "<i class='fa fa-search'></i>";
                    document.getElementById("kode-rup").style.cursor = "pointer";
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
