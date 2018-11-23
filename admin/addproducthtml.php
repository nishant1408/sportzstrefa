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
<div class="col-md-12" >
<div class="form-style-2">
<div class="form-style-2-heading">Add Product</div>
<hr>
<form action="addproduct.php" method="post" enctype="multipart/form-data" >

<label for="field4"><span>SPORTS : </span><select name="sports" class="select-field">
<option value="CRICKET">CRICKET</option>
<option value="FOOTBALL">FOOTBALL</option>
<option value="CYCLING">CYCLING</option>
<option value="SWIMMING">SWIMMING</option>
<option value="HOCKEY">HOCKEY</option>
<option value="BOXING">BOXING</option>
<option value="TENNIS">TENNIS</option>
<option value="SHOES">SHOES</option>
<option value="">BADMINTON</option>
</select></label>
<hr>
<label for="field4"><span>TYPE </span><select name="type" class="select-field">
<option value="CRICKET BAT">CRICKET BAT</option>
<option value="CRICKET BALL">CRICKET BALL</option>
<option value="WICKET">WICKET</option>
<option value="CRICKET SHOES">CRICKET SHOES</option>
<option value="PADS">PADS</option>
<option value="FOOTBALL">FOOTBALL</option>
<option value="FOOTBALL SHOES">FOOTBALL SHOES</option>
<option value="CYCLE">CYCLE</option>
<option value="CYCLING KIT">CYCLING KIT</option>
<option value="HOCKEY BAT">HOCKET BAT</option>
<option value="HOCKEY BALL">HOCKEY BALL</option>
<option value="GOOGLES">GOOGLES</option>
<option value="JERSEY">JERSEY</option>
<option value="PUNCHING BAGS">PUNCHING BAGS</OPTION>
<option value="GLOVES">GLOVES</option>
<option value="SPEED BAG">SPEED BAG</option>
<option value="PROTECTIVE EQUIPMENT">PROTECTIVE EQUIPMENT</OPTION>
<option value="TENNIS RACQUET">TENNIS RACQUET</option>
<option value="TENNIS STRING">TENNIS STRING</option>
<option value="TENNIS BALL">TENNIS BALL</option>
<option value="RUNNING SHOES">RUNNING SHOES</option>
<option value="CASUAL SHOES">CASUAL SHOES</option>
<option value="KIT BAG">KIT BAG</option>
<option value="OTHERS">OTHERS</option>
</select></label>
<hr>
<label for="field2"><span>PRODUCT NAME<span class="required">*</span></span><input type="text" class="input-field" name="product_name" value="" required ></label>
<hr>
<label for="field2"><span>TAG 1<span class="required">*</span></span><input type="text" class="input-field" name="tag1" value="" ></label>
<label for="field2"><span>TAG 2<span class="required">*</span></span><input type="text" class="input-field" name="tag2" value="" ></label>
<label for="field2"><span>TAG 3<span class="required">*</span></span><input type="text" class="input-field" name="tag3" value="" ></label>
<label for="field2"><span>TAG 4<span class="required">*</span></span><input type="text" class="input-field" name="tag4" value=""  ></label>
<label for="field2"><span>TAG 5<span class="required">*</span></span><input type="text" class="input-field" name="tag5" value=""  ></label>
<label for="field2"><span>TAG 6<span class="required">*</span></span><input type="text" class="input-field" name="tag6" value=""  ></label>
<label for="field2"><span>TAG 7<span class="required">*</span></span><input type="text" class="input-field" name="tag7" value=""  ></label>
<label for="field2"><span>TAG 8<span class="required">*</span></span><input type="text" class="input-field" name="tag8" value=""  ></label>
<label for="field2"><span>TAG 9<span class="required">*</span></span><input type="text" class="input-field" name="tag9" value=""  ></label>
<label for="field2"><span>TAG 10<span class="required">*</span></span><input type="text" class="input-field" name="tag10" value=""  ></label>
<hr>
<label for="field2"><span>STOCK<span class="required">*</span></span><input type="number" class="input-field" name="stock" value="" required /></label>
<hr>
<label for="field4"><span>RETURN TYPE</span><select name="returntype" class="select-field">
<option value="YES">YES</option>
<option value="NO">NO</option>
</select>
<label for="field2"><span>RETURN DAY<span class="required">*</span></span><input type="number" class="input-field" name="returnday" value="" required /></label>
</label>
<hr>
<h4>PRODUCT IMAGES<span class="required">*</span></h4>
<br>
<label for="field2"><span>1<span class="required">*</span></span><input type="file" class="input-field" name="image1" value="" required /></label>
<label for="field2"><span>2<span class="required"></span></span><input type="file" class="input-field" name="image2" value=""   /></label>
<label for="field2"><span>3<span class="required"></span></span><input type="file" class="input-field" name="image3" value=""  /></label>
<label for="field2"><span>4<span class="required"></span></span><input type="file" class="input-field" name="image4" value=""  /></label>
<label for="field2"><span>5<span class="required"></span></span><input type="file" class="input-field" name="image5" value=""  /></label>
<label for="field2"><span>6<span class="required"></span></span><input type="file" class="input-field" name="image6" value=""  /></label>
<label for="field2"><span>7<span class="required"></span></span><input type="file" class="input-field" name="image7" value=""  /></label>
<label for="field2"><span>8<span class="required"></span></span><input type="file" class="input-field" name="image8" value=""  /></label>
<HR>
<label for="field2"><span>DISPLAY PRICE<span class="required">*</span></span><input type="text" class="input-field" name="show_price" value="" required /></label>
<label for="field2"><span>ORIGINAL PRICE<span class="required">*</span></span><input type="text" class="input-field" name="original_price" value="" required /></label>

<hr>
<label for="field4"><span>SIZE SET</span><select name="sizeset" class="select-field">
<option value="1">YES</option>
<option value="0">NO</option>
</select>
<label for="field2"><span>SIZE 1<span class="required">*</span></span><input type="text" class="input-field" name="size1" value=""  /></label>
<label for="field2"><span>SIZE 2<span class="required">*</span></span><input type="text" class="input-field" name="size2" value=""  /></label>
<label for="field2"><span>SIZE 3<span class="required">*</span></span><input type="text" class="input-field" name="size3" value="" /></label>
<label for="field2"><span>SIZE 4<span class="required">*</span></span><input type="text" class="input-field" name="size4" value=""  /></label>
<label for="field2"><span>SIZE 5<span class="required">*</span></span><input type="text" class="input-field" name="size5" value=""  /></label>
<label for="field2"><span>SIZE 6<span class="required">*</span></span><input type="text" class="input-field" name="size6" value=""  /></label>
<label for="field2"><span>SIZE 7<span class="required">*</span></span><input type="text" class="input-field" name="size7" value=""  /></label>
<label for="field2"><span>SIZE 8<span class="required">*</span></span><input type="text" class="input-field" name="size8" value=""  /></label>
<label for="field2"><span>SIZE 9<span class="required">*</span></span><input type="text" class="input-field" name="size9" value=""  /></label>
<label for="field2"><span>SIZE 10<span class="required">*</span></span><input type="text" class="input-field" name="size10" value=""  /></label>
<hr>
<h3>FEATURES</h3>
<br>
<label for="field2"><span>1<span class="required">*</span></span><input type="text" class="input-field" name="f1" value="" required /></label>
<label for="field2"><span>2<span class="required">*</span></span><input type="text" class="input-field" name="f2" value=""  /></label>
<label for="field2"><span>3<span class="required">*</span></span><input type="text" class="input-field" name="f3" value="" /></label>
<label for="field2"><span>4<span class=""></span></span><input type="text" class="input-field" name="f4" value="" /></label>
<label for="field2"><span>5<span class=""></span></span><input type="text" class="input-field" name="f5" value="" /></label>
<hr>
<label for="field2"><span>SELLER<span class="">*</span></span><input type="text" class="input-field" name="seller" value="" required /></label>
<hr>
<label for="field2"><span>BRAND<span class="">*</span></span><input type="text" class="input-field" name="brand" value="" required /></label>
<hr>
<h3>GENERAL INFORMATION</h3>
<br>
<label for="field2"><input type="text" class="input-field" name="g1" value="" placeholder="GENERAL PROPERTY 1"/></label>
<label for="field2"><input type="text" class="input-field" name="i1" value="" placeholder="INFORMATION 1"/></label>
<br>
<label for="field2"><input type="text" class="input-field" name="g2" value="" placeholder="GENERAL PROPERTY 2"/></label>
<label for="field2"><input type="text" class="input-field" name="i2" value="" placeholder="INFORMATION 2"/></label>
<br>
<label for="field2"><input type="text" class="input-field" name="g3" value="" placeholder="GENERAL PROPERTY 3"/></label>
<label for="field2"><input type="text" class="input-field" name="i3" value="" placeholder="INFORMATION 3"/></label>
<br>
<label for="field2"><input type="text" class="input-field" name="g4" value="" placeholder="GENERAL PROPERTY 4"/></label>
<label for="field2"><input type="text" class="input-field" name="i4" value="" placeholder="INFORMATION 4"/></label>
<br>
<label for="field2"><input type="text" class="input-field" name="g5" value="" placeholder="GENERAL PROPERTY 5"/></label>
<label for="field2"><input type="text" class="input-field" name="i5" value="" placeholder="INFORMATION 5"/></label>
<br>
<label for="field2"><input type="text" class="input-field" name="g6" value="" placeholder="GENERAL PROPERTY 6"/></label>
<label for="field2"><input type="text" class="input-field" name="i6" value="" placeholder="INFORMATION 6"/></label>
<br>
<label for="field2"><input type="text" class="input-field" name="g7" value="" placeholder="GENERAL PROPERTY 7"/></label>
<label for="field2"><input type="text" class="input-field" name="i7" value="" placeholder="INFORMATION 7"/></label>
<br>
<label for="field2"><input type="text" class="input-field" name="g8" value="" placeholder="GENERAL PROPERTY 8"/></label>
<label for="field2"><input type="text" class="input-field" name="i8" value="" placeholder="INFORMATION 8"/></label>
<br>
<label for="field2"><input type="text" class="input-field" name="g9" value="" placeholder="GENERAL PROPERTY 9"/></label>
<label for="field2"><input type="text" class="input-field" name="i9" value="" placeholder="INFORMATION 9"/></label>
<br>
<label for="field2"><input type="text" class="input-field" name="g10" value="" placeholder="GENERAL PROPERTY 10"/></label>
<label for="field2"><input type="text" class="input-field" name="i10" value="" placeholder="INFORMATION 10"/></label>
<br>

<hr>
<h3>PRODUCT DETAILS</h3>
<br>
<label for="field2"><input type="text" class="input-field" name="p1" value="" placeholder="PRODUCT PROPERTY 1"/></label>
<label for="field2"><input type="text" class="input-field" name="pi1" value="" placeholder="PRODUCT DETAILS 1"/></label>
<br>
<label for="field2"><input type="text" class="input-field" name="p2" value="" placeholder="PRODUCT PROPERTY 2"/></label>
<label for="field2"><input type="text" class="input-field" name="pi2" value="" placeholder="PRODUCT DETAILS 2"/></label>
<br>
<label for="field2"><input type="text" class="input-field" name="p3" value="" placeholder="PRODUCT PROPERTY 3"/></label>
<label for="field2"><input type="text" class="input-field" name="pi3" value="" placeholder="PRODUCT DETAILS 3"/></label>
<br>
<label for="field2"><input type="text" class="input-field" name="p4" value="" placeholder="PRODUCT PROPERTY 4"/></label>
<label for="field2"><input type="text" class="input-field" name="pi4" value="" placeholder="PRODUCT DETAILS 4"/></label>
<br>
<label for="field2"><input type="text" class="input-field" name="p5" value="" placeholder="PRODUCT PROPERTY 5"/></label>
<label for="field2"><input type="text" class="input-field" name="pi5" value="" placeholder="PRODUCT DETAILS 5"/></label>
<br>
<label for="field2"><input type="text" class="input-field" name="p6" value="" placeholder="PRODUCT PROPERTY 6"/></label>
<label for="field2"><input type="text" class="input-field" name="pi6" value="" placeholder="PRODUCT DETAILS 6"/></label>
<br>
<label for="field2"><input type="text" class="input-field" name="p7" value="" placeholder="PRODUCT PROPERTY 7"/></label>
<label for="field2"><input type="text" class="input-field" name="pi7" value="" placeholder="PRODUCT DETAILS 7"/></label>
<br>
<label for="field2"><input type="text" class="input-field" name="p8" value="" placeholder="PRODUCT PROPERTY 8"/></label>
<label for="field2"><input type="text" class="input-field" name="pi8" value="" placeholder="PRODUCT DETAILS 8"/></label>
<br>
<label for="field2"><input type="text" class="input-field" name="p9" value="" placeholder="PRODUCT PROPERTY 9"/></label>
<label for="field2"><input type="text" class="input-field" name="pi9" value="" placeholder="PRODUCT DETAILS 9"/></label>
<br>
<label for="field2"><input type="text" class="input-field" name="p10" value="" placeholder="PRODUCT PROPERTY 10"/></label>
<label for="field2"><input type="text" class="input-field" name="pi10" value="" placeholder="PRODUCT DETAILS 10"/></label>
<br>

<hr>

<label><span>&nbsp;</span><input type="submit" name="submit" value="Add Product" /></label>
</form>
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
</div>
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