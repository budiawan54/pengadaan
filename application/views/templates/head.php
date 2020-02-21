<!DOCTYPE html>
<html class="backend">
<head>
  <link rel="shortcut icon" href="<?php echo base_url('resources/image/logo.png') ?>">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SiAP (Sistem Informasi dan Aplikasi Pengadaan)</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <link rel="stylesheet" href="<?php echo base_url('/') ?>/resources/stylesheet/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url('/') ?>/resources/stylesheet/layout.css">
  <link rel="stylesheet" href="<?php echo base_url('/') ?>/resources/stylesheet/uielement.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/stylesheet/font-awesome.min.css') ?>">


  <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/plugins/jQuery.filer-1.3.0/css/jquery.filer.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/javascript/pace.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/plugins/summernote/css/summernote.css') ?>">

  <script type="text/javascript" src="<?php echo base_url('resources/plugins/modernizr/js/modernizr.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('resources/assets/backend/js/main.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('resources/plugins/jQuery.filer-1.3.0/js/jquery.filer.min.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('resources/javascript/pace.min.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('resources/plugins/summernote/js/summernote.js') ?>"></script>

  <script type="text/javascript" src="<?php echo base_url('resources/plugins/bootbox.min.js') ?>"></script>
  <link rel="stylesheet" href="<?php echo base_url('resources/') ?>/stylesheet/themes/layouts/fixed-sidebar.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/plugins/datatable/datatables.min.css') ?>"/>
  <script type="text/javascript" src="<?php echo base_url('resources/plugins/datatable/datatables.min.js') ?>"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('/resources/stylesheet/themes/theme6.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('/resources/bower_components/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.css') ?>">
  <script type="text/javascript" src="<?php echo base_url('/resources/bower_components/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') ?>"></script>
  <!-- plugins  datatable-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

    <style type="text/css">
        /*#1B1B1B*/
        #header.navbar .navbar-header{
            background : #FF2727;
        }
    </style>

    <style type="text/css">
        .modal-dialog.modal-full {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }
        .modal-full .modal-content {
            height: 100%;
            min-height: 100%;
            height: auto;
            border-radius: 0;
        }
        #v{
                width:320px;
                height:240px;
            }
            #qr-canvas{
                display:none;
            }
            #qrfile{
                width:320px;
                height:240px;
            }

            .scanner-laser {
                position: absolute;
                margin: 40px;
                height: 30px;
                width: 30px;
                opacity: 0.5;
            }

            .laser-leftTop {
                top: 0;
                left: 0;
                border-top: solid red 5px;
                border-left: solid red 5px;
            }

            .laser-leftBottom {
                bottom: 0;
                left: 0;
                border-bottom: solid red 5px;
                border-left: solid red 5px;
            }

            .laser-rightTop {
                top: 0;
                right: 0;
                border-top: solid red 5px;
                border-right: solid red 5px;
            }

            .laser-rightBottom {
                bottom: 0;
                right: 0;
                border-bottom: solid red 5px;
                border-right: solid red 5px;
                JS
            }

            #webcodecam-canvas {
                background-color: #272822;
            }
            #scanned-QR{
                word-break: break-word;
            }
    </style>

    <script type="text/javascript" src="<?php echo base_url('resources/moment-with-locales.min.js') ?>"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/resources/plugins/toastr-master/build/toastr.min.css') ?>">
    <script type="text/javascript" src="<?php echo base_url('/resources/plugins/toastr-master/build/toastr.min.js') ?>"></script>

</head>

<body>
    <header id="header" class="navbar">
        <!-- START navbar header -->
        <div class="navbar-header">
            <!-- Brand -->
            <a class="navbar-brand" href="javascript:void(0);" style="text-align: center !important; padding: 2px; ">
                <img src="<?php echo base_url('resources/image/header.png') ?>" style="height: 100%; text-align: center !important;">
            </a>
            <!--/ Brand -->
        </div>
        <!--/ END navbar header -->

        <!-- START Toolbar -->
        <div class="navbar-toolbar clearfix" style="background-color: #000080">
            <!-- START Left nav -->
            <ul class="nav navbar-nav navbar-left">
                <!-- Sidebar shrink -->
                <li class="hidden-xs hidden-sm">
                    <a href="javascript:void(0);" class="sidebar-minimize" data-toggle="minimize" title="Minimize sidebar">
                        <span class="meta">
                            <span class="icon"></span>
                        </span>
                    </a>
                </li>

                <li class="navbar-main hidden-lg hidden-md hidden-sm">
                    <a href="javascript:void(0);" data-toggle="sidebar" data-direction="ltr" rel="tooltip" title="Menu sidebar">
                        <span class="meta">
                            <span class="icon"><i class="ico-paragraph-justify3"></i></span>
                        </span>
                    </a>
                </li> 
                <?php
                    $this->load->model('pengajuan_m');
                    $this->load->model('user_m');
                    $user = $this->user_m->getDetailLoginUser();

                    $notif = $this->pengajuan_m->ambilNotif();
                    $notif_not_read = $this->pengajuan_m->notifNotRead();
                ?>

                <li class="dropdown custom" >
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="meta">
                            <span class="icon"><i class="ico-bell"></i></span>

                            <span class="hasnotification hasnotification-danger"
                                <?php
                                    if (sizeof($notif_not_read) == 0){
                                        echo 'style="display: none;"';
                                    }
                                ?>
                            ></span>
                        </span>
                    </a>

                    <div class="dropdown-menu" role="menu">
                        <div class="dropdown-header">
                            <span class="title">Pemberitahuan <span class="count"></span></span>
                            <!-- <span class="option text-right"><a href="javascript:void(0);">Clear all</a></span> -->
                        </div>
                        <div class="dropdown-body slimscroll">
                            <!-- indicator -->
                            <!--/ indicator -->

                            <!-- Message list -->
                            <div class="media-list" id="notif_target">

                                <?php
                                    $config_pengajuan = $this->pengajuan_m->ambil_config_notif();

                                    foreach ($notif as $key => $value) {
                                            $cl = $config_pengajuan[$value['Progress']]['tipe'];
                                            if ($value['IsRead']){
                                                $cl = 'grey';
                                            }
                                        ?>
                                            <a href="<?php echo base_url( $user['Slug_Jabatan'] . '/pengajuan/'.$value['Id_Pengajuan']) ?>" class="media read border-dotted">
                                                <span class="media-object pull-left">
                                                    <i class="ico-info bgcolor-<?php echo $cl; ?>"></i>
                                                </span>
                                                <span class="media-body">
                                                    <span class="media-text" style="font-size: 0.8em;">Perbaruan progres</span>
                                                    <span class="media-text" style="color: #3E3E3E;"><?php echo $config_pengajuan[$value['Progress']]['isi'] ?></span>
                                                    <span class="media-meta pull-right"><?php echo $value['Created_At'] ?></span>
                                                </span>
                                            </a>

                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="tanggalSekarang">
                    <a href="javascript:void(0)" >
                        <span class="figure"><i class="ico-calendar" style="color: #FFF;"></i> <?php echo getDates(date('Y-m-d')); ?></span>
                    </a>
                </li>

                <li class="scanBarcode">
                    <a href="javascript:void(0)" onClick="openModalScan()" title="Scan Barcode Lembar Verifikasi" data-toggle="tooltip">
                        <span class="figure"><i class="ico-qrcode" style="color: #FFF;"></i></span>
                    </a>
                </li>


            </ul>
            <!--/ END Left nav -->

            <!-- START navbar form -->
            <div class="navbar-form navbar-left dropdown" id="dropdown-form">
                <form action="" role="search">
                    <div class="has-icon">
                        <input type="text" class="form-control" placeholder="Search application...">
                        <i class="ico-search form-control-icon"></i>
                    </div>
                </form>
            </div>
            <!-- START navbar form -->

            <!-- START Right nav -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Profile dropdown -->
                <li class="dropdown profile hidden-md hidden-xs hidden-sm">
                    <a href="javascript:void(0)">Anda login sebagai <?php echo $this->user_m->getDetailLoginUser()['Nama_Jabatan'] ?></a>
                </li>
                <li class="dropdown profile">
                    <a href="javascript:void(0);" class="dropdown-toggle dropdown-hover" data-toggle="dropdown">
                        <span class="meta">
                            <span class="ico ico-user"></span>
                            <span class="text hidden-xs hidden-sm pl5"><?php echo $this->user_m->getDetailLoginUser()['Username'] ?></span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo base_url('/profil') ?>"><span class="icon"><i class="ico-cog4"></i></span> Profile Setting</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('/home/logout'); ?>"><span class="icon"><i class="ico-exit"></i></span> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>


    <aside class="sidebar sidebar-left sidebar-menu">
        <!-- START Sidebar Content -->
        <section class="content slimscroll">
            <h5 class="heading">Main Menu</h5>
            <!-- START Template Navigation/Menu -->
            <ul class="topmenu topmenu-responsive" data-toggle="menu">

                <li class="dashboard">
                    <a href="<?php echo base_url('/'); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                        <span class="figure"><i class="ico-dashboard2"></i></span>
                        <span class="text">Dashboard</span>
                    </a>
                </li>

                <li class="profil">
                    <a href="<?php echo base_url('/profil'); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                        <span class="figure"><i class="ico-user"></i></span>
                        <span class="text">Profil</span>
                    </a>
                </li>


                <?php
                    $user = $this->user_m->getDetailLoginUser();
                    $this->load->view('templates/sidebar/'.$user['Slug_Jabatan']);
                ?>

                <li class="logactivity">
                    <a href="<?php echo base_url('/logactivity'); ?>">
                        <span class="figure"><i class="ico-calendar"></i></span>
                        <span class="text">Log Activity</span>
                    </a>
                </li>

            </ul>

        </section>
        <!--/ END Sidebar Container -->
    </aside>
    <section id="main" role="main">
        <div class="container-fluid">

            <?php
                if (isset($konten)){
                    echo $konten;
                }
            ?>

        </div>
    </section>
    </div>


        <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>

    </section>

    <br><br><br>

    <footer id="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9 hidden-sm hidden-xs">
                    <p class="nm text-muted">SiAP (Sistem Aplikasi Pengadaan) Bagian Pengadaan Barang/Jasa Setda - Kabupaten Buleleng &copy; Copyright 2019</p>
                </div>
                <div class="col-sm-6 hidden-md hidden-lg">
                    <p class="nm te3t-muted">&copy; Copyright 2019</p>
                </div>
            </div>
        </div>
    </footer>


    <div id="myModalScanBarcode" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Scan Barcode Lembar Verifikasi</h4>
          </div>
          <div class="modal-body">

                <div class="well">
                    <div style="display: inline;" id="mainbody">
                        <div id="outdiv"><video id="v" autoplay="autoplay"></video></div>
                        <!-- <img src="Web%20QR_files/down.png"> -->
                        <p><div id="result">Scan dengan barcode...</div></p>
                    </div>
                    <canvas style="width: 800px; height: 600px;" id="qr-canvas" width="800" height="600"></canvas>
                </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          </div>
        </div>

      </div>
    </div>



    <?php
        $this->load->view('partials/notif');
    ?>


    <script async="" src="<?php echo base_url(); ?>/resources/bower_components/barcodescanner2/cbgapi.loaded_1"></script>
    <script src="<?php echo base_url(); ?>/resources/bower_components/barcodescanner2/ca-pub-8418802408648518.js"></script>
    <script src="<?php echo base_url(); ?>/resources/bower_components/barcodescanner2/ga.js" async="" type="text/javascript"></script>
    <script async="" src="<?php echo base_url(); ?>/resources/bower_components/barcodescanner2/cbgapi.loaded_0"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/resources/bower_components/barcodescanner2/llqrcode.js"></script>
    <script gapi_processed="true" type="text/javascript" src="<?php echo base_url(); ?>/resources/bower_components/barcodescanner2/plusone.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/resources/bower_components/barcodescanner2/webqr.js"></script>

    <script type="text/javascript">
        $(function(){
            $('.summernote').summernote({
                height: 150,
                toolbar: [
                    ['style', ['style']],
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']]
                ]
            });
        })
    </script>


    <script type="text/javascript">
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
        var activeUrl = window.location.href;
        if (typeof urlToActive !== 'undefined'){
            activeUrl = urlToActive;
        }
        var activeHref = $('.topmenu a[href="'+ activeUrl +'"]');

        activeHref.parent('li').addClass("active");
        activeHref.closest('.collapse').addClass('in');
        activeHref.closest('.parent').addClass('open');


        function openModalScan(){
            $('#myModalScanBarcode').modal("show");
        }

        $('#myModalScanBarcode').on('shown.bs.modal', function() {
            load();
        })



        function sendBarcodeResult(code){


            $.ajax({
                type : "POST",
                url : "<?php echo base_url('home/cari_paket_by_token') ?>",
                data : {token:code},
                success : function(e){
                    var data = JSON.parse(e);

                    if(data.status == 'ada'){
                        window.location = "<?php echo base_url('home/pengajuan_pin') ?>/" + data.pin;
                    }
                    else{
                        alert("Maaf, barcode yang anda scan tidak sesuai dengan data yang tersimpan");
                        load();
                    }
                }
            })
        }


    </script>
</body>
</html>
