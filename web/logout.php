<?php
session_start();
$url=$_SESSION["url"];
unset($_SESSION["user_id"]);
session_destroy();

echo "<script> window.location.href='".$url."'; </script> ";

?>