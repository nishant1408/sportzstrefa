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
<div class="form-style-2-heading">Update Poster</div>
<hr>
<form action="updateposter_func.php" method="post" enctype="multipart/form-data" >



<h4>POSTER<span class="required">*</span></h4>
<br>
<label for="field2"><span>POSTER 1<span class="required">*</span></span><input type="file" class="input-field" name="image1" value="" required /></label><br>
<label for="field2"><span>POSTER DESCRIPTION 1<span class="required">*</span></span><input type="text" class="input-field" name="desc11" value="" required /></label><br>
<label for="field2"><span>POSTER DESCRIPTION 2<span class="required">*</span></span><input type="text" class="input-field" name="desc12" value="" required /></label>
<hr>
<label for="field2"><span>POSTER 2<span class="required"></span></span><input type="file" class="input-field" name="image2" value=""   /></label><br>
<label for="field2"><span>POSTER DESCRIPTION 1<span class="required"></span></span><input type="text" class="input-field" name="desc21" value="" /></label><br>
<label for="field2"><span>POSTER DESCRIPTION 2<span class="required"></span></span><input type="text" class="input-field" name="desc22" value="" /></label>
<hr>
<label for="field2"><span>POSTER POSTER 3<span class="required"></span></span><input type="file" class="input-field" name="image3" value=""   /></label><br>
<label for="field2"><span>POSTER DESCRIPTION 1<span class="required"></span></span><input type="text" class="input-field" name="desc31" value="" /></label><br>
<label for="field2"><span>POSTER DESCRIPTION 2<span class="required"></span></span><input type="text" class="input-field" name="desc32" value="" /></label>


<hr>

<label><span>&nbsp;</span><input type="submit" name="submit" value="Update Poster" /></label>
</form>
</body>
	</div>	
</div>
    <!--Footer -->
  <div class="col-md-12 footer-box">
		

        
     </div> 
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