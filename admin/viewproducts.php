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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SPORTZSTREFA-MINI SPORTS STORE</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="assets/ItemSlider/css/main-style.css" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="assets/css/style.css" rel="stylesheet" />

</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>               
				<a class="navbar-brand" href="admincenter.php"><strong><font size="6" >Sportz</font><font size="6" color="#FF0000">Strefa</font><font size="3">.com</sTRong></font></a>
            </div>

            <!-- Collect the nav links, forms, and oTRer content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
                    <li><a href="admincenter.php">Main Page</a></li>
                    

                   
                </ul>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
        
<body>

<h4><b><u>All Product Details</u></b></h4>
<a href="downloadviewproducts.php">DOWNLOAD LIST</a>
<?php

$query = "SELECT * FROM product_details ORDER BY product_id DESC ";
?>
<table border="3" cellspacing="5" cellpadding="5" >
<tr>
<TH> PRODUCT ID </TH>
<TH> VIEWS </TH>
<TH> RATE </TH>
<TH> SPORTS </TH>
<TH> BRAND </TH>
<TH> TYPE </TH>
<TH> STOCK </TH>
<TH> RETURN TYPE </TH>
<TH> RETURN DAY </TH>
<TH> PRODUCT DESCRIPTION </TH>
<TH> SETSIZE </TH>
<TH> SIZE </TH>
<TH> ADD INFO </TH>
<TH> REVIEW </TH>
<TH> HELP </TH>
<TH> NAME </TH>
<TH> PICTURES </TH>
<TH> SHOW PRICE </TH>
<TH> ORIGINAL PRICE </TH>
<TH> DISCOUNT </TH>
<TH> FEATURES </TH>
<TH> SELLER </TH>
<TH> VERIFY </TH>
<tr>
<?php
if(mysqli_query($connect, $query))
{
if ($result = mysqli_query($connect, $query)) {
   /* fetch associative array */
   while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td>";
echo $row["product_id"];
echo "</td>";
echo "<td>";
echo $row["views"];
echo "</td>";
echo "<td>";
echo $row["rate"];
echo "</td>";
echo "<td>";
echo $row["sports"];
echo "</td>";
echo "<td>";
echo $row["brand"];
echo "</td>";
echo "<td>";
echo $row["type"];
echo "</td>";
echo "<td>";
echo $row["stock"];
echo "</td>";
echo "<td>";
echo $row["return_type"];
echo "</td>";
echo "<td>";
echo $row["return_day"];
echo "</td>";
echo "<td>";
echo $row["product_desc"];
echo "</td>";
echo "<td>";
echo $row["sizeset"];
echo "</td>";
echo "<td>";
echo $row["size1"].",".$row["size2"].",".$row["size3"].",".$row["size4"].",".$row["size5"].",".$row["size6"].",".$row["size7"].",".$row["size8"].",".$row["size9"].",".$row["size10"];
echo "</td>";
echo "<td>";
echo $row["add_info"];
echo "</td>";
echo "<td>";
echo $row["review"];
echo "</td>";
echo "<td>";
echo $row["help"];
echo "</td>";
echo "<td>";
echo $row["name"];
echo "</td>";
echo "<td>";
echo $row["pic1"].",".$row["pic2"].",".$row["pic3"].",".$row["pic4"].",".$row["pic5"].",".$row["pic6"].",".$row["pic7"].",".$row["pic8"];
echo "</td>";
echo "<td>";
echo $row["show_price"];
echo "</td>";
echo "<td>";
echo $row["original_price"];
echo "</td>";
echo "<td>";
echo $row["discount"];
echo "</td>";
echo "<td>";
echo $row["f1"].",".$row["f2"].",".$row["f3"].",".$row["f4"].",".$row["f5"];
echo "</td>";
echo "<td>";
echo $row["seller"];
echo "</td>";
echo "<td>";
echo $row["verify"];
echo "</td>";
echo "</tr>";
}
}
}

?>
</table>
</body>
	
    <!--Footer -->
  <div class="col-md-12 footer-box">
		
</div>
        
        
    <!-- /.col -->
    <div class="col-md-12 end-box ">
        &copy; 2017 | &nbsp; All Rights Reserved | &nbsp; www.sportzsTHefa.com | &nbsp; 24x7 support | &nbsp; Email us: sportzstrefa@gmail.com
    </div>
    <!-- /.col -->
    <!--Footer end -->
    <!--Core JavaScript file  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!--bootstrap JavaScript file  -->
    <script src="assets/js/bootstrap.js"></script>
    <!--Slider JavaScript file  -->
    <script src="assets/ItemSlider/js/modernizr.custom.63321.js"></script>
    <script src="assets/ItemSlider/js/jquery.catslider.js"></script>
    <script>
        $(function () {

            $('#mi-slider').catslider();

        });
		</script>
</body>
</html>