<?php

session_start();
unset($_SESSION["user_id"]);
session_destroy();
echo "<script> location.href='index.php'; </script>";

?>