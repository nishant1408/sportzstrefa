<?php
include 'header.php';
$url = $_SERVER["REQUEST_URI"];
$_SESSION["url"]=$url;
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| ||a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
		echo "";
else
	echo "<script> location.href='../web/".substr($url,8,strlen($url))."'; </script>";
if(isset($_POST['subscribe']))
{
	$email=$_POST['email'];
	$insert="INSERT INTO subscribers (email) values('$email')";

		if(mysqli_query($connect,$insert))
		{
			
		}
}
if(isset($_GET["filter"]))
{
$filter=$_GET["filter"];
}
else
{
	$filter="NO";
}
if($filter=="NO")
{
		$query="SELECT * FROM product_details WHERE verify='1'  ";
}
else if($filter=="LOW")
{

		$query="SELECT * FROM product_details WHERE verify='1' ORDER BY show_price ASC ";
}
else if($filter=="HIGH")
{

		$query="SELECT * FROM product_details WHERE verify='1' ORDER BY show_price DESC ";

}
else if($filter=="RATE")
{

		$query="SELECT * FROM product_details WHERE verify='1' ORDER BY rate DESC ";

}
else if($filter=="VIEW")
{

		$query="SELECT * FROM product_details WHERE verify='1' ORDER BY views DESC ";

}
if(isset($_GET["name"]))
													{
														$search=$_GET["name"];
													}
													else
													{
														$search=$_POST["name"];
													}
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
<style>
.products {
    border: 1px;
    padding: 5px;
}
.clearfix1 {
    overflow: auto;
}
.img2 {
    float: left;
}
</style>
<!--flex slider-->
<script src="js/imagezoom.js"></script>
</head>
<div class="agileits-modal modal fade" id="addcart" tabindex="-1" role="dialog" aria-labelledby="myModal88" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><i class="fa" aria-hidden="true"></i> <font face="Comic Sans" >SELECT QUANTITY AND SIZE FOR THE PRODUCT </font></h4>
					<div class="modal-body modal-body-sub"> 
					<form action="search.php" method="post">
					<?php $product_id=$_POST["addcart"]; ?>
					<input type="hidden" name="name" value="<?=$search?>" >
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
					$select = "SELECT * FROM product_details WHERE verify='1' AND product_id='$product_id' ";
										if(mysqli_query($connect, $select))
										{
											if ($result = mysqli_query($connect, $select)) 
											{
												while ($row = mysqli_fetch_assoc($result)) 
												{
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
												}
											}
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
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
	<!-- //header --> 	
	<!-- products -->
	
				<!-- breadcrumbs --> 
				<ol class="breadcrumb breadcrumb1">
					<li><a href="mainpage.php">Home</a></li>
					<li class="active"><?php  echo $search; ?></li>
				</ol> 
				<div class="clearfix"> </div>
				<!-- //breadcrumbs -->
				<div class="product-top">
					<h4>Search</h4>
					
					<div class="clearfix"> </div>
				</div>
			
				<?php
				$array=array();
				$counter=0;
					if(mysqli_query($connect, $query))
						{
											if ($result = mysqli_query($connect, $query)) 
											{
												while ($row = mysqli_fetch_assoc($result)) 
												{
													$name1=$row["name"];
													$name=$name1;
													$rate=$row["rate"];
													$product_id=$row["product_id"];
													$show_price=$row["show_price"];
													$pic=$row["pic1"];
													$discount=$row["discount"];
													$original_price=$row["original_price"];
													$type=$row["type"];
													$brand=$row["brand"];
													$stock=$row["stock"];
													$sports=$row["sports"];
													$tag1=$row["tag1"];
													$tag2=$row["tag2"];
													$tag3=$row["tag3"];
													$tag4=$row["tag4"];
													$tag5=$row["tag5"];
													$tag6=$row["tag6"];
													$tag7=$row["tag7"];
													$tag8=$row["tag8"];
													$tag9=$row["tag9"];
													$tag10=$row["tag10"];
														if(strtolower($search)==strtolower($brand) || strtolower($search)==strtolower($name1) || strtolower($search)==strtolower($type) || strtolower($search)==strtolower($type) || strtolower($search)==strtolower($sports) || strtolower($search)==strtolower($sports) || strtolower($search)==strtolower($tag1) || strtolower($search)==strtolower($tag2) || strtolower($search)==strtolower($tag3) || strtolower($search)==strtolower($tag4) || strtolower($search)==strtolower($tag5) || strtolower($search)==strtolower($tag6) || strtolower($search)==strtolower($tag7) || strtolower($search)==strtolower($tag8) || strtolower($search)==strtolower($tag9) || strtolower($search)==strtolower($tag10) && $name!="")
														{
															$array[$counter]=$brand;
															$counter++;
															if(isset($_POST["brand"]) && $_POST["brand"]!="ALL")
													{
														if($_POST["brand"]==$row["brand"])
														{
													?>
													<br>
												<div class="products clearfix1">
												<a href="product_details.php?product_id=<?php echo $product_id ?>" target="_blank"><img src="../admin/images/<?=$pic?>" alt="img" class="img2" style="width:25%;height:100px"></a>
												<h5><a href="product_details.php?product_id=<?php echo $product_id; ?>" target="_blank" ><?=$name?></a></h5>
																<div class="single-rating">
																<ul>
								<?php
								$nrate=5-$rate;
									while($rate>1)
									{
									?>
									<i class="fa fa-star" aria-hidden="true"></i>
									<?php
									$rate=$rate-1;
									}
									if($rate != 0 )
									{
										$nrate=$nrate-1;
										?>
									<i class="fa fa-star-half-full" aria-hidden="true"></i>
									<?php
									}
									
									while($nrate>0)
									{
									?>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<?php
									$nrate--;
									}
									if($stock==0)
									{
										echo "<font color='red'>Out of Stock</font>";
									}
									else if($stock<=5)
									{
										echo "<font color='blue'>Hurry only ".$stock." left ! </font>";
									}
									else
									{
										echo "<font color='green'>In Stock</font>";
									}
								?>
								
							</ul>
							<h6><font color="red"><del>&#8377; <?php echo $original_price; ?></del></font> <font color="green">&nbsp; &#8377; <?php echo $show_price; ?></font> &nbsp; &nbsp; <?=$discount?>% off</h6>
							<form action="product.php?sports=<?=$sports?>&type=<?=$type?>&filter=<?=$filter?>" method="post">
																	<input type="hidden" name="addcart" value="<?=$product_id?>" >
																	<button type="submit" class="w3ls-cart" style="width:40%;background-color:bluevorder-color:blue" ><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
																</form>
							</div>
							</div>
														
													<?php
														}
													}
													else
													{
													?>
													<br>
												<div class="products clearfix1">
												<a href="product_details.php?product_id=<?php echo $product_id ?>" target="_blank"><img src="../admin/images/<?=$pic?>" alt="img" class="img2" style="width:25%;height:100px"></a>
												<h5><a href="product_details.php?product_id=<?php echo $product_id; ?>" target="_blank" ><?=$name?></a></h5>
																<div class="single-rating">
																<ul>
								<?php
								$nrate=5-$rate;
									while($rate>1)
									{
									?>
									<i class="fa fa-star" aria-hidden="true"></i>
									<?php
									$rate=$rate-1;
									}
									if($rate != 0 )
									{
										$nrate=$nrate-1;
										?>
									<i class="fa fa-star-half-full" aria-hidden="true"></i>
									<?php
									}
									
									while($nrate>0)
									{
									?>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<?php
									$nrate--;
									}
									if($stock==0)
									{
										echo "<font color='red'>Out of Stock</font>";
									}
									else if($stock<=5)
									{
										echo "<font color='blue'>Hurry only ".$stock." left ! </font>";
									}
									else
									{
										echo "<font color='green'>In Stock</font>";
									}
								?>
								
							</ul>
							<h6><font color="red"><del>&#8377; <?php echo $original_price; ?></del></font> <font color="green">&nbsp; &#8377; <?php echo $show_price; ?></font> &nbsp; &nbsp; <?=$discount?>% off</h6>
							<form action="product.php?sports=<?=$sports?>&type=<?=$type?>&filter=<?=$filter?>" method="post">
																	<input type="hidden" name="addcart" value="<?=$product_id?>" >
																	<button type="submit" class="w3ls-cart" style="width:40%;background-color:bluevorder-color:blue" ><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
																</form>
							</div>
							</div>
														
													<?php
												
														}
													}
												}
											}
										}
										?>
					<div class="clearfix"> </div>
				
				<!-- add-products --> 
				 
				<!-- //add-products -->
			
			
			
			<!-- recommendations -->
			
			<!-- //recommendations -->
		
	
	<!--//products-->  
	<!-- footer-top -->
	<br>
<?php
	include 'footer.php';
?>