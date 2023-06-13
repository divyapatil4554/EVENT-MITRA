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
<script type="text/javascript">
    function validate_form()
    {
		var name        = document.getElementById("name").value;
        var phone       = document.getElementById("phone").value;
        var email       = document.getElementById("email").value;
               
        var validchar = /^[A-Z a-z]+$/;
        
        //name
        if (name.trim() === "") {
            alert("Name cannot be empty.");
            return false;
        }
        var repeatingCharsRegex = /([a-zA-Z])\1{2}/;
        if (repeatingCharsRegex.test(name)) {
            alert("Name should not have repeating  alphabets more than 2 times.");
            return false;
        }
        var specialCharsRegex = /[!@#$%^&*(),.?":{}|<>]/;
        if (specialCharsRegex.test(name)) {
            alert("Name should not contain special characters.");
            return false;
        }
        var specialCharsRegex = /[^a-zA-Z\s]/;
        if (specialCharsRegex.test(name)) {
            alert("Name should only contain alphabets and spaces.");
            return false;
        }
        //phone
        else if(phone=='')
        {
            alert("Please Enter Your Phone Number.");
            return false;  
        }
        else if(isNaN(phone))
        {
            alert("Phone Number should be numeric.");
            return false;  
        }
        else if(checkInternationalPhone(phone)==false)
        {
            alert("Please Enter a Valid Phone Number");
    		return false;   
        }
       //email
       if (email.trim() === "") {
            alert("email cannot be empty.");
            return false;
        }
        var emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[cC][oO][mM]$/;
        if (!emailRegex.test(email)) {
            alert("Invalid email format.");
            return false;
        }
        var repeatingCharsRegex = /^([A-Za-z0-9._%+-])\1+@/;
        if (repeatingCharsRegex.test(email)) {
            alert("Email should not have repeating characters or alphabets before and after the @ symbol.");
            return false;
        }
        var emailRegex = /^[A-Za-z0-9._%+-]+@gmail\.com$/;
        if (!emailRegex.test(email)) {
            alert("Invalid Gmail address.");
            return false;
        }
        else if(validateEmail(email))
        {
            alert("Please Enter Valid Email Address.");
            return false;   
        }
    }
    
    function validateEmail(email)
    {
        var atpos  = email.indexOf("@");   // The indexOf() method returns the position of the first occurrence of a specified value in a string. // Default value of start is 0  
        //alert(atpos);
        var dotpos = email.lastIndexOf(".");  // The lastIndexOf() method returns the position of the last occurrence of a specified value in a string. // Default value of start is 0  
        //alert(dotpos);
        
        if((atpos<1) || (dotpos<(atpos+2)) || (dotpos+2>=email.length))  
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    // Declaring required variables
    var digits = "0123456789";
    // non-digit characters which are allowed in phone numbers
    var phoneNumberDelimiters = "()- ";
    // characters which are allowed in international phone numbers
    // (a leading + is OK)
    var validWorldPhoneChars = phoneNumberDelimiters + "+";
    // Minimum no of digits in an international phone no.
    var minDigitsInIPhoneNumber = 10;
    
    function isInteger(s)
    {   var i;
        for (i = 0; i < s.length; i++)
        {   
            // Check that current character is number.
            var c = s.charAt(i);
            if (((c < "0") || (c > "9"))) return false;
        }
        // All characters are numbers.
        return true;
    }
    
    function trim(s)
    {   var i;
        var returnString = "";
        // Search through string's characters one by one.
        // If character is not a whitespace, append to returnString.
        for (i = 0; i < s.length; i++)
        {   
            // Check that current character isn't whitespace.
            var c = s.charAt(i);
            if (c != " ") returnString += c;
        }
        return returnString;
    }
    
    function stripCharsInBag(s, bag)
    {   var i;
        var returnString = "";
        // Search through string's characters one by one.
        // If character is not in bag, append to returnString.
        for (i = 0; i < s.length; i++)
        {   
            // Check that current character isn't whitespace.
            var c = s.charAt(i);
            if (bag.indexOf(c) == -1) returnString += c;
        }
        return returnString;
    }
    
    function checkInternationalPhone(strPhone){
        var bracket=3;
        strPhone=trim(strPhone);
        if(strPhone.indexOf("+")>1) return false;
        if(strPhone.indexOf("-")!=-1)bracket=bracket+1;
        if(strPhone.indexOf("(")!=-1 && strPhone.indexOf("(")>bracket)return false;
        var brchr=strPhone.indexOf("(");
        if(strPhone.indexOf("(")!=-1 && strPhone.charAt(brchr+2)!=")")return false;
        if(strPhone.indexOf("(")==-1 && strPhone.indexOf(")")!=-1)return false;
        s=stripCharsInBag(strPhone,validWorldPhoneChars);
        return (isInteger(s) && s.length >= minDigitsInIPhoneNumber);
    }    
</script>
<?php
require_once "eventhelper.php";
$helper = new EventHelper();

$id = $_REQUEST['id'];
$data = $helper->getEvent($id);


$msg = "";
if($_POST)
{
    $msg = $helper->addBooking();
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
                <h1><?php echo $data->event_name; ?></h1>
              </div>
            </div>
          </div>
        </section>
      </header>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h2 class="text-left"><?php echo $data->event_name; ?></h2>
            <hr/>
            <?php
            if(file_exists('images/events/'.$data->event_image) && $data->event_image)
            {
                ?>
                <p class="text-center">
                    <img style="width: 100%;" class="" src="<?php echo 'images/events/'.$data->event_image;?>" alt=""/>
                </p>
                <?php
            }
            ?>
            <p><strong>Date:</strong> <?php echo date('d/m/Y',strtotime($data->event_date));?> <strong>Location:</strong> <?php echo $data->event_location; ?></p>
            <p><?php echo $data->event_details;?></p>
            
            <h2>Book Event</h2>
            <hr />
            <?php echo $msg;?>
            <form method="post" action="" onsubmit="return validate_form();" enctype="multipart/form-data">
                 <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" id="name" name="name"  class="form-control input-lg" placeholder="Your Name"/>
                        </div>
                    </div>
                
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Your Phone</label>
                            <input type="text" id="phone" name="phone" maxlength="10"  class="form-control input-lg" placeholder="Your Phone"/>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Your Email</label>
                            <input type="text" id="email" name="email" class="form-control input-lg" placeholder="Your Email"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="hidden" name="event_id" value="<?php echo $data->id; ?>" />
                            <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Book now!"/>
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
<script src="js/init.js"></script> <!-- All Scripts --> 
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