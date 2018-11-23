<?php
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
session_start();
require '../phpmailer/class.phpmailer.php';

		$mail = new PHPMailer;
include '../connect.php' ;
if(!isset($_SESSION['user_id']))
{
	$user_id="guest"; 
	$pincode="";
}
if(isset($_SESSION['user_id']))
{
	$user_id=$_SESSION['user_id'];
}

$selectname="SELECT * FROM userinfo WHERE user_id='$user_id' ";
if($resultname=mysqli_query($connect,$selectname))
{
	while ($row = mysqli_fetch_assoc($resultname)) 
	{
		$rname=$row["name"];
		$order_num=$row["order_num"];
		$balance=$row["balance"];
		$pincode=$row["pincode"];
		$verify=$row["verify"];
		$email=$row["email"];
		if($verify == 0)
		{
			$subject='EMAIL CONFIRMATION';
			$otp=rand(100000,999999);
			$_SESSION["otp"]=$otp;
			$message='Your OTP is - '.$otp;
			$name=$rname;
			$remail=$email;
			$mail->From = 'care@sportstrefa.tk';	
			include '../sendmail.php';
			echo "<script> window.location.href='verify.php'; </script> ";
		}
	}
}
$cartitem=0;
$select="SELECT * FROM cart WHERE user_id='$user_id' ";
if($result=mysqli_query($connect,$select))
{
	while ($row = mysqli_fetch_assoc($result)) 
	{
		$cartitem++;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" type="image/x-icon" href="logo.ico" />
<title>SportzStrefa</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="SportzStrefa" />
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
</style>
</head>

<body>

<div class="agileits-modal modal fade" id="subscribesubmit" tabindex="-1" role="dialog" aria-labelledby="myModal88"
		aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><i class="fa" aria-hidden="true"></i> <font face="Comic Sans" >YOU HAVE BEEN SUBSCRIBED </font> </h4>
				</div>
				
			</div>
		</div>
	</div>
<div class="agileits-modal modal fade" id="addincart" tabindex="-1" role="dialog" aria-labelledby="myModal88"
		aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><i class="fa" aria-hidden="true"></i><font face="Comic Sans" > PRODUCT HAS BEEN ADDED TO YOUR &nbsp;CART</font> </h4>
					<div class="modal-body modal-body-sub"> 
					<button type="button" class="close2" data-dismiss="modal" aria-hidden="true" onclick="location.href='cart.php'">VIEW CART</button>
					</div>
				</div>
				
			</div>
		</div>
</div>
<div class="agileits-modal modal fade" id="cartlimit" tabindex="-1" role="dialog" aria-labelledby="myModal88"
		aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><i class="fa" aria-hidden="true"></i><font face="Comic Sans" > CART CAN ONLY CONTAIN 5 ITEMS AT A TIME.</font> </h4>
					<div class="modal-body modal-body-sub"> 
					<button type="button" class="close2" data-dismiss="modal" aria-hidden="true" onclick="location.href='cart.php'">VIEW CART</button>
					</div>
				</div>
				
			</div>
		</div>
</div>
<div class="agileits-modal modal fade" id="notify" tabindex="-1" role="dialog" aria-labelledby="myModal88"
		aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><i class="fa" aria-hidden="true"></i><font face="Comic Sans" > WE WILL NOTIFY YOU ONCE THE PRODUCT IS BACK IN STOCK.</font> </h4>
					<div class="modal-body modal-body-sub"> 
					
					</div>
				</div>
				
			</div>
		</div>
</div>
<div class="agileits-modal modal fade" id="duplicateitem" tabindex="-1" role="dialog" aria-labelledby="myModal88"
		aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><i class="fa" aria-hidden="true"></i><font face="Comic Sans" > CART ALREADY HAS THE ITEM.</font> </h4>
					<div class="modal-body modal-body-sub"> 
					<button type="button" class="close2" data-dismiss="modal" aria-hidden="true" onclick="location.href='cart.php'">VIEW CART</button>
					</div>
				</div>
				
			</div>
		</div>
</div>
<div class="agileits-modal modal fade" id="addinwishlist" tabindex="-1" role="dialog" aria-labelledby="myModal88"
		aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><i class="fa" aria-hidden="true"></i><font face="Comic Sans" > PRODUCT HAS BEEN ADDED TO YOUR &nbsp;WISHLIST</font> </h4>
					<div class="modal-body modal-body-sub"> 
					<button type="button" class="close2" data-dismiss="modal" aria-hidden="true" onclick="location.href='wishlist.php'">VIEW CART</button>
					</div>
				</div>
				
			</div>
		</div>
</div>
<div class="agileits-modal modal fade" id="cancelorder" tabindex="-1" role="dialog" aria-labelledby="myModal88"
		aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><i class="fa" aria-hidden="true"></i><font face="Comic Sans" > ARE YOU SURE YOU WANT TO CANCEL YOUR ORDER ?</font> </h4>
					<div class="modal-body modal-body-sub"> 
					<button type="button" class="close2" data-dismiss="modal" aria-hidden="true" onclick="location.href='order.php?cancel=YES'">YES</button>
					<button type="button" class="close2" data-dismiss="modal" aria-hidden="true" onclick="location.href='order.php?cancel=NO'">NO</button>
					</div>
				</div>
				
			</div>
		</div>
</div>
<div class="agileits-modal modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModal88"
		aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><i class="fa" aria-hidden="true"></i> <font face="Comic Sans" >YOU ARE NOT LOGGED IN &nbsp;LOGIN/SIGNUP </font></h4>
					<div class="modal-body modal-body-sub"> 
					<button type="button" class="close2" data-dismiss="modal" aria-hidden="true" onclick="location.href='login.php'">LOGIN</button>
					</div>
				</div>
				
			</div>
		</div>
</div>
<?php
if(isset($_POST['subscribe']))
{
	$email=$_POST['email'];
	$insert="INSERT INTO subscribers (email) values('$email')";
		if(mysqli_query($connect,$insert))
		{
			echo "	<script> $('#subscribesubmit').modal('show'); </script> ";
		}
}
?>

<?php

if(isset($_POST["cart"]))
{
	if(isset($_SESSION["user_id"]))
	{
		if($cartitem<5)
		{
		$product_id=$_POST["cart"];
		$quantity=$_POST["quantity"];
		$size=$_POST["size"];
		$error=0;
		$select="SELECT * FROM cart WHERE user_id='$user_id' AND product_id='$product_id'";
		if($result=mysqli_query($connect,$select))
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$error++;
			}
		}
		if($error==0)
		{
		$insert="INSERT INTO cart (user_id,product_id,quantity,size) values ('$user_id','$product_id','$quantity','$size')";

		if(mysqli_query($connect,$insert))
		{
			echo "<script> $('#addincart').modal('show'); </script> ";

		}
		}
		else
		{
			echo "<script> $('#duplicateitem').modal('show'); </script> ";
		}
		}
		else
		{
			echo "<script> $('#cartlimit').modal('show'); </script> ";
		}
	}
	else
	{
		echo "<script> $('#login').modal('show'); </script> ";

	}
}
if(isset($_POST["wishlist"]))
{
	if(isset($_SESSION["user_id"]))
	{
		$product_id=$_POST["product_id"];
		$insert="INSERT INTO wishlist (user_id,product_id) values ('$user_id','$product_id')";

		if(mysqli_query($connect,$insert))
		{
			echo "<script> $('#addinwishlist').modal('show'); </script> ";

		}
	}
	else
	{
		echo "<script> $('#login').modal('show'); </script> ";

	}
}
?>
	<!-- header -->
	<div class="header">
		<div class="w3ls-header"><!--header-one--> 
			<div class="w3ls-header-right">
				<ul>
				<?php
				if($user_id=="guest")
				{
					?>
					<li class="dropdown head-dpdn">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> My Account<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="login.php">Login </a></li> 
							<li><a href="signup.php">Sign Up</a></li>  
						</ul> 
					</li>
					<?php					
				}
				else
				{
					?>
					<li class="dropdown head-dpdn">
						<a href="#" class="dropdown-toggle"data-toggle="dropdown"><i class="fa fa-bell" aria-hidden="true"></i> Notifications<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<?php
							$counter=0;
							$select = "SELECT * FROM notification WHERE user_id='$user_id' ORDER BY id DESC";
							if($result=mysqli_query($connect,$select))
							{
								while ($row = mysqli_fetch_assoc($result)) 
								{
									echo "<p>".$row["timedate"]."</p>";
									echo "<li style='width:300px'><div class='col-md-12'>".$row["info"]."</div></li>";
									$counter++;
									if($counter==5)
									{
										break;
									}
								}
							}
							if($counter==0)
							{
								echo "<li style='width:300px'><div class='col-md-12'><a href='mainpage.php'>No Notification</a></div></li>";
								
							}
							?>
						</ul>
					</li>
					<li class="dropdown head-dpdn">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i>Hi <?php echo strtoupper($rname) ?><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="profile.php">Profile</a></li>
							<li><a href="order.php">My Orders</a></li>
							<li><a href="cart.php">My Cart</a></li>
							<li><a href="wishlist.php">My Wishlist</a></li>
							<li><a href="wallet.php">Wallet</a></li> 
							<li><a href="logout.php">Log Out</a></li>
						</ul> 
					</li> 
					<?php
				}
				?>
				<?php
				if($user_id != "guest" )
				{
					?>
				<li class="dropdown head-dpdn">
						<a href="cart.php" class="dropdown-toggle"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart</a>
					</li>
				<?php } ?>
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
				
				<div class="header-search">
					<form action="search.php" method="GET">
						<input type="search" name="name" placeholder="Search for a Product..." required="" style="width=100px" >
						<input type="hidden" name="type" value="search" required="">
						<button type="submit" class="btn btn-default" aria-label="Left Align">
							<i class="fa fa-search" aria-hidden="true"> </i>
						</button>
					</form>
				</div>
				
				<div class="clearfix"> </div>
			</div>		
		</div><!-- //header-two -->
		<div class="header-three"><!-- header-three -->
			<div class="container">
				<div class="menu">
					<div class="cd-dropdown-wrapper">
						<a class="cd-dropdown-trigger" href="#0">Store Categories</a>
						<nav class="cd-dropdown"> 
							<a href="#0" class="cd-close">Close</a>
							<ul class="cd-dropdown-content"> 
								<li class="has-children">
									<a href="product.php?sports=CRICKET&type=ALL&filter=NO">Cricket</a> 
									<ul class="cd-secondary-dropdown is-hidden">
										<li class="go-back"><a href="#">Menu</a></li> 
										
												<li><a href="product.php?sports=CRICKET&type=ALL&filter=NO">ALL</a> </li>
												<li><a href="product.php?sports=CRICKET&type=CRICKET BAT&filter=NO">Bats</a></li>
												<li><a href="product.php?sports=CRICKET&type=CRICKET BALL&filter=NO">Balls</a></li>
												<li><a href="product.php?sports=CRICKET&type=CRICKET SHOES&filter=NO">Shoes</a></li>
												<li><a href="product.php?sports=CRICKET&type=JERSEY&filter=NO">Jersey</a></li>
												<li><a href="product.php?sports=CRICKET&type=OTHERS&filter=NO">Others</a></li> 
									</ul>
								</li>		
								
								<li class="has-children">
									<a href="product.php?sports=FOOTBALL&type=ALL&filter=NO">Football</a> 
									<ul class="cd-secondary-dropdown is-hidden">
										<li class="go-back"><a href="#">Menu</a></li>  
											
												<li><a href="product.php?sports=FOOTBALL&type=ALL&filter=NO">ALL</a> </li>
												<li><a href="product.php?sports=FOOTBALL&type=FOOTBALL&filter=NO">Balls</a></li>
												<li><a href="product.php?sports=FOOTBALL&type=FOOTBALL SHOES&filter=NO">Shoes</a></li>
												<li><a href="product.php?sports=FOOTBALL&type=JERSEY&filter=NO">Jersey</a></li>
												<li><a href="product.php?sports=FOOTBALL&type=OTHERS&filter=NO">Others</a></li> 
											
										
									</ul> <!-- .cd-secondary-dropdown --> 
								</li> <!-- .has-children -->
								<li class="has-children">
									<a href="product.php?sports=CYCLING&type=ALL&filter=NO">Cycling</a> 
									<ul class="cd-secondary-dropdown is-hidden">
										<li class="go-back"><a href="#">Menu</a></li>
												<li><a href="product.php?sports=CYCLING&type=ALL&filter=NO">ALL</a> </li>
												<li><a href="product.php?sports=CYCLING&type=CYCLE&filter=NO">Cycle</a></li>
												<li><a href="product.php?sports=CYCLING&type=CYCLING KIT&filter=NO">Cycling Kit</a></li>
												<li><a href="product.php?sports=CYCLING&type=OTHERS&filter=NO">Others</a></li> 
											
										
									</ul> <!-- .cd-secondary-dropdown --> 
								</li> <!-- .has-children -->
								<li class="has-children">
									<a href="product.php?sports=CYCLING&type=ALL&filter=NO">Swimming</a> 
									<ul class="cd-secondary-dropdown is-hidden">
										<li class="go-back"><a href="#">Menu</a></li>
										
										
												<li><a href="product.php?sports=SWIMMING&type=ALL&filter=NO">ALL</a> </li>
												<li><a href="product.php?sports=SWIMMING&type=GOGGLES&filter=NO">Goggles</a></li>
												<li><a href="product.php?sports=SWIMMING&type=OTHERS&filter=NO">Others</a></li> 
											
									</ul> <!-- .cd-secondary-dropdown --> 
								</li> <!-- .has-children -->
								<li class="has-children">
									<a href="product.php?sports=CYCLING&type=ALL&filter=NO">Hockey</a> 
									<ul class="cd-secondary-dropdown is-hidden">
										<li class="go-back"><a href="#">Menu</a></li>

												<li><a href="product.php?sports=HOCKEY&type=ALL&filter=NO">ALL</a> </li>
												<li><a href="product.php?sports=HOCKEY&type=HOCKEY BAT&filter=NO">Bat</a></li> 
												<li><a href="product.php?sports=HOCKEY&type=HOCKEY BALL&filter=NO">Ball</a></li> 
												<li><a href="product.php?sports=HOCKEY&type=OTHERS&filter=NO">Others</a></li> 
										
									</ul> <!-- .cd-secondary-dropdown --> 
								</li> <!-- .has-children -->
								<li class="has-children">
									<a href="product.php?sports=CYCLING&type=ALL&filter=NO">Boxing</a> 
									<ul class="cd-secondary-dropdown is-hidden">
										<li class="go-back"><a href="#">Menu</a></li>

												<li><a href="product.php?sports=BOXING&type=ALL&filter=NO">ALL</a> </li>
												<li><a href="product.php?sports=BOXING&type=PUNCHING BAGS&filter=NO">Punching Bag</a></li>
												<li><a href="product.php?sports=BOXING&type=SPEED BAG&filter=NO">Speed Bag</a></li>
												<li><a href="product.php?sports=BOXING&type=GLOVES&filter=NO">Gloves</a></li>
												<li><a href="product.php?sports=BOXING&type=PROTECTIVE EQUIPMENT&filter=NO">Protective Equipment</a></li>
												<li><a href="product.php?sports=BOXING&type=OTHERS&filter=NO">Others</a></li> 
									
									</ul> <!-- .cd-secondary-dropdown --> 
								</li> <!-- .has-children -->
								<li class="has-children">
									<a href="product.php?sports=CYCLING&type=ALL&filter=NO">Tennis</a> 
									<ul class="cd-secondary-dropdown is-hidden">
										<li class="go-back"><a href="#">Menu</a></li>

												<li><a href="product.php?sports=TENNIS&type=ALL&filter=NO">ALL</a> </li>
												<li><a href="product.php?sports=TENNIS&type=TENNIS RACQUET&filter=NO">Racquet</a></li>
												<li><a href="product.php?sports=TENNIS&type=TENNIS STRING&filter=NO">String</a></li>
												<li><a href="product.php?sports=TENNIS&type=TENNIS BALL&filter=NO">Ball</a></li>
												<li><a href="product.php?sports=TENNIS&type=OTHERS&filter=NO">Others</a></li> 
											
									</ul> <!-- .cd-secondary-dropdown --> 
								</li> <!-- .has-children -->
								<li><a href="sitemap.php">Full Site Directory </a></li>  
							</ul> <!-- .cd-dropdown-content -->
						</nav> <!-- .cd-dropdown -->
					</div> <!-- .cd-dropdown-wrapper -->	 
				</div>
				
			</div>
		</div>
	</div>