<?php

include 'header.php';
$url = $_SERVER["REQUEST_URI"];
$_SESSION["url"]=$url;
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| ||a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
		echo "<script> location.href='../mobile/".substr($url,5,strlen($url))."'; </script>";
$product_id=$_GET['product_id'];
if(isset($_POST['subscribe']))
{
	$email=$_POST['email'];
	$insert="INSERT INTO subscribers (email) values('$email')";

		if(mysqli_query($connect,$insert))
		{
			
		}
}
$setpin=0;
if(isset($_POST["setemail"]))
{
	$email=$_POST["email"];
	$insert="INSERT INTO notify (user_id,email) values ('$user_id','$email') ";
	mysqli_query($connect,$insert);
	echo "	<script> $('#notify').modal('show'); </script> ";
}
if(isset($_POST["pin"]))
{
	$setpin=1;
	$pincode=$_POST["pincode"];
	if(isset($_POST["oneday"]))
	{
		$oneday=1;
	}
	else
	{
		$oneday=0;
	}
	include 'delivery.php';
	$price=$_POST["price"];
	include 'id.php';
	if($pincode<100000 || $pincode>999999)
	{
		$signal="<font color='red' > <br><br><br> INVALID PINCODE ( ".$pincode." )</font>";
		$error=1;
	}
	else if($pincode<700000 || $pincode>700100)
	{
		$signal="<font color='red' > <br><br><br> NOT AVAIABLE AT YOUR PINCODE ( ".$pincode." )</font>";
		$error=1;
	}
	else
	{
		$error=0;
		$signal="<font color='green' > <br><br><br> AVAILABLE AT YOUR PINCODE ( ".$pincode." )<br><br> DELIVERY CHARGE : &#8377;".$delivery." ( WILL BE DELIVERED BY ".$deliveryby." ) ";
	}
}
if(isset($_POST["buyproduct"]))
{
	$_SESSION["quantity"]=$_POST["quantity"];
	$_SESSION["size"]=$_POST["size"];
	$_SESSION["oneday"]=$_POST["oneday"];
}
?>
	<?php
	$error=1;
		$select="SELECT * FROM product_details WHERE product_id='$product_id' AND verify='1' ";
		if($result=mysqli_query($connect,$select))
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$error=0;
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
				$sports=$row["sports"];
				$type=$row["type"];
				$update="UPDATE product_details SET views = views + 1 WHERE product_id = '$product_id' ";
				mysqli_query($connect,$update);
				$insert="INSERT INTO product_view (user_id,product_id) values ('$user_id','$product_id') ";
				mysqli_query($connect,$insert);
				
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
<div class="agileits-modal modal fade" id="applypromo" tabindex="-1" role="dialog" aria-labelledby="myModal88" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><i class="fa" aria-hidden="true"></i> <font face="Comic Sans" >APPLY PROMO </font></h4>
					<div class="modal-body modal-body-sub"> 
					<form action="buy.php" method="post">
					<input type="text" class="form-control bfh-states" name="code"  placeholder="Promo code/Referral Code" >
					<input type="hidden" name="buy" value="1" >
					<input type="hidden" name="set" value="1" >
					<input type="checkbox" name="wallet" value="<?=$balance?>">PAY FROM WALLET.(AVAILABLE BALANCE : &#8377; <?=$balance?>)<br>
					<button type="button" class="close2" onclick = this.form.submit(); data-dismiss="modal" aria-hidden="true" >APPLY</button>
					<button type="button" class="close2" onclick = this.form.submit(); data-dismiss="modal" aria-hidden="true" >SKIP</button>
					</form>
					</div>
				</div>
				
			</div>
		</div>
</div>
<div class="agileits-modal modal fade" id="addcart" tabindex="-1" role="dialog" aria-labelledby="myModal88" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><i class="fa" aria-hidden="true"></i> <font face="Comic Sans" >SELECT QUANTITY AND SIZE FOR THE PRODUCT </font></h4>
					<div class="modal-body modal-body-sub"> 
					<form action="product_details.php?product_id=<?=$product_id?>" method="post">
					<input type="hidden" name="cart" value="<?=$product_id?>" >
					<select class="form-control bfh-states" name="quantity" >
					<option>SELECT QUANTITY</option>
					<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
					<br>
					<?php
							if($row["sizeset"]==1)
							{
								?>
					<select class="form-control bfh-states" name="size" >
					<option>SELECT SIZE</option>
					<?php
						if($row["size1"]!="")
							echo "<option value='".$row["size1"]."'>".$row["size1"]."</option>";
						if($row["size2"]!="")
							echo "<option value='".$row["size2"]."'>".$row["size2"]."</option>";
						if($row["size3"]!="")
							echo "<option value='".$row["size3"]."'>".$row["size3"]."</option>";
						if($row["size4"]!="")
							echo "<option value='".$row["size4"]."'>".$row["size4"]."</option>";
						if($row["size5"]!="")
							echo "<option value='".$row["size5"]."'>".$row["size5"]."</option>";
						if($row["size6"]!="")
							echo "<option value='".$row["size6"]."'>".$row["size6"]."</option>";
						if($row["size7"]!="")
							echo "<option value='".$row["size7"]."'>".$row["size7"]."</option>";
						if($row["size8"]!="")
							echo "<option value='".$row["size8"]."'>".$row["size8"]."</option>";
						if($row["size9"]!="")
							echo "<option value='".$row["size9"]."'>".$row["size9"]."</option>";
						if($row["size10"]!="")
							echo "<option value='".$row["size10"]."'>".$row["size10"]."</option>";
							}
							else
							{
								echo "<input type='hidden' name='size' value='' >";
							}
							?>
					</select>
					<br>
					<button type="button" class="close2" onclick = this.form.submit(); data-dismiss="modal" aria-hidden="true" ><i class="fa fa-cart-plus" aria-hidden="true"></i> ADD TO CART </button>
					</form>
					</div>
				</div>
				
			</div>
		</div>
</div>
<?php
if(isset($_POST['addcart']))
{
	if($user_id == "guest" )
		echo "	<script> $('#login').modal('show'); </script> ";
	else
			echo "	<script> $('#addcart').modal('show'); </script> ";
}
?>
<?php
if(isset($_POST['buyproduct']))
{
	
			echo "	<script> $('#applypromo').modal('show'); </script> ";
}
?>

	<div class="products">	 
		<div class="container">  
			<div class="single-page">
				<div class="single-page-row" id="detail-21">
					<div class="col-md-6 single-top-left"  >	
						<div class="flexslider" >
							<ul class="slides">
								<li data-thumb="../admin/images/<?php echo $pic1 ?>">
									<div class="thumb-image detail_images"> <img src="../admin/images/<?php echo $pic1 ?>" height="450px" data-imagezoom="true" class="img-responsive" alt=""> </div>
								</li>
								<?php
								if($pic2!="")
								{
									?>
								<li data-thumb="../admin/images/<?php echo $pic2 ?>">
									 <div class="thumb-image"> <img src="../admin/images/<?php echo $pic2 ?>" data-imagezoom="true" height="450px" class="img-responsive" alt=""> </div>
								</li>
								<?php
								}
								?>
								<?php
								if($pic3!="")
								{
									?>
								<li data-thumb="../admin/images/<?php echo $pic3 ?>">
								   <div class="thumb-image"> <img src="../admin/images/<?php echo $pic3 ?>"  height="450px" data-imagezoom="true" class="img-responsive" alt="" > </div>
								</li>
								<?php
								}
								?>
								 <?php
								if($pic4!="")
								{
									?>
								<li data-thumb="../admin/images/<?php echo $pic4 ?>">
								   <div class="thumb-image"> <img src="../admin/images/<?php echo $pic4 ?>"  height="450px" data-imagezoom="true" class="img-responsive" alt="" > </div>
								</li>
								<?php
								}
								?>
								<?php
								if($pic5!="")
								{
									?>
								<li data-thumb="../admin/images/<?php echo $pic5 ?>">
								   <div class="thumb-image"> <img src="../admin/images/<?php echo $pic5 ?>"  height="450px" data-imagezoom="true" class="img-responsive" alt="" > </div>
								</li>
								<?php
								}
								?>
								<?php
								if($pic6!="")
								{
									?>
								<li data-thumb="../admin/images/<?php echo $pic6 ?>">
								   <div class="thumb-image"> <img src="../admin/images/<?php echo $pic6 ?>"  height="450px" data-imagezoom="true" class="img-responsive" alt="" > </div>
								</li>
								<?php
								}
								?>
								<?php
								if($pic7!="")
								{
									?>
								<li data-thumb="../admin/images/<?php echo $pic7 ?>">
								   <div class="thumb-image"> <img src="../admin/images/<?php echo $pic7 ?>"  height="450px" data-imagezoom="true" class="img-responsive" alt="" > </div>
								</li>
								<?php
								}
								?>
								<?php
								if($pic8!="")
								{
									?>
								<li data-thumb="../admin/images/<?php echo $pic8 ?>">
								   <div class="thumb-image"> <img src="../admin/images/<?php echo $pic8 ?>"  height="450px" data-imagezoom="true" class="img-responsive" alt="" > </div>
								</li>
								<?php
								}
								?>
								
								 
								 
							</ul>
							
							
						</div>
						<p></p>
						<hr>
					<form action="product_details.php?product_id=<?=$product_id?>" method="post">
							<input type="hidden" name="addcart" value="<?=$product_id?>" >
							<button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i>Add to Cart</button>
						</form>
						<form action="product_details.php?product_id=<?=$product_id?>" method="post">
							<input type="hidden" name="wishlist" value="1" >
							<button type="submit" class="w3ls-cart" ><i class="fa fa-heart" aria-hidden="true"></i>Add to Wishlist</button>
						</form>
					
						
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
								$nrate=5-$rate;
									while($rate>1)
									{
									?>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<?php
									$rate=$rate-1;
									}
									if($rate != 0 )
									{
										$nrate=$nrate-1;
										?>
									<li><i class="fa fa-star-half-full" aria-hidden="true"></i></li>
									<?php
									}
									
									while($nrate>0)
									{
									?>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<?php
									$nrate--;
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
						
						<?php
						if($stock > 0 )
						{?>
						
						<form action="product_details.php?product_id=<?=$product_id?>" method="post" onsubmit="myfunction()">
						<input type="checkbox" name="oneday" >Opt for one day delivery<br>
							<input id="numb" type="text" name="pincode" value="<?=$pincode?>" placeholder="Enter Your Pincode " style="width=100%;height:40px" required>
							<input type="hidden" name="pin" value="1" >
							<input type="hidden" name="price" value="<?=$show_price?>" >
							
							<button type="submit" class="w3ls-cart" onclick="myfunction()" ><i  aria-hidden="true"></i>Check Availability</button>
						</form>
						<?php
						}
						else 
						{
						?>
						<form action="product_details.php?product_id=<?=$product_id?>" method="post" onsubmit="myfunction()">
							<input id="numb" type="email" name="email" value="" placeholder="Enter Your Email " style="width=100%;height:40px" required>
							<input type="hidden" name="setemail" value="1" >
							
							
							<button type="submit" class="w3ls-cart" onclick="myfunction()" ><i  aria-hidden="true"></i>Notify Me</button>
						</form>
						<?php
						}
						?>
						<?php
						if($setpin==1)
						{
							echo $signal;
							if($error==0)
							{
								if($stock>0)
								{
								$_SESSION["price"]=$price;
								$_SESSION["delivery"]=$delivery;
								$_SESSION["product_id"]=$product_id;
								$_SESSION["pincode"]=$pincode;
								}
						?>
						<hr>
						<?php
						if($user_id!='guest')
						{
							if($stock>0)
							{
							?>
						<form action="product_details.php?product_id=<?=$product_id?>" method="post">
						<input type="hidden" name="buy" value="1" >
						<input type="hidden" name="set" value="1">
						<input type="hidden" name="oneday" value="<?=$oneday?>">
						<div class="col-md-12">
						<div class="col-md-6">
						<font color="black"> QUANTITY : </font><select name="quantity" style="width:50px">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						</select>
						</div>
						<div class="col-md-6">
						<?php
							if($row["sizeset"]==1)
							{
								?>
						<font color="black"> SIZE : </font><select name="size" style="width:50px">
						<?php
						if($row["size1"]!="")
							echo "<option value='".$row["size1"]."'>".$row["size1"]."</option>";
						if($row["size2"]!="")
							echo "<option value='".$row["size2"]."'>".$row["size2"]."</option>";
						if($row["size3"]!="")
							echo "<option value='".$row["size3"]."'>".$row["size3"]."</option>";
						if($row["size4"]!="")
							echo "<option value='".$row["size4"]."'>".$row["size4"]."</option>";
						if($row["size5"]!="")
							echo "<option value='".$row["size5"]."'>".$row["size5"]."</option>";
						if($row["size6"]!="")
							echo "<option value='".$row["size6"]."'>".$row["size6"]."</option>";
						if($row["size7"]!="")
							echo "<option value='".$row["size7"]."'>".$row["size7"]."</option>";
						if($row["size8"]!="")
							echo "<option value='".$row["size8"]."'>".$row["size8"]."</option>";
						if($row["size9"]!="")
							echo "<option value='".$row["size9"]."'>".$row["size9"]."</option>";
						if($row["size10"]!="")
							echo "<option value='".$row["size10"]."'>".$row["size10"]."</option>";
							}
							else
							{
								echo "<input type='hidden' name='size' value='' >";
							}
							?>
						
						
						</select>
						
						</div>
						</div>
						<div class="col-md-12">
						<p></p>
						</div>
						
							<button type="submit" name="buyproduct" class="w3ls-cart" ><i  aria-hidden="true"></i>BUY NOW</button>
						</form>
						<?php
							}
							else
							{
								echo "<p><font color='red'>THE PRODUCT IS CURRENTLY OUT OF STOCK</font></p>";
							}
						}
						else
						{
							echo "<p><a href='login.php' > LOGIN </a> / <a href='signup.php'> SIGNUP </a> TO PROCEED.";
						}
							}
						}
						?>
						<?php
							}
						}
						if($error==1)
						{
							echo "<script> location.href='mainpage.php'; </script>";
						}
						?>
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
									<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					
					<div class="clearfix"> </div>
					<h3 class="w3ls-title">Our Recommendations</h3>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							<div class="tabcontent-grids">  
							<script>
									$(document).ready(function() { 
										$("#owl-demo4").owlCarousel({
									 
										  autoPlay: 3000, //Set AutoPlay to 3 seconds
									 
										  items :4,
										  itemsDesktop : [640,5],
										  itemsDesktopSmall : [414,4],
										  navigation : true
									 
										});
										
									}); 
								</script>
								<div id="owl-demo4" class="owl-carousel"> 
								<?php
									$counter=0;
									$a=0;
									$b=0;
									$query = "SELECT * FROM product_details  WHERE verify='1' AND sports='$sports' AND type='$type' ORDER BY views DESC ";
										if(mysqli_query($connect, $query))
										{
											if ($result = mysqli_query($connect, $query)) 
											{
												while ($row = mysqli_fetch_assoc($result)) 
												{
													if($counter>9)
													{
														break;
													}
													$name1=$row["name"];
													$name=substr($name1,0,37)."...";
													$id=$row["product_id"];
													$show_price=$row["show_price"];
													$pic=$row["pic1"];
													$discount=$row["discount"];
													$original_price=$row["original_price"];
													$stock=$row["stock"];
													if($stock==0)
														continue;
													
													if($id==$product_id)
														continue;
													$counter++;
													$a=1;
													?>
													<div class="item">
														<div class="agile-products">
															<div class="new-tag"><h6><?=$discount?>%<br>Off</h6></div>
																<a href="product_details.php?product_id=<?php echo $id ?>" target="_blank"><img src="../admin/images/<?=$pic?>" class="img-responsive" alt="img" style="height:150px"></a>
																<div class="agile-product-text">              
																	<h5><a href="product_details.php?product_id=<?php echo $id; ?>" target="_blank" ><?=$name?></a></h5> 
																	<h6><del>&#8377; <?php echo $original_price; ?></del>&#8377; <?php echo $show_price; ?></h6> 
																	   
																</div>
															</div> 
														</div>
													<?php
												}
											}
										}
										if($a == 0 )
										{
											
											$counter=0;
											$query1 = "SELECT * FROM product_details  WHERE verify='1' AND sports='$sports' ORDER BY views DESC ";
										if(mysqli_query($connect, $query1))
										{
											if ($result1 = mysqli_query($connect, $query1)) 
											{
												while ($row1 = mysqli_fetch_assoc($result1)) 
												{
													if($counter>9)
													{
														break;
													}
													$name1=$row1["name"];
													$name=substr($name1,0,37)."...";
													$id=$row1["product_id"];
													$show_price=$row1["show_price"];
													$pic=$row1["pic1"];
													$discount=$row1["discount"];
													$original_price=$row1["original_price"];
													$stock=$row1["stock"];
													if($stock==0)
														continue;
													
													if($id==$product_id)
														continue;
													$counter++;
													$b=1;
													?>
													<div class="item">
														<div class="agile-products">
															<div class="new-tag"><h6><?=$discount?>%<br>Off</h6></div>
																<a href="product_details.php?product_id=<?php echo $id ?>" target="_blank"><img src="../admin/images/<?=$pic?>" class="img-responsive" alt="img" style="height:150px"></a>
																<div class="agile-product-text">              
																	<h5><a href="product_details.php?product_id=<?php echo $id; ?>" target="_blank" ><?=$name?></a></h5> 
																	<h6><del>&#8377; <?php echo $original_price; ?></del>&#8377; <?php echo $show_price; ?></h6> 
																	   
																</div>
															</div> 
														</div>
										<?php
												}
											}
										}
										}
										if($b == 0) 
										{
											$counter=0;
											$query2 = "SELECT * FROM product_details  WHERE verify='1' ORDER BY views DESC ";
										if(mysqli_query($connect, $query2))
										{
											if ($result2 = mysqli_query($connect, $query2)) 
											{
												while ($row2 = mysqli_fetch_assoc($result2)) 
												{
													if($counter>9)
													{
														break;
													}
													$name1=$row2["name"];
													$name=substr($name1,0,37)."...";
													$id=$row2["product_id"];
													$show_price=$row2["show_price"];
													$pic=$row2["pic1"];
													$discount=$row2["discount"];
													$original_price=$row2["original_price"];
													$stock=$row2["stock"];
													if($stock==0)
														continue;
													
													if($id==$product_id)
														continue;
													$counter++;
													$b=1;
													?>
													<div class="item">
														<div class="agile-products">
															<div class="new-tag"><h6><?=$discount?>%<br>Off</h6></div>
																<a href="product_details.php?product_id=<?php echo $id ?>" target="_blank"><img src="../admin/images/<?=$pic?>" class="img-responsive" alt="img" style="height:150px"></a>
																<div class="agile-product-text">              
																	<h5><a href="product_details.php?product_id=<?php echo $id; ?>" target="_blank" ><?=$name?></a></h5> 
																	<h6><del>&#8377; <?php echo $original_price; ?></del>&#8377; <?php echo $show_price; ?></h6> 
																	   
																</div>
															</div> 
														</div>
										<?php 
												}
											}
										}
										
										}
										?>
									</div>
								</div> 
							</div>
						</div>
					</div>    
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