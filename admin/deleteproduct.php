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
<!DOCTYPE HTML>
<html>
<body>
<?php


$value2=$_POST['product_id'];


		$SQL ="DELETE FROM product_details  WHERE product_id = '$value2'";
		if(mysqli_query($connect,$SQL))
		{
			echo "<script> alert('PRODUCT DELETED ') </SCRIPT>";
echo "<script> location.href='deleteproducthtml.php' </script>";
		}
	
mysqli_close($connect);
?> 
</body>
</html>