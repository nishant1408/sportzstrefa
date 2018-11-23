<?php
session_start();
if(isset($_SESSION["url"]))
$url=$_SESSION["url"];
else
	$url='mainpage.php';
unset($_SESSION["user_id"]);
session_destroy();

echo "<script> window.location.href='".$url."'; </script> ";

?>