
<link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/bower_components/jquery-confirm-master/dist/jquery-confirm.min.css') ?>">

<form action="<?php echo base_url('/ppk/pengajuan/'.$pengajuan['Id_Pengajuan_Pengadaan'].'/edit') ?>" enctype="multipart/form-data" method="POST" id="form-pengajuan">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/resources/plugins/select2/css/select2-4.css') ?>">
    <div class="page-header page-header-block">
        <div class="page-header-section">
            <h4 class="title semibold">Edit Pengadaan</h4>
        </div>
        <div class="page-header-section">
            <!-- Toolbar -->
            <div class="toolbar">
                <ol class="breadcrumb breadcrumb-transparent nm">
                    <li><a href="javascript:void(0);">Pengajuan</a></li>
                    <li class="active">Edit Pengajuan</li>
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
                        <div class="col-md-7 form-horizontal">
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">Nama Kegiatan <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" value="<?php echo $pengajuan['Nama_Kegiatan'] ?>" name="Nama_Kegiatan" required="" class="form-control input-normal">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Paket Pengadaan <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" value="<?php echo $pengajuan['Paket_Pengadaan'] ?>" name="Paket_Pengadaan" class="form-control input-normal" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Sumber Dana <span class="text-danger">*</span></label>
                                <div class="col-md-5">
                                    <select name="sumber_dana" class="select2CustomInput form-control" required="">
                                        <?php
                                            foreach ($this->config_m->sumber_dana() as $key => $value) {
                                                echo '<option value="'.$value.'">'.$value.'</option>';
                                            }
                                        ?>
                                    </select>
                                    <span class="help-block">* Ketik sumber dana lain apabila tidak ada pada pilihan</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Pagu Anggaran <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp.</span>
                                        <input type="number" value="<?php echo $pengajuan['Pagu_Anggaran'] ?>" name="Pagu_Anggaran" class="form-control input-normal" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">HPS <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp.</span>
                                        <input type="number" name="HPS" class="form-control input-normal" required="" value="<?php echo $pengajuan['HPS'] ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Kode Rekening/MAK <span class="text-danger">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" value="<?php echo $pengajuan['Kode_Rekening_Max'] ?>" name="Kode_Rekening_Max" class="form-control input-normal" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Kode RUP <span class="text-danger">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="Kode_RUP" class="form-control input-normal" required="" value="<?php echo $pengajuan['Kode_RUP'] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Jenis Kontrak <span class="text-danger">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="Jenis_Kontrak" value="<?php echo $pengajuan['Jenis_Kontrak'] ?>" class="form-control input-normal" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Jenis Barang <span class="text-danger">*</span></label>
                                <div class="col-md-5">
                                
                                    <select name="Jenis_Barang" class="form-control select2CustomInput" required="">
                                        <?php
                                            foreach ($this->config_m->jenis_barang() as $key => $value) {
                                                echo '<option value="'.$value.'">'.$value.'</option>';
                                            }
                                        ?>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Nama PPTK <span class="text-danger">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="Nama_PPTK" class="form-control input-normal" required="" value="<?php echo $pengajuan['Nama_PPTK'] ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">NIP <span class="text-danger">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="NIP" class="form-control input-normal" required="" value="<?php echo $pengajuan['NIP'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">No. Hp <span class="text-danger">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="No_Hp" class="form-control input-normal" required="" value="<?php echo $pengajuan['No_Hp'] ?>">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-5">
                            
                        </div>
                        
                    </div>
            </div>
        </div>

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
                                            }
                                        ?>        
                                        <?php 
                                            if ($value['Tipe'] != ''){
                                                echo '<small>('.$value['Tipe'].')</small>'; 
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <input class="filerInput" data-jfiler-limit="1" data-jfiler-extensions="<?php echo $value['Tipe'] ?>" name="fileUpload[<?php echo $value['Id_Kelengkapan'] ?>]" type="file" class="fileUpload" data-ext="<?php echo $value['Tipe'] ?>" <?php echo $require; ?>>
                                    </td>
                                    <td>
                                        <?php
                                            if (isset($value['isian'])){
                                                if ($value['isian']['Nama_File'] != null){
                                                    echo '<a class="label label-success" href="'.base_url('storage/kelengkapan').'/'.$value['isian']['Nama_File'].'" target="_BLANK"><i class="fa fa-download"></i> Lihat file sebelumnya</a>';
                                                }
                                            }

                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($value['Is_Required'] == 0 && isset($value['isian'])){
                                        ?>
                                            <a href="javascript:void(0)" onclick="deleteKelengkapan(<?php echo $value['isian']['Id_Pengajuan_Pengadaan_Kelengkapan'] ?>)" class="btn btn-danger btn-sm" title="Hapus File" data-toggle="tooltip"><i class="fa fa-trash-o"></i></a>
                                        <?php
                                            }
                                        ?>
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
        <div class="alert alert-success" style="display: none;" id="alet_loading">
            <h4 class="semibold title">Mohon menunggu</h4>
            <p>Mohon menunggu, sedang dalam proses upload file.</p>
        </div>

        <button type="submit" name="tipe" data-loading-text="Loading..." id="btn_submit_pengajuan" class="btn btn-primary btn-block btn-lg"><i class="fa fa-save"></i> Simpan</button>
    </div>
</div>
</form>


<form action="<?php echo base_url('/ppk/pengajuan/hapus_kelengkapan/'. $pengajuan['Id_Pengajuan_Pengadaan']) ?>" method="POST" id="form_hapus">
    <input type="hidden" name="Id_Pengajuan_Pengadaan_Kelengkapan" id="id_kelengkapan_hapus">
</form>

<script type="text/javascript" src="<?php echo base_url('/resources/plugins/select2/js/select2-4.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/resources/plugins/maskMoney.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/resources/plugins/bootstrap-filestyle-1.2.1/src/bootstrap-filestyle.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/resources/bower_components/jquery-confirm-master/dist/jquery-confirm.min.js') ?>"></script>

<script type="text/javascript">

    function deleteKelengkapan(Id_Pengajuan_Pengadaan_Kelengkapan){
        $.confirm({
            title: 'Konfirmasi!',
            content: 'Apakah anda yakin untuk menghapus file kelengkapan ini? Aksi tidak dapat di kembalikan.',
            buttons: {
                confirm: function () {
                    $('#id_kelengkapan_hapus').val(Id_Pengajuan_Pengadaan_Kelengkapan);
                    $('#form_hapus').trigger("submit");
                },
                cancel: function () {
                    
                }
            }
        });
    }

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

    $('.rupiahInput').maskMoney({prefix:'', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});
    $('.select2').select2();
    $(":file").filestyle();
    // $(".filerInput-*").filer();
    // 
    var submitPengajuan = false;
    $('#form-pengajuan').on("submit", function(e){
        // if (submitPengajuan == false){
        //     e.preventDefault();
        //     confBootBox('Apakah anda yakin akan mengajukan pengadaan ini?', function(resul){
        //         if (resul == true){
        //             submitPengajuan = true;
                    $('#btn_submit_pengajuan').button("loading");
                    // $('#alet_loading').slideDown();
                    
                    var dialog = bootbox.dialog({
                        message: '<p class="text-center">Sedang mengirim data...</p>',
                        closeButton: false
                    });

                    // $('#form-pengajuan').trigger('submit');
        //         }
        //     });
        // }
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