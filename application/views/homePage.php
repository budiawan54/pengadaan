<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SiAP (Sistem Informasi dan Aplikasi Pengadaan)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
    
    <!-- CSS -->
    <link href="<?php echo base_url('resources/front') ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('resources/front') ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('resources/front') ?>/fontello/css/fontello.css" rel="stylesheet" > 
    <link href="<?php echo base_url('resources/front') ?>/fontello/css/animation.css" rel="stylesheet" > 
    
    <!--[if lt IE 9]>
      <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    </head>
    <body>
  
<div id="wrapper">
    <div id="main">
        <div class="container">
            
            <div class="row countdown">
                <div class="col-md-12">
                    <div id="logo"><img src="<?php echo base_url('/resources/image/logo_heder.png') ?>" width="250"></div>
                    <h1>Bagian Layanan Pengadaan</h1>
                    <h2>Provinsi Bali</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div id="" >
                        
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div style="text-align: center;">
                                            <p style="color : #000;">Silahkan login untuk melanjutkan</p>    
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
                                
                                <!--<a href="<?php echo base_url('login') ?>" class="btn-check btn-lg" style="width: 100%;">Login Ke Sistem</a>-->
                                                       
                    </div><!-- End newsletter_wp -->    
                </div><!-- End row -->          
            </div><!-- End container -->
            
    
            <div id="social_footer">
                <ul>
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-google"></i></a></li>
                    <li><a href="#"><i class="icon-instagram"></i></a></li>
                    <li><a href="#"><i class="icon-pinterest"></i></a></li>
                    <li><a href="#"><i class="icon-vimeo"></i></a></li>
                    <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                </ul>
                <p>Bagian Layanan Provinsi Bali &copy; 2019</p>
            </div>

            
        </div><!-- End container -->
        
        
    </div><!-- End main -->
    
</div><!-- End wrapper -->
    

<div id="slides">
    <ul class="slides-container">
        <li><img src="<?php echo base_url('/resources/image/6.jpg') ?>"></li>
        <li><img src="<?php echo base_url('/resources/image/7.jpg') ?>"></li>
        <li><img src="<?php echo base_url('/resources/image/bg.jpg') ?>"></li>
    </ul>
</div><!-- End background slider -->

<!-- JQUERY -->
<script src="<?php echo base_url('resources/front') ?>/js/jquery-1.11.2.min.js"></script>
<script src="<?php echo base_url('resources/front') ?>/js/jquery.easing.1.3.min.js"></script>
<script src="<?php echo base_url('resources/front') ?>/js/jquery.animate-enhanced.min.js"></script>
<script src="<?php echo base_url('resources/front') ?>/js/jquery.superslides.min.js"></script>
<script  type="text/javascript">
  $('#slides').superslides({
      play: 6000,
      pagination:false,
      animation_speed: 800,
      animation: 'fade'
    });
</script>
<!-- OTHER JS --> 
<script src="<?php echo base_url('resources/front') ?>/js/retina.min.js"></script>
<script  src="<?php echo base_url('resources/front') ?>/js/functions.js"></script>
<script src="<?php echo base_url('resources/front') ?>/assets/validate.js"></script>
  </body>
</html>