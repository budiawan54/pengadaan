<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf-8">
    <title>Buku Tamu</title>
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
                	<div id="logo"><img src="<?php echo base_url('/resources/img/logo_header.png') ?>" width="250"></div>
                    <h1>Bagian Layanan Pengadaan</h1>
                    <h2>Kabupaten Buleleng, Bali</h2>
                </div>
			</div>
            <div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div id="newsletter_wp" >
						<div class="row">
                            <div class="col-md-12">
                        	    <a href="<?php echo base_url('bukutamu/isi') ?>" class="btn-check btn-lg" style="width: 100%;">Isi Buku Tamu</a>
                            </div>
                        </div>                            	
					</div><!-- End newsletter_wp -->	
				</div><!-- End row -->			
			</div><!-- End container -->
            
     
                    <div id="social_footer">
                       <!--  <ul>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-google"></i></a></li>
                            <li><a href="#"><i class="icon-instagram"></i></a></li>
                            <li><a href="#"><i class="icon-pinterest"></i></a></li>
                            <li><a href="#"><i class="icon-vimeo"></i></a></li>
                            <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        </ul> -->
                        <p>© Bagian Layanan Pengadaan Buleleng 2017</p>
                    </div>

            
		</div><!-- End container -->
        
        
	</div><!-- End main -->
    
</div><!-- End wrapper -->
	

<div id="slides">
	<ul class="slides-container">
		<li><img src="<?php echo base_url('/resources/img/6.jpg') ?>"></li>
		<li><img src="<?php echo base_url('/resources/img/7.jpg') ?>"></li>
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