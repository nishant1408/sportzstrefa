<?php
session_start();
include 'connect.php' ;
$url = $_SERVER["REQUEST_URI"];
if(!isset($_SESSION['user_id']))
{
	$user_id="guest"; 
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
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> My Account<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="myorder.php">My Orders</a></li>  
							<li><a href="wallet.php">Wallet</a></li> 
						</ul> 
					</li> 
					<?php
				}
				?>
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
					<h1><a href="index.php"><span>S</span>portz<span>S</span>trefa</a></h1>
					<h6>Your stores. Your place.</h6> 
				</div>	
				<div class="header-search">
					<form action="search.php" method="post">
						<input type="search" name="name" placeholder="Search for a Product..." required="">
						<input type="hidden" name="type" value="search" required="">
						<button type="submit" class="btn btn-default" aria-label="Left Align">
							<i class="fa fa-search" aria-hidden="true"> </i>
						</button>
					</form>
				</div>
				<div class="header-cart"> 
					<div class="my-account">
						<a href="contact.php"><i class="fa fa-map-marker" aria-hidden="true"></i> CONTACT US</a>						
					</div>
					<div class="cart"> 
						<form action="cart.php" method="post" class="last"> 
							<button class="w3view-cart" type="submit" name="submit" value="" onclick="window.href='cart.php'"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
						</form>  
					</div>
					<div class="clearfix"> </div> 
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
								<li><a href="offers.php">Today's Offers</a></li>
								<li class="has-children">
									<a href="#">Electronics</a> 
									<ul class="cd-secondary-dropdown is-hidden">
										<li class="go-back"><a href="#">Menu</a></li>
										<li class="see-all"><a href="products.php">All Electronics</a></li>
										<li class="has-children">
											<a href="#">MOBILE PHONES</a>  
											<ul class="is-hidden"> 
												<li class="go-back"><a href="#">All Electronics</a></li> 
												<li class="has-children">
													<a href="#0">SmartPhones</a> 
													<ul class="is-hidden"> 
														<li class="go-back"><a href="#"> </a></li>
														<li><a href="products.php">Android</a></li>
														<li><a href="products.php">Windows</a></li>
														<li><a href="products.php">Black berry</a></li>
													</ul>
												</li>
												<li> <a href="products.php">IPhones</a> </li>
												<li><a href="products.php">Tablets</a></li>
												<li><a href="products.php">IPad</a></li>
												<li><a href="products.php">Feature Phones</a></li> 
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">LARGE APPLIANCES</a> 
											<ul class="is-hidden"> 
												<li class="go-back"><a href="#">All Electronics </a></li>
												<li><a href="products.php">Refrigerators</a></li> 
												<li><a href="products.php">Washing Machine</a></li>
												<li><a href="products.php">Office Technology</a></li>
												<li><a href="products.php">Air conditioner</a></li>
												<li><a href="products.php">Home Automation</a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">ENTERTAINMENT</a> 
											<ul class="is-hidden"> 
												<li class="go-back"><a href="#">All Electronics</a></li>
												<li><a href="products.php">Tv & Accessories</a></li>
												<li><a href="products.php">Digital Camera</a></li>
												<li><a href="products.php">Gaming</a></li>
												<li><a href="products.php">Home Audio & Theater</a></li>
												<li class="has-children">
													<a href="#">Computer</a>
													<ul class="is-hidden">
														<li class="go-back"><a href="#"> </a></li> 
														<li><a href="products.php">Laptop </a></li>
														<li><a href="products.php">Gaming PC</a></li>
														<li><a href="products.php">Monitors</a></li>
														<li><a href="products.php">Networking</a></li>
														<li><a href="products.php">Printers & Supplies</a></li>
														<li><a href="products.php">Accessories</a></li>
													</ul>
												</li> 
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">HOME APPLIANCES</a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#0">All Electronics </a></li>
												<li class="has-children"><a href="#">Kitchen appliances</a>
													<ul class="is-hidden">
														<li class="go-back"><a href="#0"> </a></li>
														<li><a href="products.php">Rice Cookers</a></li>
														<li><a href="products.php">Mixer Juicer</a></li>
														<li><a href="products.php">Grinder</a></li>
														<li><a href="products.php">Blenders & Choppers</a></li>
														<li><a href="products.php">Microwave Oven</a></li>
														<li><a href="products.php">Food Processors</a></li>
													</ul>
												</li>
												<li><a href="products.php">Purifiers</a></li>
												<li><a href="products.php">Geysers</a></li>
												<li><a href="products.php">Gas Stove</a></li>
												<li><a href="products.php">Vacuum Cleaner</a></li>
												<li><a href="products.php">Sewing Machine</a></li> 
												<li><a href="products.php">Heaters & Fans</a></li>
											</ul>
										</li>
										<li class="has-children">
											<a href="#">SMALL DEVICES</a> 
											<ul class="is-hidden"> 
												<li class="go-back"><a href="#0">All Electronics </a></li>
												<li><a href="products.php">Wifi Dongle</a></li>
												<li><a href="products.php">Router & Modem</a></li>
												<li class="has-children"><a href="#">Storage Devices</a>
													<ul class="is-hidden">
														<li class="go-back"><a href="#0"> </a></li>
														<li><a href="products.php">Cloud Storage</a></li>
														<li><a href="products.php">Hard Disk</a></li>
														<li><a href="products.php">SSD</a></li>
														<li><a href="products.php">Pen Drive</a></li>
														<li><a href="products.php">Memory card</a></li> 
														<li><a href="products.php">Security Devices</a></li> 
													</ul>
												</li> 
												<li><a href="products.php">Office Supplies</a></li>
												<li><a href="products.php">Cut the Cable</a></li>
												<li><a href="products.php">Auto Electronics</a></li>  
											</ul>
										</li>
										<li class="has-children">
											<a href="#">PERSONAL CARE</a> 
											<ul class="is-hidden"> 
												<li class="go-back"><a href="#0">All Electronics </a></li>
												<li><a href="products.php">Epilator</a></li> 
												<li><a href="products.php">Hair Styler</a></li>
												<li><a href="products.php">Trimmer & Shaver</a></li>
												<li><a href="products.php">Health Care</a></li> 
												<li><a href="products.php">cables</a></li>
											</ul>
										</li>
									</ul> <!-- .cd-secondary-dropdown --> 
								</li> <!-- .has-children -->
								<li class="has-children">
									<a href="#">Fashion Store</a> 
									<ul class="cd-secondary-dropdown is-hidden">
										<li class="go-back"><a href="#">Menu</a></li>
										<li class="see-all"><a href="products1.php">All Fashion Stores</a></li>
										<li class="has-children">
											<a href="#">GIRLS' CLOTHING</a> 
											<ul class="is-hidden">  
												<li class="go-back"><a href="#">All Fashion Stores</a></li>
												<li><a href="products1.php">Ethnic wear </a></li>
												<li><a href="products1.php">Maternity wear</a></li>
												<li><a href="products1.php">inner & nightwear </a></li>
												<li><a href="products1.php">casual wear </a></li>
												<li><a href="products1.php">formal wear</a></li>
												<li><a href="products1.php">Sports wear</a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">BOYS' CLOTHING</a> 
											<ul class="is-hidden">  
												<li class="go-back"><a href="#">All Fashion Stores</a></li>
												<li><a href="products1.php">Jeans</a></li>  
												<li><a href="products1.php">Casual wear</a></li> 
												<li><a href="products1.php">Shorts</a></li> 
												<li><a href="products1.php">T-Shirts & Polos</a></li> 
												<li><a href="products1.php">Trousers & Chinos</a></li> 
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">JACKETS</a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#">All Fashion Stores</a></li>
												<li><a href="products1.php">Blazers</a></li>
												<li><a href="products1.php">Bomber jackets</a></li>
												<li><a href="products1.php">Denim Jackets</a></li>
												<li><a href="products1.php">Duffle Coats</a></li>
												<li><a href="products1.php">Leather Jackets</a></li>
												<li><a href="products1.php">Parkas</a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">ACCESSORIES </a> 
											<ul class="is-hidden"> 
												<li class="go-back"><a href="#">All Fashion Stores</a></li>
												<li><a href="products1.php">Watches </a></li>
												<li><a href="products1.php">Eyewear </a></li>
												<li><a href="products1.php">Jewellery </a></li>
												<li class="has-children">
													<a href="#">Footwear </a>  
													<ul class="is-hidden">
														<li class="go-back"><a href="#"> </a></li>
														<li><a href="products1.php">Ethnic</a></li>  
														<li><a href="products1.php">Casual wear</a></li>
														<li><a href="products1.php">Sports Shoes</a></li>
														<li><a href="products1.php">Boots</a></li>
													</ul> 
												</li> 
												<li><a href="products1.php">Stoles & Scarves</a></li>
												<li><a href="products1.php">Handbags</a></li>
											</ul>
										</li>
										<li class="has-children">
											<a href="#">BEAUTY</a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#">All Fashion Stores</a></li>
												<li><a href="products1.php">Perfumes & Deos</a></li>
												<li><a href="products1.php">Lipsticks & Nail Polish</a></li>
												<li><a href="products1.php">Beauty Gift Hampers</a></li> 
												<li><a href="products1.php">Personal Grooming</a></li>
												<li><a href="products1.php">Travel bags</a></li>
											</ul>
										</li>
										<li class="has-children">
											<a href="products1.php">PERSONAL CARE</a> 
											<ul class="is-hidden"> 
												<li class="go-back"><a href="#">All Fashion Stores</a></li>
												<li><a href="products1.php">Face Care</a></li>
												<li><a href="products1.php">Nail Care</a></li>
												<li><a href="products1.php">Hair Care</a></li>
												<li><a href="products1.php">Body Care</a></li>
												<li><a href="products1.php">Bath & Spa</a></li>   
											</ul>
										</li>
									</ul> <!-- .cd-secondary-dropdown --> 
								</li> <!-- .has-children -->
								<li class="has-children">
									<a href="products2.php">Kids Fashion & Toys</a> 
									<ul class="cd-secondary-dropdown is-hidden"> 
										<li class="go-back"><a href="#">Menu</a></li>
										<li class="see-all"><a href="products2.php">All Kids Fashions</a></li>
										<li class="has-children">
											<a href="products2.php">KIDS CLOTHING</a> 
											<ul class="is-hidden"> 
												<li class="go-back"><a href="#">All Kids Fashions</a></li>
												<li><a href="products2.php">Ethnic wear </a></li> 
												<li><a href="products2.php">inner & Sleepwear </a></li>
												<li><a href="products2.php">Dresses & Frocks </a></li>
												<li><a href="products2.php">Winter wear</a></li>
												<li><a href="products2.php">Diaper & Accessories</a></li>
											</ul>
										</li> 
										<li class="has-children"><a href="#">KIDS FASHION</a>
											<ul class="is-hidden">  
												<li class="go-back"><a href="#">All Kids Fashions</a></li>
												<li><a href="products2.php">Footwear</a></li> 
												<li><a href="products2.php">Sunglasses </a></li>
												<li><a href="products2.php">School & Stationery</a></li>
												<li><a href="products2.php">Jewellery</a></li>
												<li><a href="products2.php">Hair bands & Clips</a></li>
											</ul>
										</li>
										<li class="has-children"><a href="#">Baby Care</a>
											<ul class="is-hidden"> 
												<li class="go-back"><a href="#">All Kids Fashions</a></li>
												<li><a href="products2.php">Lotions, Oil & Powder </a></li> 
												<li><a href="products2.php">Soaps, Shampoo </a></li>
												<li><a href="products2.php">Bath Towels</a></li> 
												<li class="has-children">
													<a href="#">Feeding</a> 
													<ul class="is-hidden">
														<li class="go-back"><a href="#"> </a></li> 
														<li><a href="products2.php">Baby Food </a></li>
														<li><a href="products2.php">Bottle Feeding </a></li>
														<li><a href="products2.php">Breast Feeding</a></li>  
													</ul>
												</li>  
												<li><a href="products2.php">Toddlers' Rooms</a></li> 	
											</ul><!-- .cd-secondary-dropdown --> 
										</li> <!-- .has-children -->								
										<li class="has-children"><a href="#">TOYS & GAMES </a>
											<ul class="is-hidden"> 
												<li class="go-back"><a href="#">All Kids Fashions</a></li>
												<li><a href="products2.php">Art & Crafts</a></li> 
												<li><a href="products2.php">Educational Toys </a></li>
												<li><a href="products2.php">Baby Toys</a></li> 
												<li><a href="products2.php">Outdoor Play </a></li> 
												<li><a href="products2.php">Musical Instruments</a></li>
											</ul>
										</li>
										<li> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#">All Kids Fashions</a></li>
												<li><a href="products2.php">Toy Tips & Trends</a></li> 
												<li><a href="products2.php">Preschool Toys</a></li>
												<li><a href="products2.php">Musical Instruments</a></li> 
												<li><a href="products2.php">Bikes & Ride-Ons</a></li>
												<li><a href="products2.php">Video Games</a></li>
												<li><a href="products2.php">PC & Digital Gaming</a></li>
											</ul>	
										</li> 
									</ul><!-- .cd-secondary-dropdown --> 
								</li> <!-- .has-children --> 
								<li class="has-children">
									<a href="#">Home, Furniture & Patio</a> 
									<ul class="cd-secondary-dropdown is-hidden">
										<li class="go-back"><a href="#">Menu</a></li>
										<li class="see-all"><a href="products3.php">All Products</a></li>
										<li class="has-children">
											<a href="#">Kitchen Uses</a> 
											<ul class="is-hidden">  
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products3.php">Dinner Sets </a></li> 
												<li><a href="products3.php">Cookware & Bakeware </a></li>
												<li><a href="products3.php">Containers & Jars </a></li>
												<li><a href="products3.php">Kitchen Tools </a></li>
												<li><a href="products3.php">Food Storage</a></li>
												<li><a href="products3.php">Casseroles</a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Furniture </a> 
											<ul class="is-hidden"> 
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products3.php">Bedroom </a></li> 
												<li><a href="products3.php">Dining Room </a></li>
												<li><a href="products3.php">Kids' Furniture </a></li>
												<li><a href="products3.php">Living Room</a></li>
												<li><a href="products3.php">Office</a></li>
												<li><a href="products3.php">Mattresses</a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Home Decor </a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products3.php">Lighting</a></li> 
												<li><a href="products3.php">Painting</a></li>
												<li><a href="products3.php">Curtains & Blinds</a></li>
												<li><a href="products3.php">Patio Furniture</a></li>
												<li><a href="products3.php">Wardrobes & Cabinets</a></li>
												<li><a href="products3.php">Mattresses</a></li>
											</ul>
										</li>  
										<li class="has-children">
											<a href="#">Gardening & Lawn </a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"> </a></li>  
												<li><a href="products3.php">Gardening </a></li> 
												<li><a href="products3.php">Landscaping </a></li>
												<li><a href="products3.php">Sheds</a></li>
												<li><a href="products3.php">Outdoor Storage  </a></li>
												<li><a href="products3.php">Garden & Ideas </a></li>
												<li><a href="products3.php">Patio Tips</a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Garage Storage</a> 
											<ul class="is-hidden"> 
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products3.php">Baskets & Bins </a></li> 
												<li><a href="products3.php">Garage Door Openers</a></li>
												<li><a href="products3.php">Free Standing Shelves </a></li>
												<li><a href="products3.php">Floor cleaning</a></li>
												<li><a href="products3.php">Tool Kits</a></li>
											</ul>
										</li>  
									</ul><!-- .cd-secondary-dropdown --> 
								</li> <!-- .has-children -->  
								<li class="has-children">
									<a href="#">Sports, Fitness & Outdoor</a>
									<ul class="cd-secondary-dropdown is-hidden">
										<li class="go-back"><a href="#">Menu</a></li>
										<li class="see-all"><a href="products4.php">All Products</a></li>
										<li class="has-children">
											<a href="#">Single Sports </a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products4.php">Bikes </a></li> 
												<li><a href="products4.php">Fishing  </a></li>
												<li><a href="products4.php">Cycling </a></li>
												<li><a href="products4.php">Musical Instruments</a></li>
												<li><a href="products4.php">Archery </a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Team Sports</a> 
											<ul class="is-hidden"> 
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products4.php">Cricket </a></li> 
												<li><a href="products4.php">Badminton </a></li>
												<li><a href="products4.php">Swimming Gear </a></li>
												<li><a href="products4.php">Sports Apparel </a></li>
												<li><a href="products4.php">Indoor games</a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Fitness </a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products4.php">Fitness Accessories </a></li> 
												<li><a href="products4.php">Exercise Machines </a></li>
												<li><a href="products4.php">Ellipticals </a></li>
												<li><a href="products4.php">Home Gyms</a></li> 
												<li><a href="products4.php">Exercise Bikes</a></li> 
											</ul>
										</li>
										<li class="has-children">
											<a href="#">Camping </a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products4.php"> Airbeds</a></li> 
												<li><a href="products4.php">Tents </a></li>
												<li><a href="products4.php">Gazebo's & Shelters</a></li>
												<li><a href="products4.php">Coolers </a></li>
												<li><a href="products4.php">Canopies</a></li>
												<li><a href="products4.php">Sleeping Bags</a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Camping Tools</a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products4.php">Shooting </a></li> 
												<li><a href="products4.php">Knives & Tools </a></li>
												<li><a href="products4.php">Optics & Binoculars </a></li>
												<li><a href="products4.php">Lights & Lanterns </a></li>
												<li><a href="products4.php">Hunting Clothing </a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Other</a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products4.php">Riding Gears & More </a></li> 
												<li><a href="products4.php">Body Massagers </a></li>
												<li><a href="products4.php">Health Monitors </a></li>
												<li><a href="products4.php">Health Drinks </a></li> 
											</ul>
										</li> 	
									</ul><!-- .cd-secondary-dropdown --> 
								</li> <!-- .has-children -->  
								<li class="has-children">
									<a href="#">Grocery store</a>
									<ul class="cd-secondary-dropdown is-hidden">
										<li class="go-back"><a href="#">Menu</a></li>
										<li class="see-all"><a href="products5.php">All Products</a></li>
										<li class="has-children">
											<a href="#">Veggies & Fruits </a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products5.php">Vegetables </a></li> 
												<li><a href="products5.php">Fruits </a></li>
												<li><a href="products5.php">Dry Fruits</a></li> 
												<li><a href="products5.php">Snacks & Cookies </a></li>
												<li><a href="products5.php">Breakfast & Cereal</a></li> 
											</ul> 
										</li> 
										<li class="has-children">
											<a href="#">Packet Food</a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products5.php">Beverages </a></li> 
												<li><a href="products5.php">Baking </a></li>
												<li><a href="products5.php">Emergency Food </a></li>
												<li><a href="products5.php">Candy & Gum </a></li>
												<li><a href="products5.php">Meals & Pasta </a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Shop All Pets </a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products5.php">Dogs </a></li>  
												<li><a href="products5.php">Fish </a></li>												
												<li><a href="products5.php">Cats</a></li>
												<li><a href="products5.php">Birds </a></li>
												<li><a href="products5.php">Pet Food </a></li>
											</ul>
										</li>
										<li class="has-children">
											<a href="#">Household Essentials </a> 
											<ul class="is-hidden"> 
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products5.php">Laundry Room </a></li> 
												<li><a href="products5.php">Paper & Plastic</a></li>
												<li><a href="products5.php">Pest Control </a></li>
												<li><a href="products5.php">Batteries </a></li> 
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Food Shops </a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products5.php">Fresh Food</a></li> 
												<li><a href="products5.php">Food Gifts </a></li>
												<li><a href="products5.php">Frozen Food </a></li>
												<li><a href="products5.php">Organic </a></li>
												<li><a href="products5.php">Gluten Free </a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Tips </a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products5.php">Pets Growth</a></li> 
												<li><a href="products5.php">Recipes </a></li>
												<li><a href="products5.php">Snacks</a></li>
												<li><a href="products5.php">Nutrition</a></li> 
											</ul>
										</li> 
									</ul><!-- .cd-secondary-dropdown --> 
								</li> <!-- .has-children -->  
								<li class="has-children">
									<a href="#">Photo, Gifts & Office Supplies</a>
									<ul class="cd-secondary-dropdown is-hidden">
										<li class="go-back"><a href="#">Menu</a></li>
										<li class="see-all"><a href="products6.php">All Products</a></li>
										<li class="has-children">
											<a href="#">Trending Now </a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products6.php">Best Priced</a></li> 
												<li><a href="products6.php">Chocolates </a></li>
												<li><a href="products6.php">Gift Cards </a></li>
												<li><a href="products6.php">Fashion & Accessories </a></li>
												<li><a href="products6.php">Decorative Plants </a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Photos </a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products6.php">Shelf animation </a></li> 
												<li><a href="products6.php">3D-rendered </a></li>
												<li><a href="products6.php">gift builder </a></li>
												<li><a href="products6.php">Frames</a></li>
												<li><a href="products6.php">Wall Decor</a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Gifts </a> 
											<ul class="is-hidden">	
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products6.php">Personalized Gifts </a></li> 
												<li><a href="products6.php">Flowers </a></li>
												<li><a href="products6.php">Cards & Toys</a></li>
												<li><a href="products6.php">Show pieces </a></li>
												<li><a href="products6.php">Photo Books</a></li>
											</ul>
										</li>
										<li class="has-children">
											<a href="#">Favourite Brands </a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products6.php">Archies </a></li> 
												<li><a href="products6.php">Jewel Fuel </a></li>
												<li><a href="products6.php">Ferns N Petals </a></li>
												<li><a href="products6.php">Happily Unmarried</a></li>
												<li><a href="products6.php">Chumbak</a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Office</a> 
											<ul class="is-hidden"> 
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products6.php">Calendars</a></li> 
												<li><a href="products6.php">Mousepads</a></li>
												<li><a href="products6.php">Phone Cases</a></li>
												<li><a href="products6.php">Tablet & Laptop Cases</a></li>
												<li><a href="products6.php">Mounted Photos</a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Combos </a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products6.php">Chocolates </a></li> 
												<li><a href="products6.php">Dry Fruits</a></li>
												<li><a href="products6.php">Sweets</a></li>
												<li><a href="products6.php">Snacks</a></li>
												<li><a href="products6.php">Cakes</a></li>
											</ul>
										</li> 
									</ul><!-- .cd-secondary-dropdown --> 
								</li> 
								<li class="has-children">
									<a href="#">Health, Beauty & Pharmacy</a>
									<ul class="cd-secondary-dropdown is-hidden">
										<li class="go-back"><a href="#">Menu</a></li>
										<li class="see-all"><a href="products7.php">All Products</a></li>
										<li class="has-children">
											<a href="#">Health</a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products7.php">Home Health Care </a></li> 
												<li><a href="products7.php">Sports Nutrition </a></li>
												<li><a href="products7.php">Vision </a></li>
												<li><a href="products7.php">Vitamins </a></li>
												<li><a href="products7.php">Diet & Nutrition </a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Health Tips</a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products7.php">Diet</a></li> 
												<li><a href="products7.php">Exercise Tips  </a></li>
												<li><a href="products7.php">Vitamin Balance</a></li>
												<li><a href="products7.php">Health Insurance</a></li>
												<li><a href="products7.php">Funeral</a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Beauty </a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products7.php">Massage & Spa </a></li> 
												<li><a href="products7.php">Face Wash</a></li>
												<li><a href="products7.php">Facial Cleanser</a></li>
												<li><a href="products7.php">Makeup </a></li>
												<li><a href="products7.php">Beauty Tips</a></li>
											</ul>
										</li>
										<li class="has-children">
											<a href="#">Pharmacy </a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products7.php">Home Delivery </a></li> 
												<li><a href="products7.php">History & Reports </a></li>
												<li><a href="products7.php">Transfer Prescriptions </a></li>
												<li><a href="products7.php">Health CheckUp</a></li>
												<li><a href="products7.php">Mobile App</a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Pharmacy Center </a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products7.php">Diabetes Shop </a></li> 
												<li><a href="products7.php">Medicine Cabinet </a></li>
												<li><a href="products7.php">Vitamin Selector</a></li>
												<li><a href="products7.php">Pharmacy Help</a></li> 
											</ul>
										</li>  
									</ul><!-- .cd-secondary-dropdown --> 
								</li>
								<li class="has-children">
									<a href="#">Automotive</a>
									<ul class="cd-secondary-dropdown is-hidden">
										<li class="go-back"><a href="#">Menu</a></li>
										<li class="see-all"><a href="products8.php">All Products</a></li>
										<li class="has-children">
											<a href="#">All Motors </a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products8.php">Bikes </a></li> 
												<li><a href="products8.php">Yachts </a></li>
												<li><a href="products8.php">Scooters </a></li>
												<li><a href="products8.php">Autos</a></li>
												<li><a href="products8.php">Bus</a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Accessories </a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products8.php">Vehicle Electronics</a></li> 
												<li><a href="products8.php">Stereos & Monitors</a></li>
												<li><a href="products8.php">Bluetooth Devices</a></li>
												<li><a href="products8.php">GPS Navigation</a></li>
												<li><a href="products8.php">Speakers & Tweeters</a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Safety & Security </a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products8.php">Anti-Theft Devices </a></li> 
												<li><a href="products8.php">Helmets</a></li>
												<li><a href="products8.php">Sensors</a></li>
												<li><a href="products8.php">Auto Repair Tools </a></li>
												<li><a href="products8.php">Antifreeze & Coolants </a></li>
											</ul>
										</li>
										<li class="has-children">
											<a href="#">Car Interiors</a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products8.php">Stereos </a></li> 
												<li><a href="products8.php">Floor Mats </a></li>
												<li><a href="products8.php">Seat Covers</a></li>
												<li><a href="products8.php">Chargers </a></li>
												<li><a href="products8.php">Audio Finder </a></li>
											</ul>
										</li>  
										<li class="has-children">
											<a href="#">Exterior Accessories </a> 
											<ul class="is-hidden"> 
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products8.php">Wheel covers </a></li> 
												<li><a href="products8.php">Car Lighting </a></li>
												<li><a href="products8.php">Polish & Waxes</a></li>
												<li><a href="products8.php">Cargo Management</a></li>
												<li><a href="products8.php">Car Decoration </a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Car Care</a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products8.php">Auto Tips & Advice </a></li> 
												<li><a href="products8.php">Car Washes & Cleaners </a></li>
												<li><a href="products8.php">Car Wax & Polish</a></li>
												<li><a href="products8.php">Cleaning Tools</a></li>
												<li><a href="products8.php">Detailing Kits </a></li>
											</ul>
										</li> 
									</ul><!-- .cd-secondary-dropdown --> 
								</li>
								<li class="has-children">
									<a href="#">Books, Music & Movies</a>
									<ul class="cd-secondary-dropdown is-hidden">
										<li class="go-back"><a href="#">Menu</a></li>
										<li class="see-all"><a href="products9.php">All Products</a></li>
										<li class="has-children">
											<a href="#">Books</a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li class="has-children"><a href="#">Exam books </a>
													<ul class="is-hidden">
														<li class="go-back"><a href="#"> </a></li>
														<li><a href="products9.php">CAT/MAT/XAT</a></li>
														<li><a href="products9.php">Civil Services</a></li>
														<li><a href="products9.php">AFCAT</a></li>
														<li><a href="products9.php">New Releases</a></li>
													</ul>												
												</li>
												<li><a href="products9.php">Academic Text </a></li>
												<li><a href="products9.php">Romance Books </a></li>
												<li><a href="products9.php">Journals </a></li>
												<li><a href="products9.php">Children's & Teen Books </a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Music</a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products9.php">New Releases </a></li> 
												<li><a href="products9.php">Country Music </a></li>
												<li><a href="products9.php">Musical Instruments </a></li>
												<li><a href="products9.php">Collections</a></li>
												<li><a href="products9.php">Boxed Sets </a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Music Combo</a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products9.php">Pop </a></li> 
												<li><a href="products9.php">Preorders </a></li>
												<li><a href="products9.php">Album Songs</a></li>
												<li><a href="products9.php">Top 50 CDs </a></li>
												<li><a href="products9.php">Music DVDs </a></li>
											</ul>
										</li>
										<li class="has-children">
											<a href="#">Movies</a> 
											<ul class="is-hidden"> 
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products9.php">New Releases </a></li> 
												<li><a href="products9.php">Children & Family </a></li>
												<li><a href="products9.php">Action</a></li>
												<li><a href="products9.php">Classic Movies </a></li>
												<li><a href="products9.php">Bollywood Movies </a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Movies Combo</a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products9.php">Hollywood Movies </a></li> 
												<li><a href="products9.php">Digital Movies </a></li>
												<li><a href="products9.php">Boxed Sets</a></li>
												<li><a href="products9.php">Animated</a></li>
												<li><a href="products9.php">Adventure</a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">TV Shows</a> 
											<ul class="is-hidden">
												<li class="go-back"><a href="#"></a></li>
												<li><a href="products9.php">Serials</a></li> 
												<li><a href="products9.php">Best Programs</a></li>
												<li><a href="products9.php">Celebrations</a></li>
												<li><a href="products9.php">Top Shows</a></li> 
											</ul>
										</li> 
									</ul><!-- .cd-secondary-dropdown --> 
								</li>  
								<li><a href="sitemap.php">Full Site Directory </a></li>  
							</ul> <!-- .cd-dropdown-content -->
						</nav> <!-- .cd-dropdown -->
					</div> <!-- .cd-dropdown-wrapper -->	 
				</div>
				<div class="move-text">
					<div class="marquee"><a href="offers.php"> New collections are available here...... <span>Get extra 10% off on everything | no extra taxes </span> <span> Try shipping pass free for 15 days with unlimited</span></a></div>
					<script type="text/javascript" src="js/jquery.marquee.min.js"></script>
					<script>
					  $('.marquee').marquee({ pauseOnHover: true });
					  //@ sourceURL=pen.js
					</script>
				</div>
			</div>
		</div>
	</div>