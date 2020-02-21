<?php 
  $userLogin = $this->user_m->getDetailLoginUser();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Buku Tamu</title>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        
        <!-- Load Core CSS 
        =====================================-->
        <link rel="stylesheet" href="<?php echo base_url('resources/back') ?>/assets/css/core/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('resources/back') ?>/assets/css/core/animate.min.css">
        
        <!-- Load Main CSS 
        =====================================-->
        <link rel="stylesheet" href="<?php echo base_url('resources/back') ?>/assets/css/main/main.css">
        <link rel="stylesheet" href="<?php echo base_url('resources/back') ?>/assets/css/main/setting.css">
        <link rel="stylesheet" href="<?php echo base_url('resources/back') ?>/assets/css/main/hover.css">
        
        <!-- Load Magnific Popup CSS 
        =====================================-->
        <link rel="stylesheet" href="<?php echo base_url('resources/back') ?>/assets/css/magnific/magic.min.css">        
        <link rel="stylesheet" href="<?php echo base_url('resources/back') ?>/assets/css/magnific/magnific-popup.css">              
        <link rel="stylesheet" href="<?php echo base_url('resources/back') ?>/assets/css/magnific/magnific-popup-zoom-gallery.css">
        
        <!-- Load OWL Carousel CSS 
        =====================================-->
        <link rel="stylesheet" href="<?php echo base_url('resources/back') ?>/assets/css/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo base_url('resources/back') ?>/assets/css/owl-carousel/owl.theme.css">
        <link rel="stylesheet" href="<?php echo base_url('resources/back') ?>/assets/css/owl-carousel/owl.transitions.css">
        
        <!-- Load Color CSS - Please uncomment to apply the color.
        =====================================      
        <link rel="stylesheet" href="assets/css/color/brown.css">
        <link rel="stylesheet" href="assets/css/color/cyan.css">
        <link rel="stylesheet" href="assets/css/color/dark.css">
        <link rel="stylesheet" href="assets/css/color/green.css">
        <link rel="stylesheet" href="assets/css/color/orange.css">
        <link rel="stylesheet" href="assets/css/color/purple.css">
        <link rel="stylesheet" href="assets/css/color/pink.css">
        <link rel="stylesheet" href="assets/css/color/yellow.css">-->
        <link rel="stylesheet" href="<?php echo base_url('resources/back') ?>/assets/css/color/pasific.css">
        <!-- <link rel="stylesheet" href="assets/css/color/blue.css"> -->
        <!-- <link rel="stylesheet" href="assets/css/color/red.css"> -->
        <link rel="stylesheet" href="<?php echo base_url('resources/back') ?>/assets/css/icon/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url('resources/back') ?>/assets/css/icon/et-line-font.css">
         <script src="<?php echo base_url('resources/back') ?>/assets/js/core/jquery.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/plugin/barrating/fontawesome-stars.css') ?>">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/resources/plugin/datatable/datatables.min.css') ?>">
        <script type="text/javascript" src="<?php echo base_url('/resources/plugin/datatable/datatables.min.js') ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/resources/plugin/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.min.css') ?>">
        <script type="text/javascript" src="<?php echo base_url('/resources/plugin/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') ?>"></script>
        <!-- Load JS
        HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
        WARNING: Respond.js doesn't work if you view the page via file://
        =====================================-->

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
          p{
            font-size: 1.05em;
          }
          ol li{
            font-size: 1.05em;
          }
          .panel-body{
            font-size: 1.05em;
          }
        </style>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/resources/plugin/CodeSeven-toastr-3f54c48/build/toastr.min.css') ?>">



        <script src="<?php echo base_url('/resources/plugin/moment.min.js') ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/resources/plugin/bootstrap-daterangepicker-master/daterangepicker.css') ?>">
        <script type="text/javascript" src="<?php echo base_url('/resources/plugin/bootstrap-daterangepicker-master/daterangepicker.js') ?>"></script>

    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar" data-offset="100">
            
        <a href="#page-top" class="go-to-top">
            <i class="fa fa-long-arrow-up"></i>
        </a>
        
        <nav class="navbar navbar-pasific navbar-mp navbar-standart  navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand font-montserrat " href="#page-top">
                        BLP Buleleng
                    </a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse navbar-right">
                    <ul class="nav navbar-nav mr20">
                        <li class="hidden"><a href="#page-top"></a></li>
                        <li><a href="<?php echo base_url('/') ?>">Home</a></li>

                        <li><a href="<?php echo base_url('bukutamu/isi') ?>">Isi Buku Tamu</a></li>
                        <?php
                          if($userLogin != null){
                        ?>
                        	<li><a href="javascript:void(0)" data-toggle="modal" data-target="#modalRespon">Masukan Respon</a></li>
                        <?php
                    	}
                        ?>
                        <?php
                          if($userLogin == null){
                        ?>
                          <li><a class="color-pasific" href="<?php echo base_url('login') ?>">Login</a></li>
                        <?php
                          }
                          elseif ($userLogin['Slug_Jabatan'] != 'bukutamu'){
                        ?>
                            <?php
                              if ($userLogin['Slug_Jabatan'] == 'admin'){
                            ?>
                              <li><a href="<?php echo base_url('bukutamu/lihat') ?>">Lihat Buku Tamu</a></li>
                              <li><a class="color-pasific" href="<?php echo base_url('pengguna/daftar') ?>">Pengguna</a></li>
                              <li><a class="color-pasific" href="<?php echo base_url('home/respon') ?>">Lihat Respon</a></li>
                            <?php
                              }
                            ?>
                            <li><a class="color-pasific" href="<?php echo base_url('home/profil') ?>">Profil Saya</a></li>
                            <li><a class="color-pasific" href="<?php echo base_url('home/logout') ?>">Logout</a></li>
                        <?php
                          }


                          if ($userLogin != NULL && $userLogin['Slug_Jabatan'] == 'bukutamu'){
                            echo '
                            <li><a class="color-pasific" href="'.base_url('home/logout').'">Logout</a></li>
                            ';
                          }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>



        <!-- <header class="bg-grad-stellar mt70">

            <div class="container">
                <div class="row mt20 mb30">
                    
                    <div class="col-md-6 text-left">
                        <h3 class="color-light animated" data-animation="fadeInUp" data-animation-delay="100">Buku Tamu <br>Bagian Layanan Pengadaan Kabupaten Buleleng<small class="color-light alpha7"></small></h3>
                    </div>
                </div>
            </div>

        </header> -->
    <?php
      if($userLogin == null || $userLogin['Slug_Jabatan'] == 'bukutamu'){
    ?>


    <header class="parallax-window-3 mt70" data-parallax="scroll" data-speed="0.2" data-image-src="<?php echo base_url('resources/img/8.png') ?>">

       <div class="container">
           <div class="row">

               <div class="col-md-12 text-center pt30">
                   <h1 class="color-light mt40 font-montserrat">
                      Buku Tamu Bagian Layanan Pengadaan Buleleng<br>
                       <a href="javascript:void(0)" data-toggle="modal" data-target="#modalRespon" class="button button-md button-circle button-success mt20">Masukan Respon</a>
                   </h1>

               </div>
           </div>
       </div>

   </header>

   <?php
     }
     else{
      echo '<div class="mt70"></div>';
     }
   ?>

    
    <section  class="bg-gray  pt50 pb75">
                <div class="container">
                    <?php
                        if (isset($konten)){
                            echo $konten;
                        }
                    ?>
                </div>
    </section>

                
                <div class="container-fluid bg-dark4 pt20">
                   <div class="container">
                       <div class="row">

                           <!-- copyright start -->
                           <div class="col-md-6 col-sm-8 pull-left mb20" style="color: #FFF;">
                               © 2017 Bagian Layanan Pengadaan Kabupaten Buleleng
                               <br>
                           </div>
                           <!-- copyright end -->


                       </div><!-- row end -->
                   </div><!-- container end -->
               </div>

        <!-- JQuery Core
           =====================================-->
           <script src="<?php echo base_url('resources/back') ?>/assets/js/core/bootstrap.min.js"></script>
           
           <!-- Magnific Popup
           =====================================-->
           <script src="<?php echo base_url('resources/back') ?>/assets/js/magnific-popup/jquery.magnific-popup.min.js"></script>
           <script src="<?php echo base_url('resources/back') ?>/assets/js/magnific-popup/magnific-popup-zoom-gallery.js"></script>
           
           <!-- Progress Bars
           =====================================-->
           <script src="<?php echo base_url('resources/back') ?>/assets/js/progress-bar/bootstrap-progressbar.js"></script>
           <script src="<?php echo base_url('resources/back') ?>/assets/js/progress-bar/bootstrap-progressbar-main.js"></script>        

           <!-- Typed
           =====================================-->
           <script src="<?php echo base_url('resources/back') ?>/assets/js/typed/typed.min.js"></script>
           
           <!-- JQuery Main
           =====================================-->
           <script src="<?php echo base_url('resources/back') ?>/assets/js/main/jquery.appear.js"></script>
           <script src="<?php echo base_url('resources/back') ?>/assets/js/main/isotope.pkgd.min.js"></script>
           <script src="<?php echo base_url('resources/back') ?>/assets/js/main/parallax.min.js"></script>
           <script src="<?php echo base_url('resources/back') ?>/assets/js/main/jquery.countTo.js"></script>
           <script src="<?php echo base_url('resources/back') ?>/assets/js/main/owl.carousel.min.js"></script>
           <script src="<?php echo base_url('resources/back') ?>/assets/js/main/jquery.sticky.js"></script>
           <script src="<?php echo base_url('resources/back') ?>/assets/js/main/jquery.mb.YTPlayer.min.js"></script>
           <script src="<?php echo base_url('resources/back') ?>/assets/js/main/imagesloaded.pkgd.min.js"></script>
           <script src="<?php echo base_url('resources/back') ?>/assets/js/main/main.js"></script>
           <script type="text/javascript" src="<?php echo base_url('/resources/plugin/CodeSeven-toastr-3f54c48/build/toastr.min.js') ?>"></script>

           <script type="text/javascript" src="<?php echo base_url('resources/plugin/barrating/jquery.barrating.js') ?>"></script>

          <style type="text/css">
            .borderIsi .fa{
              border-width: 1px !important;
            }
            .input-hidden {
              position: absolute;
              left: -9999px;
            }

            input[type=radio]:checked + label>img {
              border: 1px solid #fff;
              box-shadow: 0 0 3px 3px #090;
            }

            /* Stuff after this is only to make things more pretty */
            input[type=radio] + label>img {
              /*border: 1px dashed #444;*/
              /*width: 150px;*/
              /*height: 150px;*/
              cursor: pointer;
              transition: 500ms all;
            }

            input[type=radio]:checked + label>img {
              transform: 
                rotateZ(-10deg) 
                rotateX(10deg);
            }

          </style>

           <div class="modal fade " id="modalRespon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
               <div class="modal-dialog">
                   <div class="modal-content " style="top: 20px;">
                      <form action="<?php echo base_url('home/masukanrespon') ?>" method="POST" id="formResponPengguna">
                       <div class="modal-body">
  
                          
                          <br>
                          <!-- <div style="text-align: center;">
                              <select id="example" name="rating">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                              </select>

                          </div> -->
                          <div class="row">
                            <div class="col-xs-2"></div>

                            <div class="col-xs-2">
                              <input 
                                type="radio" name="rating" value="4" 
                                id="select1" class="input-hidden" required="" />
                              <label for="select1">
                                <img src="<?php echo base_url('image/happy.png') ?>" style="width: 100%;" class="select_image">
                                <p class="text-center"><small>Sangat Baik</small></p>
                              </label>
                            </div>

                            <div class="col-xs-2">
                              <input 
                                type="radio" name="rating" value="3" 
                                id="select2" class="input-hidden" required="" checked="" />
                              <label for="select2">
                                <img src="<?php echo base_url('image/happy.svg') ?>" style="width: 100%;" class="select_image">
                                <p class="text-center"><small>Baik</small></p>
                              </label>
                            </div>

                            <div class="col-xs-2">
                              <input 
                                type="radio" name="rating" value="2" 
                                id="select3" class="input-hidden" required="" />
                              <label for="select3">
                                <img src="<?php echo base_url('image/2000px-Emojione_1F605.svg.png') ?>" style="width: 100%;" class="select_image">
                                <p class="text-center"><small>Buruk</small></p>
                              </label>
                            </div>

                            <div class="col-xs-2">
                              <input 
                                type="radio" name="rating" value="1" 
                                id="select4" class="input-hidden"  required="" />
                              <label for="select4">
                                <img src="<?php echo base_url('image/sad.svg') ?>" style="width: 100%;" class="select_image">
                                <p class="text-center"><small>Sangat Buruk</small></p>
                              </label>
                            </div>


                          </div>
                          <br>

                            <textarea name="isi_respon" class="form-control" placeholder="Isi Respon"></textarea>

                       </div>
                       <div class="modal-footer">
                            <input type="hidden"  name="hasilRespon" id="hasilRespon">
                            <button type="submit" class="btn btn-success">Kirim</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                       </form>
                       </div>
                   </div>
               </div>
           </div>
          <script type="text/javascript">
            $(function(){

              $('#example').barrating({
                  theme: 'fontawesome-stars'
              });

              
              $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
              });
            });

          </script>

          <?php
            
              if($this->session->flashdata('pesan') != null) {
                  
              $pesan      = $this->session->flashdata('pesan');
              $isi_pesan  = $pesan['isi'];
              $tipe_pesan = $pesan['tipe'];
          ?>
              <script type="text/javascript">
                  $(function(){
                      toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-bottom-left",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut",
                        "progressBar": true,
                      }

                      toastr.<?php echo $tipe_pesan ?>('<?php echo $isi_pesan ?>');
                  });
              </script>
          <?php

              }
            
          ?>

    </body>
</html>

