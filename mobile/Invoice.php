<?php
require'../fpdf-1-6-es/fpdf.php';
require '../connect.php';
session_start();
if(isset($_SESSION["user_id"]))
{
	$user_id=$_SESSION["user_id"];
}
else
{
	echo "<script> location.href='mainpage.php'; </script>";
}
$id=$_GET["order_id"];
$status="";
$query = "SELECT * FROM track_order WHERE user_id='$user_id' AND id='$id' ";
	if(mysqli_query($connect, $query))
	{
		if ($result = mysqli_query($connect, $query)) {
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$status=$row["status"];
				$order_id=$row["order_id"];
				$deliveron=$row["deliveron"];
				$name=$row["name"];
				$address=$row["address"];
				$pincode=$row["pincode"];
				$city=$row["city"];
				$state=$row["state"];
				$product_name=$row["product_name"];
				$quantity=$row["quantity"];
				$size=$row["size"];
				$total=$row["total"];
				$delivery=$row["dcharge"];
				$price=$row["price"];
				$landmark=$row["landmark"];
				
			}
		}
	}
if($status != "HAS BEEN DELIVERED")
{
	echo "<script> location.href='mainpage.php'; </script>";
}
if($size=="")
	$size="NA";

//create pdf object
$pdf = new FPDF('P','mm','A4');
//add new page
$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )
$pdf->setTextColor(255,0,0);
$pdf->Cell(130 ,5,'SPORTZSTREFA',0,0);
$pdf->setTextColor(0,0,255);
$pdf->Cell(59 ,5,'INVOICE',0,1);//end of line
$pdf->setTextColor(0,0,0);
//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'346 , M.N.K. ROAD',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'KOLKATA , INDIA , 700035',0,0);
$pdf->Cell(17 ,5,'Date : ',0,0);
$pdf->Cell(42 ,5,$deliveron,0,1);//end of line

$pdf->Cell(130 ,5,'Phone : +91 9831297406',0,0);
$pdf->Cell(17 ,5,'Invoice : ',0,0);
$pdf->Cell(42 ,5,$order_id,0,1);//end of line


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->SetFont('Arial','B',12);
$pdf->Cell(94 ,5,'Billing Address',0,0);//end of line
$pdf->Cell(94 ,5,'Shipping Address',0,0);
$pdf->Cell(189 ,10,'',0,1);//end of line
//add dummy cell at beginning of each line for indentation
$pdf->SetFont('Arial','I',10);
$pdf->Cell(94 ,5,$name,0,0);
$pdf->Cell(94 ,5,$name,0,1);
$pdf->Cell(94 ,5,$address,0,0);
$pdf->Cell(94 ,5,$address,0,1);
$pdf->Cell(94 ,5,$landmark." ".$pincode,0,0);
$pdf->Cell(94 ,5,$landmark." ".$pincode,0,1);
$pdf->Cell(94 ,5,$city.' '.$state,0,0);
$pdf->Cell(94 ,5,$city.' '.$state,0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,5,'',0,1);//end of line
$pdf->SetFont('Arial','B',12);
$pdf->Cell(189 ,5,'Billing Details',0,1);//end of line
$pdf->Cell(189 ,5,'',0,1);//end of line
//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(127 ,7,'Description',1,0,'C');
$pdf->Cell(20 ,7,'Price',1,0,'C');
$pdf->Cell(21 ,7,'Quantity',1,0,'C');
$pdf->Cell(21 ,7,'Amount',1,1,'C');//end of line

$pdf->SetFont('Arial','I',10);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(127 ,20,$product_name."\nSize : ".$size,1,0,'C');
$pdf->Cell(20 ,20,$price,1,0,'C');
$pdf->Cell(21 ,20,$quantity,1,0,'C');
$pdf->Cell(21 ,20,$total,1,1,'C');//end of line

//summary


$pdf->SetFont('Arial','B',10); 
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Subtotal',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'4,450',1,1,'R');//end of line


$pdf->SetFont('Arial','B',10); 
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Taxable',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'0',1,1,'R');//end of line
$pdf->SetFont('Arial','B',10); 
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Tax Rate',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'10%',1,1,'R');//end of line
$pdf->SetFont('Arial','B',10); 
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Total Due',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'4,450',1,1,'R');//end of line

//output the result
$filename="Invoice".$order_id.".pdf";
$pdf->Output($filename,'D');

?>
