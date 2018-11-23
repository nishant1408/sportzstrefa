<?php 
session_start();
include '../connect.php';
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
<?php

$product_id=$_POST['product_id'];

$verify=1;
$update="UPDATE product_details SET verify='$verify' WHERE product_id='$product_id'";
if(mysqli_query($connect,$update))
{
echo "<script> alert('PRODUCT VERIFIED') </script>";
echo "<script> location.href='verifyproducts.php' </script>";
}
else
{
	echo "error ".mysqli_error($connect);
}


?>