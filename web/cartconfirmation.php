<?php
session_start();
$url = $_SERVER["REQUEST_URI"];
$_SESSION["url"]=$url;
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| ||a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
		echo "<script> location.href='../mobile/".substr($url,5,strlen($url))."'; </script>";
if(!isset($_SESSION['user_id']))
{
	echo "<script> window.location.href='mainpage.php'; </script>"; 
}
else
{
	$user_id=$_SESSION['user_id'];
}
include '../connect.php' ;
$selectname="SELECT * FROM userinfo WHERE user_id='$user_id' ";
if($resultname=mysqli_query($connect,$selectname))
{
	while ($row = mysqli_fetch_assoc($resultname)) 
	{
		$rname=$row["name"];
		$remail=$row["email"];
	}
}
$pincode=$_SESSION["pincode"];
$delivery=$_SESSION["delivery"];
$cartitem=0;
$select="SELECT * FROM cart WHERE user_id='$user_id' ";
if($result=mysqli_query($connect,$select))
{
	while ($row = mysqli_fetch_assoc($result)) 
	{
		$cartitem++;
	}
}
if(isset($_POST["submit"]))
{
	$name=$_POST["name"];
	$mobile=$_POST["mobile"];
	$address=$_POST["address"];
	$landmark=$_POST["landmark"];
	$code="";
	$email=$_POST["email"];
	$dcharge=$delivery/$cartitem;
	$city=$_POST["city"];
	$state=$_POST["state"];
	$status="ORDER PLACED";
	$payment=$_POST["payment"];
	$query = "SELECT product_id FROM cart WHERE user_id='$user_id'";
						if ($result = mysqli_query($connect, $query)) {
						while ($row = mysqli_fetch_assoc($result)) 
						{
							$product_id=$row["product_id"];
							$query1 = "SELECT * FROM product_details WHERE product_id='$product_id'";
								if ($result1 = mysqli_query($connect, $query1)) {
								while ($row1 = mysqli_fetch_assoc($result1)) {
								$product_name=$row1["name"];
								$show_price=$row1["show_price"];
								$totalb=$show_price+$dcharge;
								$discount=0;
	$insert="INSERT INTO track_order (user_id,name,mobile,email,product_name,product_id,price,dcharge,total,discount,address,city,state,pincode,landmark,coupon_code,status,payment) values 
	('$user_id','$name','$mobile','$email','$product_name','$product_id','$show_price','$dcharge','$totalb','$discount','$address','$city','$state','$pincode','$landmark','$code','$status','$payment')";
	mysqli_query($connect,$insert);
	$id=mysqli_insert_id($connect);
	$update="UPDATE product_details SET stock = stock - 1 WHERE product_id = '$product_id' ";
		mysqli_query($connect,$update);
		include 'delivery.php';
		include 'id.php';
		$order_id=$key.$id;
		$update="UPDATE track_order SET deliveryby='$deliveryby',timedate='$date',order_id='$order_id' WHERE id='$id'";
		mysqli_query($connect,$update);
		$link="order_details.php?order_id=".$order_id;
		$info="YOUR ORDER OF ".$product_name." WITH ORDER ID - ".$order_id." HAS BEEN PLACED";
		$insert="INSERT INTO notification (timedate,user_id,link,info) values ('$date','$user_id','$link','$info') ";
		mysqli_query($connect,$insert);
		$delete="DELETE FROM cart WHERE user_id='$user_id' AND product_id='$product_id' ";
		mysqli_query($connect,$delete);
								}
								}
							
						}
						}
					
		$_SESSION["order_id"]=mysqli_insert_id($connect);
		$order_id=$_SESSION["order_id"];
		
		unset($_SESSION["wallet"]);
		unset($_SESSION["buy"]);
		unset($_SESSION["pincode"]);
		unset($_SESSION["total"]);
		unset($_SESSION["product_id"]);
		echo "<script> location.href='order.php'; </script> ";
	}
	else
	{
		$error=1;
	}

?>