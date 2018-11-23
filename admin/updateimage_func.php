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

$product_id=$_GET['product_id'];

$product_name=$_POST['product_name'];

$pic1=$_FILES["image1"]["name"];
$tmppic1=$_FILES["image1"]["tmp_name"];
 move_uploaded_file($tmppic1,"images/". $pic1);
 
$pic2=$_FILES["image2"]["name"];
$tmppic2=$_FILES["image2"]["tmp_name"];
 move_uploaded_file($tmppic2,"images/". $pic2);

$pic3=$_FILES["image3"]["name"];
$tmppic3=$_FILES["image3"]["tmp_name"];
 move_uploaded_file($tmppic3,"images/". $pic3);
 
 $pic4=$_FILES["image4"]["name"];
$tmppic4=$_FILES["image4"]["tmp_name"];
 move_uploaded_file($tmppic4,"images/". $pic4);
 
 $pic5=$_FILES["image5"]["name"];
$tmppic5=$_FILES["image5"]["tmp_name"];
 move_uploaded_file($tmppic5,"images/". $pic5);
 
 $pic6=$_FILES["image6"]["name"];
$tmppic6=$_FILES["image6"]["tmp_name"];
 move_uploaded_file($tmppic6,"images/". $pic6);
 
 $pic7=$_FILES["image7"]["name"];
$tmppic7=$_FILES["image7"]["tmp_name"];
 move_uploaded_file($tmppic7,"images/". $pic7);
 
 $pic8=$_FILES["image8"]["name"];
$tmppic8=$_FILES["image8"]["tmp_name"];
 move_uploaded_file($tmppic8,"images/". $pic8);
 
$update="UPDATE product_details SET name='$product_name',pic1='$pic1',pic2='$pic2',pic3='$pic3',pic4='$pic4',pic5='$pic5',pic6='$pic6',pic7='$pic7',pic8='$pic8' WHERE product_id='$product_id'";
if(mysqli_query($connect,$update))
{
echo "<script> alert('PRODUCT UPDATED') </script>";
echo "<script> location.href='updateimagehtml.php' </script>";
}
else
{
	echo "error ".mysqli_error($connect);
}


?>