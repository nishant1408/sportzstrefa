<?php
include 'header.php';
$url = $_SERVER["REQUEST_URI"];
$_SESSION["url"]=$url;
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| ||a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
		echo "<script> location.href='../mobile/".substr($url,5,strlen($url))."'; </script>";

?>
<div class="agileits-modal modal fade" id="addcart" tabindex="-1" role="dialog" aria-labelledby="myModal88" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><i class="fa" aria-hidden="true"></i> <font face="Comic Sans" >SELECT QUANTITY AND SIZE FOR THE PRODUCT </font></h4>
					<div class="modal-body modal-body-sub"> 
					<form action="mainpage.php" method="post">
					<?php $product_id=$_POST["addcart"]; ?>
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
					
					$query = "SELECT * FROM product_details WHERE verify='1' AND product_id='$product_id' ";
										if(mysqli_query($connect, $query))
										{
											if ($result = mysqli_query($connect, $query)) 
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
	<!-- banner -->
	<div class="banner">
		<div id="kb" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel" data-interval="6000" data-pause="hover">
			<!-- Wrapper-for-Slides -->
            <div class="carousel-inner" role="listbox">  
			<?php
			$query = "SELECT * FROM poster WHERE id='1' ";
										if(mysqli_query($connect, $query))
										{
											if ($result = mysqli_query($connect, $query)) 
											{
												while ($row = mysqli_fetch_assoc($result)) 
												{
													$poster1=$row["poster1"];
													$poster2=$row["poster2"];
													$poster3=$row["poster3"];
													$desc11=$row["desc11"];
													$desc12=$row["desc12"];
													$desc21=$row["desc21"];
													$desc22=$row["desc22"];
													$desc31=$row["desc31"];
													$desc32=$row["desc32"];
												}
											}
										}
			?>
                <div class="item active"><!-- First-Slide -->
                    <img src="../admin/poster/<?=$poster1?>" alt="" class="img-responsive" />
                    <div class="carousel-caption kb_caption kb_caption_right">
                        <h3 data-animation="animated flipInX"><?=$desc11?></h3>
                        <h4 data-animation="animated flipInX"><?=$desc12?></h4>
                    </div>
                </div>  
                <div class="item"> <!-- Second-Slide -->
                    <img src="../admin/poster/<?=$poster2?>" alt="" class="img-responsive" />
                    <div class="carousel-caption kb_caption kb_caption_right">
                        <h3 data-animation="animated fadeInDown"><?=$desc21?></h3>
                        <h4 data-animation="animated fadeInUp"><?=$desc22?></h4>
                    </div>
                </div> 
                <div class="item"><!-- Third-Slide -->
                    <img src="../admin/poster/<?=$poster3?>" alt="" class="img-responsive"/>
                    <div class="carousel-caption kb_caption kb_caption_center">
                        <h3 data-animation="animated fadeInLeft"><?=$desc31?></h3>
                        <h4 data-animation="animated flipInX"><?=$desc32?></h4>
                    </div>
                </div> 
            </div> 
            <!-- Left-Button -->
            <a class="left carousel-control kb_control_left" href="#kb" role="button" data-slide="prev">
				<span class="fa fa-angle-left kb_icons" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a> 
            <!-- Right-Button -->
            <a class="right carousel-control kb_control_right" href="#kb" role="button" data-slide="next">
                <span class="fa fa-angle-right kb_icons" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a> 
        </div>
		<script src="js/custom.js"></script>
	</div>
	<!-- //banner -->  
	<!-- welcome -->
	<div class="welcome"> 
		<div class="container"> 
			<div class="welcome-info">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					
					<div class="clearfix"> </div>
					<h3 class="w3ls-title">Our New Additions</h3>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							<div class="tabcontent-grids">  
							<script>
									$(document).ready(function() { 
										$("#owl-demo2").owlCarousel({
									 
										  autoPlay: 3000, //Set AutoPlay to 3 seconds
									 
										  items :4,
										  itemsDesktop : [640,5],
										  itemsDesktopSmall : [414,4],
										  navigation : true
									 
										});
										
									}); 
								</script>
								<div id="owl-demo2" class="owl-carousel"> 
								<?php
									$counter=0;
									$query = "SELECT * FROM product_details  WHERE verify='1' ORDER BY product_id DESC ";
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
													$product_id=$row["product_id"];
													$show_price=$row["show_price"];
													$pic=$row["pic1"];
													$discount=$row["discount"];
													$original_price=$row["original_price"];
													$stock=$row["stock"];
													if($stock==0)
														continue;
													$counter++;
													?>
													<div class="item">
														<div class="agile-products">
															<div class="new-tag"><h6><?=$discount?>%<br>Off</h6></div>
																<a href="product_details.php?product_id=<?php echo $product_id ?>" target="_blank"><img src="../admin/images/<?=$pic?>" class="img-responsive" alt="img" style="height:150px"></a>
																<div class="agile-product-text">              
																	<h5><a href="product_details.php?product_id=<?php echo $product_id; ?>" target="_blank" ><?=$name?></a></h5> 
																	<h6><del>&#8377; <?php echo $original_price; ?></del>&#8377; <?php echo $show_price; ?></h6> 
																	<form action="mainpage.php" method="post">
																		<input type="hidden" name="addcart" value="<?=$product_id?>" >
																		<button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
																	</form>   
																</div>
															</div> 
														</div>
													<?php
												}
											}
										}
										?>
									</div>
								</div> 
							</div>
						</div>
					</div> 
					<div class="clearfix"> </div>
					<h3 class="w3ls-title">Highest Rated Products</h3>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							<div class="tabcontent-grids">  
								<div id="owl-demo" class="owl-carousel"> 
								<?php
									$counter=0;
									$query = "SELECT * FROM product_details WHERE verify='1' ORDER BY rate DESC ";
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
													$product_id=$row["product_id"];
													$show_price=$row["show_price"];
													$pic=$row["pic1"];
													$discount=$row["discount"];
													$original_price=$row["original_price"];
													$stock=$row["stock"];
													if($stock==0)
														continue;
													$counter++;
													?>
													<div class="item">
														<div class="agile-products">
															<div class="new-tag"><h6><?=$discount?>%<br>Off</h6></div>
																<a href="product_details.php?product_id=<?php echo $product_id ?>" target="_blank"><img src="../admin/images/<?=$pic?>" class="img-responsive" alt="img" style="height:150px"></a>
																<div class="agile-product-text">              
																	<h5><a href="product_details.php?product_id=<?php echo $product_id; ?>" target="_blank" ><?=$name?></a></h5> 
																	<h6><del>&#8377; <?php echo $original_price; ?></del>&#8377; <?php echo $show_price; ?></h6> 
																	<form action="mainpage.php" method="post">
																		<input type="hidden" name="addcart" value="<?=$product_id?>" >
																		<button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
																	</form> 
																</div>
															</div> 
														</div>
													<?php
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
			 
				
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					
					<div class="clearfix"> </div>
					<h3 class="w3ls-title">Most Viewed Products</h3>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							<div class="tabcontent-grids">  
							<script>
									$(document).ready(function() { 
										$("#owl-demo1").owlCarousel({
									 
										  autoPlay: 3000, //Set AutoPlay to 3 seconds
									 
										  items :4,
										  itemsDesktop : [640,5],
										  itemsDesktopSmall : [414,4],
										  navigation : true
									 
										});
										
									}); 
								</script>
								<div id="owl-demo1" class="owl-carousel"> 
								<?php
									$counter=0;
									$query = "SELECT * FROM product_details WHERE verify='1' ORDER BY views DESC ";
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
													$product_id=$row["product_id"];
													$show_price=$row["show_price"];
													$pic=$row["pic1"];
													$discount=$row["discount"];
													$original_price=$row["original_price"];
													$stock=$row["stock"];
													if($stock==0)
														continue;
													$counter++;
													?>
													<div class="item">
														<div class="agile-products">
															<div class="new-tag"><h6><?=$discount?>%<br>Off</h6></div>
																<a href="product_details.php?product_id=<?php echo $product_id ?>" target="_blank"><img src="../admin/images/<?=$pic?>" class="img-responsive" alt="img" style="height:150px"></a>
																<div class="agile-product-text">              
																	<h5><a href="product_details.php?product_id=<?php echo $product_id; ?>" target="_blank" ><?=$name?></a></h5> 
																	<h6><del>&#8377; <?php echo $original_price; ?></del>&#8377; <?php echo $show_price; ?></h6> 
																	<form action="mainpage.php" method="post">
																		<input type="hidden" name="addcart" value="<?=$product_id?>" >
																		<button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
																	</form>   
																</div>
															</div> 
														</div>
													<?php
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
			</div>  	
		</div>  	
	<!-- //welcome -->
	<!-- add-products -->

	<!-- //add-products -->
	<!-- coming soon -->
	<!-- //coming soon -->
	<!-- deals -->
	
	<!-- //deals --> 
	<!-- footer-top -->
<?php
include 'footer.php';
?>
