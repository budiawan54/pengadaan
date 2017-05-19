<link rel="stylesheet" type="text/css" href="<?php echo base_url('/resources/plugins/jquery-ui/css/jquery-ui.css') ?>">
<script type="text/javascript" src="<?php echo base_url('/resources/plugins/jquery-ui/js/jquery-ui.js') ?>"></script>
<style type="text/css">
    .ui-state-highlight{
        color: #333 !important;
    }
</style>

<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">Rekap Pengajuan</h4>
    </div>
    <div class="page-header-section">
        <div class="toolbar">
            <ol class="breadcrumb breadcrumb-transparent nm">
                <li><a href="javascript:void(0);">Pengajuan</a></li>
                <li class="active">Rekap</li>
            </ol>
        </div>
    </div>
</div>


<form action="<?php echo base_url('admin/pengajuan/cetakRekap') ?>" method="POST">
<div class="row">
    <div class="col-lg-12">
    
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Rekap Pengajuan</h3>
            </div>
            <div class="panel-body">
                <div class="alert alert-info">
                    <p>Silahkan masukan bulan pengajuan pengadaan diajukan.</p>
                </div>
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Pilih Bulan</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-md-6"><input type="text" class="form-control" name="bulan" id="datepicker-bulan" placeholder="Bulan" /></div>
                                <!-- <div class="col-md-6"><input type="text" class="form-control" name="tgl_selesai" id="datepicker-to" placeholder="Sampai" /></div> -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-success"><i class="ico ico-print"></i> Cetak Rekapan</button>
            </div>
        </div>
    </div>
</div>
</form>

<script>
    $('#datepicker-bulan').datepicker({
        dateFormat: 'yy-mm',
    });

    $('#datepicker-from').datepicker({
        defaultDate: '+1w',
        dateFormat: 'yy-mm-dd',
        numberOfMonths: 2,
        onClose: function (selectedDate) {
            $('#datepicker-to').datepicker('option', 'minDate', selectedDate);
        }
    });
    $('#datepicker-to').datepicker({
        defaultDate: '+1w',
        dateFormat: 'yy-mm-dd',
        numberOfMonths: 2,
        onClose: function (selectedDate) {
            $('#datepicker-from').datepicker('option', 'maxDate', selectedDate);
        }
    });
</script>