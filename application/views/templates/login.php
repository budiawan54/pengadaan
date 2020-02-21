<!DOCTYPE html>
<html class="backend">
<head>
    <link rel="shortcut icon" href="<?php echo base_url('resources/image/logo.png') ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi Layanan Pengadaan &#8226; Provinsi Bali</title>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

   
    <link rel="stylesheet" href="<?php echo base_url('/') ?>/resources/assets/backend/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/') ?>/resources/plugins/jQuery.filer-1.3.0/css/jquery.filer.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/') ?>/resources/javascript/pace.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/resources/plugins/AmaranJS/dist/css/amaran.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/resources/plugins/AmaranJS/dist/css/amimate.min.css') ?>">

    <script type="text/javascript" src="<?php echo base_url('/') ?>/resources/plugins/modernizr/js/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url('/') ?>/resources/assets/backend/js/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url('/') ?>/resources/plugins/jQuery.filer-1.3.0/js/jquery.filer.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('/') ?>/resources/javascript/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('/resources/plugins/AmaranJS/dist/js/jquery.amaran.min.js') ?>"></script>

    <link rel="stylesheet" type="text/css" href="/resources/plugins/flot/css/flot.css">

    <style type="text/css">
      .custom_header{
        background: #2E2F41;
        height: 80px;
        padding : 8px;
        box-shadow: 3px 0px 3px rgba(0,0,0,1);
    
      }
        @media(min-width: 411px){
          .pt90{
            padding-top: 90px;
          }
        }
      .custom_header img{
        height: 100%;
      }

      @media(max-width: 411px){
        .custom_header{ 
          text-align: center;
          padding : 10px;
        }
      }

    </style>

    </head>

    <body>
        
        <section class="custom_header">
            <img src="<?php echo base_url('resources/image/logo_header.png') ?>">
        </section>

        <section id="main" role="main">
            <section class="container">
                <div class="row">
                    <div class="col-sm-8 hidden-xs pt10">
                        <div class="panel">
                            <!-- panel-toolbar -->
                            <div class="panel-heading pt10">
                                <div class="panel-toolbar">
                                    <h5 class="semibold nm ellipsis">Statistik Pengajuan</h5>
                                </div>
                                <div class="panel-toolbar text-right">
                                    <div class="btn-group">
                                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-primary">Informasi</button>
                                        <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li class="dropdown-header">Select duration :</li>
                                            <li><a href="#">Year</a></li>
                                            <li><a href="#">Month</a></li>
                                            <li><a href="#">Week</a></li>
                                            <li><a href="#">Day</a></li>
                                        </ul> 
                                    </div>
                                </div>
                            </div>
                            <!--/ panel-toolbar -->
                            <!-- panel-body -->
                            <div class="panel-body pt0">
                                <div class="chart mt10" id="chart-audience" style="height:300px;"></div>
                            </div>
                            <!--/ panel-body -->
                            <!-- panel-footer -->
                            <div class="panel-footer hidden-xs">
                                <ul class="nav nav-section nav-justified">
                                    <li>
                                        <div class="section">
                                            <h4 class="bold text-default mt0 mb5" data-toggle="counterup">24,548</h4>
                                            <p class="nm text-muted">
                                                <span class="semibold">Total ditolak</span>
                                                <span class="text-muted mr5 ml5">•</span>
                                                <span class="text-danger"><i class="ico-arrow-down4"></i> 32%</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section">
                                            <h4 class="bold text-default mt0 mb5" data-toggle="counterup">175,132</h4>
                                            <p class="nm text-muted">
                                                <span class="semibold">Total diproses</span>
                                                <span class="text-muted mr5 ml5">•</span>
                                                <span class="text-success"><i class="ico-arrow-up4"></i> 15%</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section">
                                            <h4 class="bold text-default mt0 mb5"><span data-toggle="counterup">89.96</span>%</h4>
                                            <p class="nm text-muted">
                                                <span class="semibold">Total Selesai</span>
                                                <span class="text-muted mr5 ml5">•</span>
                                                <span class="text-success"><i class="ico-arrow-up4"></i> 3%</span>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!--/ panel-footer -->
                        </div>
                        <!--/ END panel -->
                    </div>
                    <div class="col-sm-4 pt10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-user"></i> Login Akun</h3>
                            </div>
                            <div class="panel-body">     
                                        <form  method="POST" name="form-login" action="<?php echo base_url('/login') ?>">
                                            <div style="text-align: center">
                                                <img src="/resources/image/logo.png" style="width: 30%" class="pb10">
                                            </div>
                                            <div class="alert alert-success fade in">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <p class="mb10">Silahkan memasukan data akun anda untuk melanjutkan ke halaman utama.</p>
                                            </div>

                                            <div class="form-group">
                                                <div class="has-icon pull-left">
                                                    <input name="Username" value="" type="text" id="username" class="form-control" placeholder="Username">
                                                    <i class="ico-user2 form-control-icon"></i>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="has-icon pull-left">
                                                    <input name="Password" value="" type="password" class="form-control" placeholder="Password">
                                                    <i class="ico-lock2 form-control-icon"></i>
                                                </div>
                                            </div>
                                            <div class="form-group nm">
                                                <button type="submit" class="btn btn-primary"><span class="semibold">Login</span></button>
                                                <a href="#" class="btn btn-default">Lupa Password</a>
                                            </div>
                                        </form>
                            </div>

                        </div>

                        <br>
                            <br>
                            <br>
                            <br>
                    </div>
                </div>

            </section>
        </section>
        <footer id="footer">
           <!-- START container-fluid -->
           <div class="container-fluid">
               <div class="row">
                   <div class="col-sm-6">
                       <!-- copyright -->
                       <p class="nm text-muted">Badan Layanan Pengadaan Kabupaten Provinsi Bali &copy; <span class="semibold">2019</span></p>
                       <!--/ copyright -->
                   </div>
               </div>
           </div>


           <!--/ END container-fluid -->
        </footer>

    </body>
    
    <?php
        $this->load->view('partials/notif');
    ?>



    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Informasi</h4>
          </div>
          <div class="modal-body">  
                <p><strong>Selamat Datang di Aplikasi Layanan Pengadaan Kabupaten Bangli</strong>. Segala jenis pengajuan pengadaan dilakukan melalui sistem ini.</p>
            </div>
        </div>
      </div>
    </div>








<script type="text/javascript" src="/resources/plugins/flot/js/jquery.flot.js"></script>
<script type="text/javascript" src="/resources/plugins/flot/js/jquery.flot.resize.js"></script>
<script type="text/javascript" src="/resources/plugins/flot/js/jquery.flot.categories.js"></script>
<script type="text/javascript" src="/resources/plugins/flot/js/jquery.flot.time.js"></script>
<script type="text/javascript" src="/resources/plugins/flot/js/jquery.flot.tooltip.js"></script>
<script type="text/javascript" src="/resources/plugins/flot/js/jquery.flot.spline.js"></script>
<script type="text/javascript">
    $(function(){
         $.plot('#chart-audience', [{
            label: 'Jumlah Pengajuan',
            color: '#DC554F',
            data: [
                <?php
                    foreach ($ar as $key => $value) {
                        echo "['".$key."', ".$value."],";
                    }
                ?>
            ]
        }], {
            series: {
                lines: {
                    show: false
                },
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 2,
                    fill: 0.8
                },
                points: {
                    show: true,
                    radius: 4
                }
            },
            grid: {
                borderColor: 'rgba(0, 0, 0, 0.05)',
                borderWidth: 1,
                hoverable: true,
                backgroundColor: 'transparent'
            },
            tooltip: true,
            tooltipOpts: {
                content: '%x : %y',
                defaultTheme: false
            },
            xaxis: {
                tickColor: 'rgba(0, 0, 0, 0.05)',
                mode: 'categories'
            },
            yaxis: {
                tickColor: 'rgba(0, 0, 0, 0.05)'
            },
            shadowSize: 0
        });
    });
</script>
</html>
