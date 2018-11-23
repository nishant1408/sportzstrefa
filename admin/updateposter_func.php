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

$desc11=$_POST["desc11"];
$desc12=$_POST["desc12"];
$desc21=$_POST["desc21"];
$desc22=$_POST["desc22"];
$desc31=$_POST["desc31"];
$desc32=$_POST["desc32"];
$pic1=$_FILES["image1"]["name"];
$tmppic1=$_FILES["image1"]["tmp_name"];
 move_uploaded_file($tmppic1,"poster/". $pic1);
 
$pic2=$_FILES["image2"]["name"];
$tmppic2=$_FILES["image2"]["tmp_name"];
 move_uploaded_file($tmppic2,"poster/". $pic2);

$pic3=$_FILES["image3"]["name"];
$tmppic3=$_FILES["image3"]["tmp_name"];
 move_uploaded_file($tmppic3,"poster/". $pic3);
 

 
$update="UPDATE poster SET poster1='$pic1',poster2='$pic2',poster3='$pic3',desc11='$desc11',desc12='$desc12',desc21='$desc21',desc22='$desc22',desc31='$desc31',desc32='$desc32' WHERE id='1' ";
if(mysqli_query($connect,$update))
{
echo "<script> alert('POSTER UPDATED') </script>";
echo "<script> location.href='updateposter.php' </script>";
}
else
{
	echo "error ".mysqli_error($connect);
}


?>