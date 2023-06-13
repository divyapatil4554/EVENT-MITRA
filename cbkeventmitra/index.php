<!DOCTYPE HTML>
<html class="no-js">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Event Mitra</title>

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0"/>
<meta name="format-detection" content="telephone=no"/>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link href="plugins/sequence/css/sequence.html" rel="stylesheet" type="text/css"/>
<link href="plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css"/>
<link href="plugins/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css"/>
<link href="plugins/owl-carousel/css/owl.theme.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugins/rs-plugin/css/settings.css" media="screen" />

<!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="css/ie8.css" media="screen" /><![endif]-->


<link class="alt" href="colors/pink.css" rel="stylesheet" type="text/css"/>

<script src="js/modernizr.js"></script>
<?php
require_once "eventhelper.php";
$helper = new EventHelper();
?>
</head>
<body class=""  style="background-image: url('images/backgrounds/images/img3.jpg'); background-repeat: no-repeat; background-size: cover;">
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]--> 
<!-- Start Body Container -->

<div class="body footer-style2 header-style3"> 
  <!-- Start Header -->
  <?php
    require_once "header.php";
  ?>
  <!-- End Header --> 
  
  <!-- Start Content -->
  <div class="main" role="main">
    <div id="content" class="content full">
      <div class="rev-slider-container">
        <div class="tp-banner-container">
          <div class="tp-banner" >
            <ul>
              <!-- SLIDE  -->
              <li data-delay="4000" data-masterspeed="600" data-slotamount="7" data-transition="scaledownfromtop"> 
                <!-- MAIN IMAGE --> 
                <img src="images/slide5.jpg" alt=""> 
                
                
              </li>
              
              <li data-delay="4000" data-masterspeed="600" data-slotamount="7" data-transition="scaledownfromtop"> 
                <!-- MAIN IMAGE --> 
                <img src="images/slide6.jpg" alt=""> 
                
                
              </li>
              
              
            </ul>
          </div>
        </div>
      </div>
      
      <div class="featured-row dgray-color margin-20">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2>Welcome to Event Mitra.</h2>
              <a href="aboutus.php" class="btn btn-primary">Know more</a> </div>
          </div>
        </div>
      </div>
      
      <div class="padding-tb75">
        <div class="container text-align-center">
        
            <div class="row">
                <div class="col-md-4" data-appear-animation="bounceIn" data-appear-animation-delay="5">
                    <section class="features text-align-center">
                        <i class="ic-lg fa fa-eye fa-2x"></i>
                        <h3 class="short">Event Mitra</h3>
                        <hr class="sm" />
                        <p class="md">Aliquam enim enim, pharetra in sodales at, interdum sit amet dui. Nullam vulputate euismod urna non pharetra. Phasellus blandit mattis ipsum, ac laoreet Morlem lacinia et. Cras et ligula.</p>
                    </section>
                </div>
                <div class="col-md-4" data-appear-animation="bounceIn" data-appear-animation-delay="25">
                    <section class="features text-align-center">
                        <i class="ic-lg fa fa-headphones fa-2x"></i>
                        <h3 class="short">Event Mitra</h3>
                        <hr class="sm" />
                        <p class="md">Aliquam enim enim, pharetra in sodales at, interdum sit amet dui. Nullam vulputate euismod urna non pharetra. Phasellus blandit mattis ipsum, ac laoreet Morlem lacinia et. Cras et ligula.</p>
                    </section>
                </div>
                <div class="col-md-4" data-appear-animation="bounceIn" data-appear-animation-delay="75">
                    <section class="features text-align-center">
                        <i class="ic-lg fa fa-thumbs-o-up fa-2x"></i>
                        <h3 class="short">Event Mitra</h3>
                        <hr class="sm" />
                        <p class="md">Aliquam enim enim, pharetra in sodales at, interdum sit amet dui. Nullam vulputate euismod urna non pharetra. Phasellus blandit mattis ipsum, ac laoreet Morlem lacinia et. Cras et ligula.</p>
                    </section>
                </div>
            </div>

          
        </div>
      </div>     
      
    </div>
  </div>
  
  <?php
  require_once "footer.php";
  ?>
  </div>
<!-- End Body Container --> 
<script src="js/jquery-latest.min.js"></script> <!-- Jquery Library Call --> 
<script src="plugins/prettyphoto/js/prettyphoto.js"></script> 
<script src="plugins/owl-carousel/js/owl.carousel.min.js"></script> 
<script src="plugins/page-scroller/jquery.pagescroller.js"></script> 
<script src="js/helper-plugins.js"></script> <!-- Plugins --> 
<script src="js/bootstrap.js"></script> <!-- UI --> 
<script src="js/init.js"></script> <!-- All Scripts --> 
<script src="plugins/rs-plugin/js/jquery.themepunch.plugins.min.js"></script> 
<script src="plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script src="js/revolution-slider-init.js"></script> <!-- Revolutions Slider Intialization --> 
<!-- Preloader --> 
<script type="text/javascript">
	//<![CDATA[
		$(window).load(function() { // makes sure the whole site is loaded
			$("#status").fadeOut(); // will first fade out the loading animation
			$("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.
		});
	//]]>
</script> 
<!-- End Js -->

</body>
</html>