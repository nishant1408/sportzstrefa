<?php
session_start();
include '../connect.php';
require '../phpmailer/class.phpmailer.php';

		$mail = new PHPMailer;
		$mail->From = 'order@sportstrefa.tk';
$user_id=$_SESSION["user_id"];
$cartitem=0;
$select="SELECT * FROM cart WHERE user_id='$user_id' ";
if($result=mysqli_query($connect,$select))
{
	while ($row = mysqli_fetch_assoc($result)) 
	{
		$cartitem++;
	}
}
if($_SESSION["payment"]=="CASH ON DELIVERY")
{
	$order_num=$_SESSION["order_num"];
	$pincode=$_SESSION["pincode"];
	$name=$_SESSION["name"];
	$mobile=$_SESSION["mobile"];
	$address=$_SESSION["address"];
	$landmark=$_SESSION["landmark"];
	$code=$_SESSION["code"];
	$email=$_SESSION["email"];
	$city=$_SESSION["city"];
	$state=$_SESSION["state"];
	$status1="ORDER PLACED";
	$payment=$_SESSION["payment"];
	$delivery=$_SESSION["delivery"];
	$deliveryc=$delivery/$cartitem;
	$wallet=$_SESSION["wallet"];
	$discount=0;
	$oneday=$_SESSION["oneday"];
	if($oneday==1)
		$dtype="ONE DAY DELIVERY";
	else
		$dtype="NORMAL DELIVERY";
	$select="SELECT * FROM cart WHERE user_id='$user_id' ";
	if($result=mysqli_query($connect,$select))
	{
	while ($row1 = mysqli_fetch_assoc($result)) 
	{
		$product_id=$row1["product_id"];
		$size=$row1["size"];
		$quantity=$row1["quantity"];
		$select1="SELECT * FROM product_details WHERE product_id='$product_id'";
		if($result1=mysqli_query($connect,$select1))
		{
			while ($row = mysqli_fetch_assoc($result1)) 
			{
				$stock=$row["stock"];
				$price=$row["show_price"];
				$product_name=$row["name"];
				$return_day=$row["return_day"];
			}
		}
		if($stock>=$quantity)
		{
			$total=($price*$quantity)+$deliveryc;
			if($wallet>0)
			{
				if($wallet>=$total)
				{
				$balance=$total;
				$wallet=$wallet-$total;
				$amount=0;
				}
				else
				{
					$balance=$wallet;
					$wallet=0;
					$amount=$total-$balance;
				}
			}
			else
			{
				$balance=0;
				$amount=$total;
			}
	$insert="INSERT INTO track_order (size,quantity,user_id,name,mobile,email,product_name,product_id,price,dcharge,dtype,total,discount,wallet,amount,address,city,state,pincode,landmark,coupon_code,status,payment) values 
	('$size','$quantity','$user_id','$name','$mobile','$email','$product_name','$product_id','$price','$deliveryc','$dtype','$total','$discount','$balance','$amount','$address','$city','$state','$pincode','$landmark','$code','$status1','$payment')";
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
		$message="YOUR ORDER OF ".$product_name." WITH ORDER ID - ".$order_id." HAS BEEN PLACED";
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
		if($balance>0)
		{
			$type="BALANCE";
			
			$uday="DEBIT";
			$status="AMOUNT SUCCESSFULLY DEDUCTED";
			$udesc="AMOUNT DEDUCTED FOR PURCHASE";
			$insert="INSERT INTO wallet_sheet (order_id,user_id,pcoin,pday,description,status,type) values ('$order_id','$user_id','$balance','$uday','$udesc','$status','$type')";
			mysqli_query($connect,$insert);
			$update="UPDATE userinfo SET balance = balance - ".$balance." WHERE user_id='$user_id' ";
			mysqli_query($connect,$update);
		}
		}
		$delete="DELETE FROM cart WHERE user_id='$user_id' AND product_id='$product_id'";
	mysqli_query($connect,$delete);
	}
	} } }
	
	echo "<script> window.location.href='../web/order.php' ; </script> ";
}
else if($_SESSION["payment"]=="PayUMoney")
{
	$url=$_SESSION["url"];
	echo "This Payment Gateway is Not available Currently . Select a different Option<br>";
	echo "<a href='http://sportstrefa.tk/".$url."'>GO BACK</a>";

}
else if($_SESSION["payment"]=="Paytm")
{
	$url=$_SESSION["url"];
	echo "This Payment Gateway is Not available Currently . Select a different Option<br>";
	echo "<a href='http://sportstrefa.tk/".$url."'>GO BACK</a>";

}

?>