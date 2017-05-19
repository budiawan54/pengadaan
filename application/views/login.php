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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/resources/plugin/CodeSeven-toastr-3f54c48/build/toastr.min.css') ?>">
    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar" data-offset="100">
            
        <a href="#page-top" class="go-to-top">
            <i class="fa fa-long-arrow-up"></i>
        </a>
        
        <nav class="navbar navbar-pasific navbar-mp navbar-standart  navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand font-montserrat " href="<?php echo base_url('/home') ?>">
                        BLP Buleleng
                    </a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
            </div>
        </nav>



    
    <section  class="bg-gray  pt70 pb75" style="padding-top: 150px; padding-bottom: 150px;">
        <div class="container">
            <div class="row" >
                                                 
                    <div  class="col-sm-4 col-sm-offset-4">
                        <div class="content-box content-box-center">                        
                            <span class="icon-profile-male color-info"></span>
                                <h4>Login Akun</h4>
                              <p>Masukan username dan password anda untuk melanjutkan.</p>
                        </div>


                        <form method="POST" action="<?php echo base_url('login') ?>" >
                            <div class="form-group">
                              <input type="text" required="" name="Username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                              <input type="password" required="" name="Password" class="form-control" placeholder="Password">
                            </div>
                            <?php
                               if($this->session->flashdata('pesan') != null) {
                            ?>
                            <div class="alert alert-danger">
                              Maaf, kombinasi username dan password tidak sesuai
                            </div>
                            <?php
                              }
                            ?>
                            <div class="form-group">
                              <button type="submit" class="btn btn-info btn-block"><i class="fa fa-login"></i> Login</button>
                            </div>
                        </form>

                    </div>
            </div>
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
           
           <script src="<?php echo base_url('resources/back') ?>/assets/js/main/jquery.sticky.js"></script>
           <script src="<?php echo base_url('resources/back') ?>/assets/js/main/main.js"></script>


    </body>
</html>

