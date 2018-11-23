<?php
session_start();
include '../connect.php';
require '../phpmailer/class.phpmailer.php';

		$mail = new PHPMailer;
		$mail->From = 'order@sportstrefa.tk';
$user_id=$_SESSION["user_id"];
if($_SESSION["payment"]=="CASH ON DELIVERY")
{
	$quantity=$_SESSION["quantity"];
	$product_name=$_SESSION["product_name"];
	$order_num=$_SESSION["order_num"];
	$product_id=$_SESSION["product_id"];
	$pincode=$_SESSION["pincode"];
	$size=$_SESSION["size"];
	$name=$_SESSION["name"];
	$mobile=$_SESSION["mobile"];
	$address=$_SESSION["address"];
	$landmark=$_SESSION["landmark"];
	$code=$_SESSION["code"];
	$email=$_SESSION["email"];
	$city=$_SESSION["city"];
	$state=$_SESSION["state"];
	$status="ORDER PLACED";
	$payment=$_SESSION["payment"];
	$return_day=$_SESSION["return_day"];
	$price=$_SESSION["price"];
	$delivery=$_SESSION["delivery"];
	$total=$_SESSION["total"];
	$wallet=$_SESSION["wallet"];
	$amount=$_SESSION["amount"];
	$oneday=$_SESSION["oneday"];
	if($oneday==1)
		$dtype="ONE DAY DELIVERY";
	else
		$dtype="NORMAL DELIVERY";
	$discount=0;
	$select="SELECT * FROM product_details WHERE product_id='$product_id'";
		if($result=mysqli_query($connect,$select))
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$stock=$row["stock"];
			}
		}
		if($stock>=$quantity)
		{
			
	$insert="INSERT INTO track_order (size,quantity,user_id,name,mobile,email,product_name,product_id,price,dcharge,dtype,total,discount,wallet,amount,address,city,state,pincode,landmark,coupon_code,status,payment) values 
	('$size','$quantity','$user_id','$name','$mobile','$email','$product_name','$product_id','$price','$delivery','$dtype','$total','$discount','$wallet','$amount','$address','$city','$state','$pincode','$landmark','$code','$status','$payment')";
	if(mysqli_query($connect,$insert))
	{
		
		$id=mysqli_insert_id($connect);
		$update="UPDATE product_details SET stock = stock - ".$quantity." WHERE product_id = '$product_id' ";
		mysqli_query($connect,$update);
		include '../web/delivery.php';
		include '../web/id.php';
		$order_id=$key.$id;
		$update="UPDATE track_order SET deliveryby='$deliveryby',timedate='$date',order_id='$order_id' WHERE id='$id'";
		mysqli_query($connect,$update);
		$link="order_details.php?order_id=".$order_id;
		$info="YOUR ORDER OF ".$product_name." WITH ORDER ID - ".$order_id." HAS BEEN PLACED";
		$subject='ORDER CONFIRMATION';
		$message="<b>YOUR ORDER OF ".$product_name." WITH ORDER ID - <i>".$id."</i> HAS BEEN PLACED<b><br><a href='http://sportstrefa.tk/web/order_details.php?order_id=".$order_id."'>Get Order Status & Details</a>";
		$remail=$email;
		include '../sendmail.php';
		$insert="INSERT INTO notification (timedate,user_id,link,info) values ('$date','$user_id','$link','$info') ";
		mysqli_query($connect,$insert);
		$_SESSION["order_id"]=$order_id;
		$user=($amount)*0.2;
		$friend=($amount)*0.1;
		if($user>500)
		{
			$user=500;
		}
		if($friend>300)
		{
			$friend=250;
		}
		$uday=$return_day;
		$udesc="EARNED FOR YOUR PURCHASE";
		$fdesc="EARNED FROM FRIEND";
		$selectname="SELECT * FROM userinfo WHERE code='$code' ";
		$status=0;
		if($resultname=mysqli_query($connect,$selectname))
		{
			while ($row = mysqli_fetch_assoc($resultname)) 
			{
				$friend_id=$row["user_id"];
				$status=1;
			}
		}
		if($status==1 && $friend_id!=$user_id){
			$status="PENDING";
			$type="COINS";
		$insert="INSERT INTO wallet_sheet (order_id,user_id,pcoin,pday,description,status,type) values ('$order_id','$user_id','$user','$uday','$udesc','$status','$type')";
		mysqli_query($connect,$insert);
		$insert="INSERT INTO wallet_sheet (order_id,user_id,pcoin,pday,description,status,type) values ('$order_id','$friend_id','$friend','$uday','$fdesc','$status','$type')";
		mysqli_query($connect,$insert);
		}
		if(isset($_SESSION["wallet"]))
		{
		if($_SESSION["wallet"]>0)
		{
			$type="BALANCE";
			$user=$_SESSION["wallet"];
			$uday="DEBIT";
			$status="AMOUNT SUCCESSFULLY DEDUCTED";
			$udesc="AMOUNT DEDUCTED FOR PURCHASE";
			$insert="INSERT INTO wallet_sheet (order_id,user_id,pcoin,pday,description,status,type) values ('$order_id','$user_id','$user','$uday','$udesc','$status','$type')";
			mysqli_query($connect,$insert);
			$update="UPDATE userinfo SET balance = balance - ".$wallet." WHERE user_id='$user_id' ";
			mysqli_query($connect,$update);
		}
		}
		echo "<script> window.location.href='../web/order.php' ; </script> ";
	}
		}
	echo "<script> window.location.href='../web/error.php' ; </script> ";
}
else if($_SESSION["payment"]=="PayUMoney")
{
	echo "<script> window.location.href='PayUMoney_form.php' ; </script> ";

}
else if($_SESSION["payment"]=="Paytm")
{
	$url=$_SESSION["url"];
	echo "This Payment Gateway is Not available Currently . Select a different Option<br>";
	echo "<a href='http://sportstrefa.tk/".$url."'>GO BACK</a>";

}

?>