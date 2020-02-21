<!DOCTYPE html>
<html class="backend">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SiAP (Sistem Informasi dan Aplikasi Pengadaan)</title>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <link rel="stylesheet" href="<?php echo base_url('/') ?>/resources/assets/backend/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/') ?>/resources/plugins/jQuery.filer-1.3.0/css/jquery.filer.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/') ?>/resources/javascript/pace.css">

    <script type="text/javascript" src="<?php echo base_url('/') ?>/resources/plugins/modernizr/js/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url('/') ?>/resources/assets/backend/js/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url('/') ?>/resources/plugins/jQuery.filer-1.3.0/js/jquery.filer.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('/') ?>/resources/javascript/pace.min.js"></script>


    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/resources/plugins/toastr-master/build/toastr.min.css') ?>">
    <script type="text/javascript" src="<?php echo base_url('/resources/plugins/toastr-master/build/toastr.min.js') ?>"></script>


    <style type="text/css">

        .bg{
            height: 20px;
            background-image: url(<?php echo base_url('resources/image/bg.jpg') ?>);
            background-size: cover;
            background-position: center center;
            width: 100%;
            position: relative;
        }

        .bg::before{
          background-color: rgba(0, 0, 0, 0.37);
          content: '';
          display: block;
          height: 100%;
          position: absolute;
          width: 100%;
        }
    </style>
    <style type="text/css">
      .custom_header{
        background: #FF2727;
        height: 80px;
        padding : 8px;

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
            <img src="<?php echo base_url('resources/image/header.png') ?>">
        </section>

        <section id="main" role="main">
            <section class="container">
          <div class="container-fluid">
          <div class="page-header page-header-block" style="margin-left: -30px; margin-right: -30px;">
            <div class="page-header-section">
              <h4 class="title semibold">SiAP (Sistem Aplikasi Pengadaan) Bagian Pengadaan Barang/Jasa Setda - Kabupaten Buleleng </h4>

            </div>
          </div>
        </div>
                <div class="row" >
                     <div class="col-md-12" style="padding-top: 20px; text-align: center;  ">

                        <div class="panel" >
                            <div class="panel-body" >
                                <div class="" id="sop" style="overflow-y: auto;">
                <a href="<?=base_url()?>/resources/image/flowchart.jpg" target="_blank">
                <img height="auto" src="<?=base_url()?>/resources/image/flowchart.jpg" width="100%" >
                <a>
                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-8" style="padding-top: 20px; padding-bottom:50px;">

                        <div class="panel" >
                            <div class="panel-body" >
                                <div class="" id="container"></div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4" style="padding-top: 20px; padding-bottom: 50px;">
                        <div class="panel panel-default">
                            <!-- panel heading/header -->
                            <div class="panel-heading">
                                <h5 class="heading semibold">Silahkan Login</h5>
                            </div>
                            <!--/ panel heading/header -->
                            <!-- panel body -->
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="login" >
                                        <form  method="POST" name="form-login" action="<?php echo base_url('/login') ?>">
                                            <div class="alert alert-success fade in">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                                <p class="mb10">Silahkan memasukan akun anda untuk melanjutkan ke halaman utama.</p>
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
                                                <button type="submit" style="margin-bottom: 15px;" class="btn btn-primary"><span class="semibold">Login</span></button>
                                                <!-- <button type="button" style="margin-top: -15px;" class="btn btn-success" data-toggle="modal" data-target="#myModal">register</button> -->

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                       <p class="nm text-muted">Bagian Pengadaan Barang/Jasa Setda Kabupaten Buleleng &copy; <span class="semibold">2019</span></p>
                       <!--/ copyright -->
                   </div>
               </div>
           </div>


           <!--/ END container-fluid -->
        </footer>

    </body>
</html>
<!--

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register Akun PPK OPD</h4>
      </div>
          <form action="/home/registerAkun" method="POST">
      <div class="modal-body">


              <div class="form-group">
                  <label class="control-label">Username</label>
                  <input type="text" name="Username" class="form-control">
              </div>

              <div class="form-group">
                  <label class="control-label">Password</label>
                  <input type="text" name="Password" class="form-control">
              </div>


              <div class="form-group">
                  <label class="control-label">OPD</label>
                  <select name="Master_Skpd_Id" class="form-control">
                    <option></option>
                    <?php
                      foreach ($skpd as $key => $value) {
                        echo '<option value="'.$value['Master_Skpd_Id'].'">'.$value['Nama_Skpd'].'</option>';
                      }
                    ?>
                  </select>
              </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <input type="submit" class="btn btn-primary" value="Register">
      </div>
          </form>
    </div>

  </div>
</div>
 -->


<?php
    $this->load->view('partials/notif');
?>

<script src="http://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    $(function(){

        var chart = Highcharts.chart('container', {

            chart: {
        height: 280
      },
      title: {
                text: 'Grafik Pengajuan per Bulan'
            },


            xAxis: {
                categories: <?php echo json_encode($categories) ?>
            },

            series: [{
                type: 'column',
                colorByPoint: true,
                data: <?php echo json_encode($data) ?>,
                showInLegend: false
            }]

        });


    })
</script>
