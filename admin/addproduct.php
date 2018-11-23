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
$sports=$_POST['sports'];
$type=$_POST['type'];
$product_name=$_POST['product_name'];
$stock=$_POST['stock'];
$return_type=$_POST['returntype'];
$return_day=$_POST['returnday'];
$show_price=$_POST['show_price'];
$original_price=$_POST['original_price'];
$discount= (($original_price-$show_price)/$original_price)*100;
$f1=$_POST['f1'];
$f2=$_POST['f2'];
$f3=$_POST['f3'];
$f4=$_POST['f4'];
$f5=$_POST['f5'];

 $sizeset=$_POST["sizeset"];
 $size1=$_POST["size1"];
 $size2=$_POST["size2"];
 $size3=$_POST["size3"];
 $size4=$_POST["size4"];
 $size5=$_POST["size5"];
 $size6=$_POST["size6"];
 $size7=$_POST["size7"];
 $size8=$_POST["size8"];
 $size9=$_POST["size9"];
 $size10=$_POST["size10"];
 $seller=$_POST['seller'];
 $brand=$_POST["brand"];
$tag1=$_POST["tag1"];
$tag2=$_POST["tag2"];
$tag3=$_POST["tag3"];
$tag4=$_POST["tag4"]; 
$tag5=$_POST["tag5"];
$tag6=$_POST["tag6"];
$tag7=$_POST["tag7"];
$tag8=$_POST["tag8"];
$tag9=$_POST["tag9"];
$tag10=$_POST["tag10"];
$verify=0;
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
 
 $views=0;
 $rate=0;
		$insert="INSERT INTO product_details (sports,type,name,stock,return_type,return_day,show_price,original_price,discount,f1,f2,f3,f4,f5,sizeset,size1,size2,size3,size4,size5,size6,size7,size8,size9,size10,seller,brand,pic1,pic2,pic3,pic4,pic5,pic6,pic7,pic8,views,rate,tag1,tag2,tag3,tag4,tag5,tag6,tag7,tag8,tag9,tag10,verify) values
		('$sports','$type','$product_name','$stock','$return_type','$return_day','$show_price','$original_price','$discount','$f1','$f2','$f3','$f4','$f5','$sizeset','$size1','$size2','$size3','$size4','$size5','$size6','$size7','$size8','$size9','$size10','$seller','$brand','$pic1','$pic2','$pic3','$pic4','$pic5','$pic6','$pic7','$pic8','$views','$rate','$tag1','$tag2','$tag3','$tag4','$tag5','$tag6','$tag7','$tag8','$tag9','$tag10','$verify')";

		if(mysqli_query($connect,$insert))
		{
			$product_id=mysqli_insert_id($connect);
			
		}
	
		else
		{
			echo "error ".mysqli_error($connect);
		}
    

    

    /* free result set */
  
		
	
mysqli_close($connect);
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
<style type="text/css">
.form-style-2{
    max-width: 500px;
    padding: 20px 12px 10px 20px;
    font: 13px Arial, Helvetica, sans-serif;
}
.form-style-2-heading{
    font-weight: bold;
    font-style: italic;
    border-bottom: 2px solid #ddd;
    margin-bottom: 20px;
    font-size: 15px;
    padding-bottom: 3px;
}
.form-style-2 label{
    display: block;
    margin: 0px 0px 15px 0px;
}
.form-style-2 label > span{
    width: 100px;
    font-weight: bold;
    float: left;
    padding-top: 8px;
    padding-right: 5px;
}
.form-style-2 span.required{
    color:red;
}
.form-style-2 .tel-number-field{
    width: 40px;
    text-align: center;
}
.form-style-2 input.input-field{
    width: 48%;
    
}

.form-style-2 input.input-field, 
.form-style-2 .tel-number-field, 
.form-style-2 .textarea-field, 
 .form-style-2 .select-field{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    border: 1px solid #C2C2C2;
    box-shadow: 1px 1px 4px #EBEBEB;
    -moz-box-shadow: 1px 1px 4px #EBEBEB;
    -webkit-box-shadow: 1px 1px 4px #EBEBEB;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    padding: 7px;
    outline: none;
}
.form-style-2 .input-field:focus, 
.form-style-2 .tel-number-field:focus, 
.form-style-2 .textarea-field:focus,  
.form-style-2 .select-field:focus{
    border: 1px solid #0C0;
}
.form-style-2 .textarea-field{
    height:100px;
    width: 55%;
}
.form-style-2 input[type=submit],
.form-style-2 input[type=button]{
    border: none;
    padding: 8px 15px 8px 15px;
    background: #FF8500;
    color: #fff;
    box-shadow: 1px 1px 4px #DADADA;
    -moz-box-shadow: 1px 1px 4px #DADADA;
    -webkit-box-shadow: 1px 1px 4px #DADADA;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
}
.form-style-2 input[type=submit]:hover,
.form-style-2 input[type=button]:hover{
    background: #EA7B00;
    color: #fff;
}
</style>
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
				<a class="navbar-brand" href="admincenter.php"><strong><font size="6" >Sportz</font><font size="6" color="#FF0000">Strefa</font><font size="3">.com</strong></font></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
                    <li><a href="admincenter.php">Main Page</a></li>
               

                    
                </ul>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="container">
      
<body>
<div class="form-style-2">
<div class="form-style-2-heading">CONFIRMATION :</div>
<?php
echo $product_id;
?> 

</body>
</div>
</div>
    <!--Footer -->
  <div class="col-md-12 footer-box">
		

        
        </div>
    <!-- /.col -->
    <div class="col-md-12 end-box ">
        &copy; 2017 | &nbsp; All Rights Reserved | &nbsp; www.sportzstrefa.com | &nbsp; 24x7 support | &nbsp; Email us: sportzstrefa@gmail.com
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