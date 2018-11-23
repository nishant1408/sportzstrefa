<?php
session_start();
include '../connect.php' ;
$url = $_SERVER["REQUEST_URI"];
$_SESSION["url"]=$url;
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| ||a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
		echo "";
else
	echo "<script> location.href='../web/".substr($url,8,strlen($url))."'; </script>";
require '../phpmailer/class.phpmailer.php';

		$mail = new PHPMailer;
if(isset($_POST['subscribe']))
{
	$email=$_POST['email'];
	$insert="INSERT INTO subscribers (email) values('$email')";

		if(mysqli_query($connect,$insert))
		{
			
		}
}
if(!isset($_SESSION['user_id']))
{
	$user_id="guest"; 
}
else
{
	$url="mainpage.php";
}
$error=0;
$counter=0;
if(isset($_POST['submitdetails']))
{
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$rpassword="";
	$selectpassword="SELECT * FROM userinfo WHERE email='$email' AND mobile='$mobile' ";
	if($resultpassword=mysqli_query($connect,$selectpassword))
	{
		while ($row = mysqli_fetch_assoc($resultpassword)) 
		{
			$rname=$row["name"];
			$counter++;
			$subject='FORGOT PASSWORD';
			$otp=rand(100000,999999);
			$_SESSION["otp"]=$otp;
			$message='Your OTP to Recover Password is - '.$otp;
			$name=$rname;
			$remail=$email;
			$mail->From = 'care@sportstrefa.tk';	
			include '../sendmail.php';
		}

	}
	else
	{
		$error=1;
	}
}
if(isset($_POST["submitpass"]))
{
	$password=$_POST["password"];
	$mobile=$_POST["mobile"];
	$otp=$_SESSION["otp"];
	$sotp=$_POST["otp"];
	if($otp == $sotp)
	{
	$update="UPDATE userinfo SET password='$password' WHERE mobile='$mobile' ";
	if(mysqli_query($connect,$update))
	{
		echo "<script> window.location.href='index.php' ; </script> ";
	}
	}
	else
	{
		$error=1;
		$counter=1;
		$errorstat="INVALID OTP.TRY AGAIN";
	}

}
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" type="image/x-icon" href="logo.ico" />
<title>SportzStrefa</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Smart Bazaar Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" /> <!-- menu style --> 
<link href="css/ken-burns.css" rel="stylesheet" type="text/css" media="all" /> <!-- banner slider --> 
<link href="css/animate.min.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all"> <!-- carousel slider -->  
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script> 
<!-- //js --> 
<!-- web-fonts -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
<!-- web-fonts --> 
<script src="js/owl.carousel.js"></script>  
<script>
$(document).ready(function() { 
	$("#owl-demo").owlCarousel({ 
	  autoPlay: 3000, //Set AutoPlay to 3 seconds 
	  items :4,
	  itemsDesktop : [640,5],
	  itemsDesktopSmall : [480,2],
	  navigation : true
 
	}); 
}); 
</script>
<script src="js/jquery-scrolltofixed-min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {

        // Dock the header to the top of the window when scrolled past the banner. This is the default behaviour.

        $('.header-two').scrollToFixed();  
        // previous summary up the page.

        var summaries = $('.summary');
        summaries.each(function(i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];

            summary.scrollToFixed({
                marginTop: $('.header-two').outerHeight(true) + 10, 
                zIndex: 999
            });
        });
    });
</script>
<!-- start-smooth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!-- //end-smooth-scrolling -->
<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
		
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->
<script src="js/bootstrap.js"></script>	
</head>
<body>

	<!-- header -->
	<div class="header">
		<div class="w3ls-header"><!--header-one--> 
			<div class="w3ls-header-right">
				<ul>
				
					<li class="dropdown head-dpdn">
						<a href="help.php" class="dropdown-toggle"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div> 
		</div>
		<div class="header-two"><!-- header-two -->
			<div class="container">
				<div class="header-logo">
					<h1><a href="mainpage.php"><span>S</span>portz<span>S</span>trefa</a></h1>
				</div>	
				
				<div class="clearfix"> </div>
			</div>		
		</div><!-- //header-two -->
		
	<!-- //header --> 	
	<!-- login-page -->
	<div class="login-page">
		<div class="container"> 
		<?php
		if($error==0 && $counter==0)
		{
			?>
			<h3 class="w3ls-title w3ls-title1">Enter Your Email and Mobile Number</h3> 
			<h5 class="w3ls-title w3ls-title1"><?php if($error==1){ echo "INVALID DETAILS.TRY AGAIN" ; }?></h5>
			
			<div class="login-body">
				<form action="forgot_password.php" method="post">
					<input type="text" class="form-control bfh-states" name="email" placeholder="Enter your Email" required="">
					<input type="text" name="mobile" class="form-control bfh-states" placeholder="Enter your Mobile" required="">
					<input type="submit" name="submitdetails" value="Recover Account">
					<div class="forgot-grid">
						<div class="clearfix"> </div>
					</div>
				</form>
			</div>  
			<?php
		}
		if($counter==1)
		{
		?>
			<h3 class="w3ls-title w3ls-title1">Enter Your OTP & New Password</h3> 
			<h5 class="w3ls-title w3ls-title1"><?php if($error==1){ echo $errorstat ; }?></h5>
			
			<div class="login-body">
				<form action="forgot_password.php" method="post">
				<input type="hidden" name="mobile" value="<?=$mobile?>" >
				<input type="text" class="form-control bfh-states" name="otp" placeholder="Enter OTP" required="">
					<input type="password" class="form-control bfh-states" name="password" placeholder="Enter your New Password" required="">
					<input type="submit" name="submitpass" value="Change Password">
					<div class="forgot-grid">
						<div class="clearfix"> </div>
					</div>
				</form>
			</div>  
			<?php
		}
		?>
		
			<h6> Not a Member? <a href="signup.php">Sign Up Now »</a> </h6> 
		</div>
	</div>
	<!-- //login-page --> 
	<!-- footer-top -->
	<?php
include 'footer.php';
?>