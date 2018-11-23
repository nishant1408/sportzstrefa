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
header("Content-Type: application/octet-stream");
header("Content-Type: application/pdf");
header("Content-Disposition: attachment; filename=Order_list.pdf");
header("Pragma: no-cache");
header("Expires: 0");
include "vieworder.php";
?>