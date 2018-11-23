<?php

include 'header.php';
$product_id=$_POST["product_id"];
?>
<head>
<!--flex slider-->
<script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script>
	// Can also be used with $(document).ready()
	$(window).load(function() {
	  $('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	  });
	});
</script>
<!--flex slider-->
<script src="js/imagezoom.js"></script>
</head>
	<!-- //header --> 
	<!-- breadcrumbs --> 
	<div class="container"> 

		<div class="clearfix"> </div>
	</div>
	<!-- //breadcrumbs -->
	<!-- products -->
	<?php
		$select="SELECT * FROM product_details WHERE product_id='$product_id'";
		if($result=mysqli_query($connect,$select))
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$pic1=$row["pic1"];
				$pic2=$row["pic2"];
				$pic3=$row["pic3"];
				$pic4=$row["pic4"];
				$pic5=$row["pic5"];
				$pic6=$row["pic6"];
				$pic7=$row["pic7"];
				$pic8=$row["pic8"];
				$name=$row["name"];
				$rate=$row["rate"];
				$original_price=$row["original_price"];
				$show_price=$row["show_price"];
				$discount=$row["discount"];
				$product_desc=$row["product_desc"];
				$add_info=$row["add_info"];
				$review=$row["review"];
				$help=$row["help"];
				$stock=$row["stock"];
				$f1=$row["f1"];
				$f2=$row["f2"];
				$f3=$row["f3"];
				$f4=$row["f4"];
				$f5=$row["f5"];
				$return_type=$row["return_type"];
				$return_day=$row["return_day"];
			}
		}
				
				
	?>
	<div class="products">	 
		<div class="container">  
			<div class="single-page">
				<div class="single-page-row" id="detail-21">
					<div class="col-md-6 single-top-left">	
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="../admin/images/<?php echo $pic1 ?>">
									<div class="thumb-image detail_images"> <img src="../images/<?php echo $pic1 ?>" height="450px" data-imagezoom="true" class="img-responsive" alt=""> </div>
								</li>
								<?php
								if($pic2!="")
								{
									?>
								<li data-thumb="../admin/images/<?php echo $pic2 ?>">
									 <div class="thumb-image"> <img src="../images/<?php echo $pic2 ?>" data-imagezoom="true" height="450px" class="img-responsive" alt=""> </div>
								</li>
								<?php
								}
								?>
								<?php
								if($pic3!="")
								{
									?>
								<li data-thumb="../admin/images/<?php echo $pic3 ?>">
								   <div class="thumb-image"> <img src="../images/<?php echo $pic3 ?>"  height="450px" data-imagezoom="true" class="img-responsive" alt="" > </div>
								</li>
								<?php
								}
								?>
								 <?php
								if($pic4!="")
								{
									?>
								<li data-thumb="../admin/images/<?php echo $pic4 ?>">
								   <div class="thumb-image"> <img src="../images/<?php echo $pic4 ?>"  height="450px" data-imagezoom="true" class="img-responsive" alt="" > </div>
								</li>
								<?php
								}
								?>
								<?php
								if($pic5!="")
								{
									?>
								<li data-thumb="../admin/images/<?php echo $pic5 ?>">
								   <div class="thumb-image"> <img src="../images/<?php echo $pic5 ?>"  height="450px" data-imagezoom="true" class="img-responsive" alt="" > </div>
								</li>
								<?php
								}
								?>
								<?php
								if($pic6!="")
								{
									?>
								<li data-thumb="../admin/images/<?php echo $pic6 ?>">
								   <div class="thumb-image"> <img src="../images/<?php echo $pic6 ?>"  height="450px" data-imagezoom="true" class="img-responsive" alt="" > </div>
								</li>
								<?php
								}
								?>
								<?php
								if($pic7!="")
								{
									?>
								<li data-thumb="../admin/images/<?php echo $pic7 ?>">
								   <div class="thumb-image"> <img src="../images/<?php echo $pic7 ?>"  height="450px" data-imagezoom="true" class="img-responsive" alt="" > </div>
								</li>
								<?php
								}
								?>
								<?php
								if($pic8!="")
								{
									?>
								<li data-thumb="../admin/images/<?php echo $pic8 ?>">
								   <div class="thumb-image"> <img src="../images/<?php echo $pic8 ?>"  height="450px" data-imagezoom="true" class="img-responsive" alt="" > </div>
								</li>
								<?php
								}
								?>
								
								 
								 
							</ul>
							
							
						</div>
					
					
						
					</div>
					
					<div class="col-md-6 single-top-right" >
						<h3 class="item_name" style="color:black"><?=$name?></h3>
						<p> </p>
						<div class="single-rating">
							<ul>
								<?php
								if($rate==0)
								{
									echo "<p>Rating Not Available</p>";
								}
									while($rate>0)
									{
									?>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<?php
									$rate--;
									}
									if($stock==0)
									{
										echo "<p><font color='red'>Out of Stock</font></p>";
									}
									else if($stock<=5)
									{
										echo "<p><font color='blue'>Hurry only ".$stock." left ! </font></p>";
									}
									else
									{
										echo "<p><font color='green'>In Stock</font></p>";
									}
								?>
								
							</ul> 
						</div>
						<div class="single-price">
							<ul>
								<li><font color="green">&#8377; <?=$show_price?></font></li>  
								<li><del><font color="red">&#8377; <?=$original_price?></font></del></li> 
								<li><span class="w3off"><font color="orange"><?=$discount?>% OFF</font></span></li> 
							</ul>	
						</div> 
						
						
						
						<form action="../verifyproduct_func.php" method="post" onsubmit="myfunction()">
							
							<input type="hidden" name="product_id" value="<?=$product_id?>" >
							<button type="submit" class="w3ls-cart" onclick="myfunction()" ><i  aria-hidden="true"></i>Verify</button>
						</form>
						
						<hr>
						
						
						
						
						
						<p><font size="5">Features:</font></p>
						<font color="red">
						<?php
						echo "<div class='col-md-12'>";
						echo "<div class='col-md-7'>";
						if($f1!="")
						{
							echo "<li>".$f1."</li>";
						}
						if($f2!="")
						{
							echo "<li>".$f2."</li>";
						}
						if($f3!="")
						{
							echo "<li>".$f3."</li>";
						}
						if($f4!="")
						{
							echo "<li>".$f4."</li>";
						}
						if($f5!="")
						{
							echo "<li>".$f5."</li>";
						}
						echo "</div>";
						echo "<div class='col-md-5'>";
						if($return_type=="YES")
						{
							echo $return_day." Days Replacement Policy<br>";
							echo "Returns Accepted";
						}
						else
						{
							echo $return_day." Days Replacement Policy";
						}
						echo "</div>";
						echo "</div>";
						?>
						</font>
						<hr>
						
						
					</div>
					<div class="clearfix"> </div>  
				</div>
			</div> 

			<!-- recommendations -->
			
			<!-- //recommendations --> 
			<!-- collapse-tabs -->
			<div class="collpse tabs">
				<h3 class="w3ls-title">About this item</h3> 
				<div class="panel-group collpse" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<i class="fa fa-file-text-o fa-icon" aria-hidden="true"></i> Description <span class="fa fa-angle-down fa-arrow" aria-hidden="true"></span> <i class="fa fa-angle-up fa-arrow" aria-hidden="true"></i>
								</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<?=$product_desc?>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingTwo">
							<h4 class="panel-title">
								<a class="collapsed pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									<i class="fa fa-info-circle fa-icon" aria-hidden="true"></i> additional information <span class="fa fa-angle-down fa-arrow" aria-hidden="true"></span> <i class="fa fa-angle-up fa-arrow" aria-hidden="true"></i>
								</a> 
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body">
								<?=$add_info?>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingThree">
							<h4 class="panel-title">
								<a class="collapsed pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									<i class="fa fa-check-square-o fa-icon" aria-hidden="true"></i> reviews  <span class="fa fa-angle-down fa-arrow" aria-hidden="true"></span> <i class="fa fa-angle-up fa-arrow" aria-hidden="true"></i>
								</a>
							</h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
								<?=$review?>
						</div>
					</div>
				</div>
			</div>
			<!-- //collapse --> 
			<div class="recommend">
				<h3 class="w3ls-title">Our Recommendations </h3> 
				<script>
					$(document).ready(function() { 
						$("#owl-demo5").owlCarousel({
					 
						  autoPlay: 3000, //Set AutoPlay to 3 seconds
					 
						  items :4,
						  itemsDesktop : [640,5],
						  itemsDesktopSmall : [414,4],
						  navigation : true
					 
						});
						
					}); 
				</script>
				
					
				</div>    
			
			<!-- offers-cards --> 
			
			<!-- //offers-cards -->
		</div>
	</div>
	</div>

	<!--//products-->  
	<!-- footer-top -->
<?php
include 'footer.php';
?>