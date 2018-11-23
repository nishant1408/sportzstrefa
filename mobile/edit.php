<?php 
session_start();
include '../connect.php';
$user_id=$_SESSION["user_id"];
$delete="DELETE FROM userinfo WHERE user_id='$user_id'"; 
mysqli_query($connect,$delete);
session_destroy(); 
echo "<script> location.href='signup.php' </script>"; 
?>