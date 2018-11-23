<?php 
session_start();
include '../connect.php';
require '../phpmailer/class.phpmailer.php';

		$mail = new PHPMailer;
$url = $_SERVER["REQUEST_URI"];
$_SESSION["url"]=$url;
if($_SESSION["user_id"]==1 || $_SESSION["user_id"]==2 || $_SESSION["user_id"]==3 || $_SESSION["user_id"]==4 )
{
$user_id=$_SESSION["user_id"];

}
else
{
echo "<script> location.href='../web/'; </script>";
}
?>
<!DOCTYPE HTML>
<html>
<body>
<?php


$value2=$_POST['orderid'];
$value4=$_POST['status'];
$query = "SELECT * FROM track_order WHERE order_id='$value2' ";
					$counter = 1;
					if(mysqli_query($connect, $query))
					{
						if ($result = mysqli_query($connect, $query)) {
						/* fetch associative array */
						while ($row = mysqli_fetch_assoc($result)) 
						{
							$user=$row["user_id"];
							$product_name=$row["product_name"];
							$remail=$row["email"];
							$name=$row["name"];
						}
						}
					}
					$days=0;
		include '../web/id.php';
		if($value4=="HAS BEEN DELIVERED")
		{
			$update="UPDATE track_order SET deliveron='$date' WHERE order_id='$value2' ";
			mysqli_query($connect,$update);
		}
		$info="YOUR ORDER OF ".$product_name." WITH ORDER ID - ".$value2." ".$value4;
		$link="order_details.php?order_id=".$value2;
		$insert="INSERT INTO notification (timedate,user_id,link,info) values ('$date','$user','$link','$info') ";
		mysqli_query($connect,$insert);
		$SQL =" UPDATE track_order SET status = '$value4' WHERE order_id = '$value2'";
		if(mysqli_query($connect,$SQL))
		{
			$subject='ORDER DETAILS';
			$message="YOUR ORDER OF ".$product_name." WITH ORDER ID - ".$value2." ".$value4;
			include '../sendmail.php';
			echo "<script> alert('PRODUCT UPDATED ') </SCRIPT>";
			echo "<script> location.href='updateorderhtml.php' </script>";
		}
	
mysqli_close($connect);
?> 
</body>
</html>