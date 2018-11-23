<?php
include 'header.php';
$url = $_SERVER["REQUEST_URI"];
$_SESSION["url"]=$url;
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| ||a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
		echo "";
else
	echo "<script> location.href='../web/".substr($url,8,strlen($url))."'; </script>";
if(!isset($_SESSION['user_id']))
{
	echo "<script> location.href='mainpage.php'; </script> "; 
}
if(isset($_GET["delete"]))
{
	$product_id=$_GET["delete"];
	$delete="DELETE FROM cart WHERE user_id='$user_id' AND product_id='$product_id' ";
	mysqli_query($connect,$delete);
	echo "<script> location.href='cart.php'; </script>";
}
if(isset($_GET["addwishlist"]))
{
	$product_id=$_GET["addwishlist"];
	$counter=0;
		$select="SELECT * FROM wishlist WHERE user_id='$user_id' AND product_id='$product_id'";
		if($result=mysqli_query($connect,$select))
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$counter=1;
			}
		}
		if($counter==0)
		{
	$insert="INSERT INTO wishlist (user_id,product_id) values ('$user_id','$product_id') ";
	mysqli_query($connect,$insert);
		}
	$delete="DELETE FROM cart WHERE user_id='$user_id' AND product_id='$product_id' ";
	mysqli_query($connect,$delete);
	echo "<script> location.href='cart.php'; </script>";
}
$setpin=0;
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
	$_SESSION["oneday"]=$oneday;
	$_SESSION["pincode"]=$pincode;
	include 'delivery.php';
	include 'id.php';
	$delivery=$delivery*$cartitem;
	$price=$_POST["price"];
	if($price >= 2499 )
		$delivery=0;
	
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
		$signal="<font color='green' > <br><br><br> AVAILABLE AT YOUR PINCODE ( ".$pincode." )<br> DELIVERY CHARGE = &#8377;".$delivery." <br> TOTAL = &#8377;".($delivery+$price)."\n  ( WILL BE DELIVERED BY ".$deliveryby." ) ";
	}
}
?>
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
<div class="agileits-modal modal fade" id="applypromo" tabindex="-1" role="dialog" aria-labelledby="myModal88" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><i class="fa" aria-hidden="true"></i> <font face="Comic Sans" >APPLY PROMO </font></h4>
					<div class="modal-body modal-body-sub"> 
					<form action="buycart.php" method="post">
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
<?php
if(isset($_POST['buyproduct']))
{
	
			echo "	<script> $('#applypromo').modal('show'); </script> ";
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
	
	<!-- //banner -->  
	<!-- welcome -->
	<div class="products">	 
		<div class="container">  
			<div class="single-page">
				<div class="single-page-row" id="detail-21">
				<h3>YOUR CART</h3>
				<p></p>
				<br><br>
				
				<?php
				$error=0;
					$query = "SELECT * FROM cart WHERE user_id='$user_id'";
					$counter = 1;
					$totalcart=0;
					if(mysqli_query($connect, $query))
					{
						if ($result = mysqli_query($connect, $query)) {
						/* fetch associative array */
						while ($row = mysqli_fetch_assoc($result)) 
						{
							$product_id=$row["product_id"];
							$quantity=$row["quantity"];
							$size=$row["size"];
							$query1 = "SELECT * FROM product_details WHERE product_id='$product_id'";
							if(mysqli_query($connect, $query1))
							{
								if ($result1 = mysqli_query($connect, $query1)) {
								/* fetch associative array */
								while ($row1 = mysqli_fetch_assoc($result1)) {
								$pic1=$row1["pic1"];
								$name=$row1["name"];
								$show_price=$row1["show_price"];
								$discount=$row1["discount"];
								$original_price=$row1["original_price"];
								$stock=$row1["stock"];
							}
						}
					}
					if($stock>=$quantity)
					{
					$totalcart=$totalcart+($show_price*$quantity);
					}
					echo "<div class='products clearfix1'>";
					echo "<a href='product_details.php?product_id=".$product_id."' target='_blank'><img src='../admin/images/".$pic1."' alt='img' class='img2' style='width:25%;height:100px/></a>";
					echo "<font color='black'><p>".$name."</p></font>" ;
					
					
					echo "<p> &#x20B9; <strike> ".$original_price."</strike> <font color ='#ffa500'> ".$discount."% off</font><font size='4px' color='#FF0000'><strong><b> &#x20B9; ".$show_price."</b></strong> </font> </p> ";
					echo "<p> Quantity : ".$quantity." | ";
					if($size!="")
					{
					echo " Size : ".$size."</p>";
					}
					if($stock<$quantity)
					{
						$error=1;
						echo "<p><font color='red'>OUT OF STOCK/THE DESIRED QUANTITY NOT AVAILABLE</font></p>";
					}
					echo "<br>";
                    echo "</div>";
					?>
					<style>
    .button {
        appearance: button;
        -moz-appearance: button;
        -webkit-appearance: button;
        text-decoration: none; 
        font: menu; 
        color: ButtonText;
        display: inline-block; 
        padding: 2px 8px;
    }
</style>
					<div class="col-md-12">
						<a href="cart.php?delete=<?=$product_id?>" class="button w3ls-cart products clearfix1" style="width:50%">Remove</a>
						<a href="cart.php?addwishlist=<?=$product_id?>" class="button w3ls-cart img2" style="width:50%">Wishlist</a>
					</div>
						<?php
					
					$counter++ ;
					
					
				}

    

    /* free result set */
				mysqli_free_result($result);
				}
				}
				if ($counter == 1)
				{

					echo "NO ORDERS FOUND.<a href='mainpage.php'>CONTINUE SHOPPING</a>";
				}
				?>
			</div>  
			<div class="col-md-12">
			<?php
			if($counter!=1)
			{?>
		<div class="col-md-6">
		<p>TOTAL CART VALUE : &#8377; <?=$totalcart?></p>
		<?php if($error==1) { echo "<p><font color='blue'>FEW ITEMS IN YOUR CART ARE OUT OF STOCK PLEASE REMOVE THEM TO PROCEED</font></p>"; } ?>
		<?php
						if($setpin==1)
						{
							echo $signal;
							if($error==0)
							{
								$_SESSION["price"]=$price;
								$_SESSION["delivery"]=$delivery;
								
								$_SESSION["pincode"]=$pincode;
						?>
						<hr>
						
						<form action="cart.php" method="post">
						<input type="hidden" name="buyproduct" value="1">
						<?php if($error==0) { ?>
							<button type="submit" class="w3ls-cart" ><i  aria-hidden="true"></i>BUY NOW</button>
						<?php }  ?>
						</form>
						
						<?php
							}
						}
						?>
		</div>
		<div class="col-md-6 single-top-right" >
			<form action="cart.php" method="post" onsubmit="myfunction()">
			<input type="checkbox" name="oneday" >Opt for one day delivery<br>
							<input id="numb" type="text" name="pincode" value="<?=$pincode?>" placeholder="Enter Your Pincode " style="width=100%;height:40px" required>
							<input type="hidden" name="pin" value="1" >
							<input type="hidden" name="price" value="<?=$totalcart?>" >
							<button type="submit" class="w3ls-cart" onclick="myfunction()" ><i  aria-hidden="true"></i>Check Availability</button>
						</form>
						<?php 
			}
			?>
						
						
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