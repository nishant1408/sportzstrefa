<?php
date_default_timezone_set("Asia/Kolkata");
$date=date( "Y-m-d H:i:s" , time());
$key="#ODID".date('m' , time()).date('d' , time())."KOL-";
$deliveryby=date( "Y-m-d " , strtotime($date."+ ".$days." days"));
?>