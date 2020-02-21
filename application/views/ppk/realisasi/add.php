<link rel="stylesheet" type="text/css" href="<?php echo base_url('/resources/plugins/select2/css/select2-4.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/resources/plugins/jquery-ui/css/jquery-ui.css') ?>">
<!-- Sweet alert -->
<link rel="stylesheet" href="<?php echo base_url('/resources/sweetalert/sweetalert.css')?>" />
<!-- css loading -->
<link rel="stylesheet" href="<?php echo base_url('/resources/css/loading.css')?>" />
<script type="text/javascript" src="<?php echo base_url('/resources/plugins/jquery-ui/js/jquery-ui.js') ?>"></script>


<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">Masukkan Data Realisasi</h4>
    </div>
    <div class="page-header-section">
        <!-- Toolbar -->
        <div class="toolbar">
            <ol class="breadcrumb breadcrumb-transparent nm">
                <li><a href="javascript:void(0);">Realisasi</a></li>
                <li class="active">Tambah Realisasi</li>
            </ol>
        </div>
        <!--/ Toolbar -->
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
      <form action="<?= base_url("ppk/pengajuan/simpan_realisasi/$id") ?>" method="POST" enctype="multipart/form-data" id="form-pengajuan">


		<div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Realisasi Lelang</h3>
            </div>
            <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 form-horizontal">
                          <input type="hidden" class="form-control" name="id_pengajuan_pengadaan" value="<?= $id ?>" />
						               <div class="form-group">
                                <label class="control-label col-md-4">Tanggal Proses Pengadaan <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="tgl_proses_pengadaan" value="<?= $input['tgl_proses_pengadaan']?>" id="datepicker-1" placeholder="Tanggal Proses Pengadaan" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Nomor BAST <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" name="no_bast" value="<?= $input['no_bast']?>" required="" class="form-control input-normal" placeholder="Nomor BAST">
                                </div>
                            </div>
							<div class="form-group">
                                <label class="control-label col-md-4">Tanggal BAST <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="tgl_bast" value="<?= $input['tgl_bast']?>" id="datepicker-2" placeholder="Tanggal Kontrak">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Nomor Kontrak <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" name="no_kontrak" value="<?= $input['no_kontrak']?>" required="" class="form-control input-normal" placeholder="Nomor Kontrak">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Tanggal Kontrak <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="tgl_kontrak" value="<?= $input['tgl_kontrak']?>" id="datepicker-3" placeholder="Tanggal Kontrak" />
                                </div>
                            </div>
							<div class="form-group">
                                <label class="control-label col-md-4">Keterangan <span class="text-danger"></span></label>
                                <div class="col-md-6">
                                    <textarea name="keterangan"  class="form-control "><?= $input['keterangan']?></textarea>
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




</script>
