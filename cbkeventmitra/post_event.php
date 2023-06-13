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

if($_SESSION['userid']=='')
{
    echo "<script>window.location='login.php';</script>";
}


$msg = "";
if($_POST)
{
    $r = $helper->addEvent();
    if($r)
    {
        $msg='<div class="alert alert-info" role="alert">
				<h3>Event added successfully and it is under admin moderation.</h3>
			  </div>';
    }
    else
    {
        $msg='<div class="alert alert-info" role="alert">
				<h3>Event not added successfully.</h3>
			  </div>';
    }
}
?>
</head>
<body class="" >
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]--> 
<!-- Preloader -->
<div id="preloader">
  <div id="status"></div>
</div>

<!-- Start Body Container -->
<div class="body footer-style2 header-style3"> 
  <!-- Start Header -->
  <?php
    require_once "header.php";
  ?>
  <!-- End Header --> 
  
  <!-- Start Content -->
  <div class="main" role="main">
    <div id="content" class="content page-content full">
      <header class="page-header flexible parallax text-align-center parallax-overlay" style="background-image:url(images/img4.jpg)">
        <section>
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h1>Post Event</h1>
              </div>
            </div>
          </div>
        </section>
      </header>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2>Post Event</h2>
            <hr/>
            <p><?php echo $msg;?></p>
            <form method="post" action="" onsubmit="return validate_form();" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Event Name</label>
                            <input type="text" id="event_name" name="event_name"  class="form-control input-lg" placeholder="Event Name"/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Event Date (DD/MM/YYYY)</label>
                            <input type="date" id="event_date" name="event_date" class="form-control input-lg" placeholder="Event Date" min="<?php echo date('Y-m-d'); ?>" max="2045-12-31" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Event Location</label>
                            <input type="text" id="event_location" name="event_location"  class="form-control input-lg" placeholder="Event Location"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Event Image</label>
                            <input type="file" id="image" name="image"  class="" placeholder="Event Image"/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Event Details</label>
                            <textarea rows="4" id="event_details" name="event_details"  class="form-control input-lg" placeholder="Event Details"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Post Event"/>
                        </div>
                    </div>
                </div>
            </form>
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
<script src="plugins/prettyphoto/js/prettyphoto.js"></script>  
<script src="plugins/owl-carousel/js/owl.carousel.min.js"></script> 
<script src="plugins/page-scroller/jquery.pagescroller.js"></script> 
<script src="js/helper-plugins.js"></script> <!-- Plugins --> 
<script src="js/bootstrap.js"></script> <!-- UI --> 
<script src="js/init.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $("form").submit(function() {
      // Get form values
      var event_name = $("#event_name").val().trim();
      var event_date = $("#event_date").val().trim();
      var event_location = $("#event_location").val().trim();
      var image = $("#image").val().trim();
      var event_details = $("#event_details").val().trim();

      // Perform validation
      if (event_name === "") {
        alert("Please enter the event name.");
        return false;
      } 
      var numericRegex = /[0-9]/;
        if (numericRegex.test(event_name)) {
            alert("event name should not contain numeric characters.");
            return false;
        }
        var specialCharsRegex = /[^a-zA-Z\s]/;
        if (specialCharsRegex.test(event_name)) {
            alert("event name should only contain alphabets and spaces.");
            return false;
        }
        var repeatingCharsRegex = /([a-zA-Z])\1{2}/;
        if (repeatingCharsRegex.test(event_name)) {
            alert("event name should not have repeating characters or alphabets more than 2 times.");
            return false;
        }
      if (event_date === "") {
        alert("Please select the event date.");
        return false;
      }
      if (event_location === "") {
        alert("Please enter the event location.");
        return false;
      }
      if (image === "") {
        alert("Please select an event image.");
        return false;
      }
      if (event_details === "") {
        alert("Please enter the event details.");
        return false;
      }
      // If all validations pass, the form will be submitted
      return true;
    }
    );
  });

  function validdate(date)
  {
    // regular expression to match required date format
    re = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;

    if(form.startdate.value != '') {
      if(regs = form.startdate.value.match(re)) {
        // day value between 1 and 31
        if(regs[1] < 1 || regs[1] > 31) {
          alert("Invalid value for day: " + regs[1]);
          form.startdate.focus();
          return false;
        }
        // month value between 1 and 12
        if(regs[2] < 1 || regs[2] > 12) {
          alert("Invalid value for month: " + regs[2]);
          form.startdate.focus();
          return false;
        }
        // year value between 1902 and 2023
        if(regs[3] < 1902 || regs[3] > (new Date()).getFullYear()) {
          alert("Invalid value for year: " + regs[3] + " - must be between 1902 and " + (new Date()).getFullYear());
          form.startdate.focus();
          return false;
        }
      } else {
        alert("Invalid date format: " + form.startdate.value);
        form.startdate.focus();
        return false;
      }
    }
  }
</script>
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