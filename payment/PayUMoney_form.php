<?php
session_start();
$user_id=$_SESSION["user_id"];
$quantity=$_SESSION["quantity"];
	$product_name=$_SESSION["product_name"];
	$order_num=$_SESSION["order_num"];
	$product_id=$_SESSION["product_id"];
	$pincode=$_SESSION["pincode"];
	$size=$_SESSION["size"];
	$name=$_SESSION["name"];
	$mobile=$_SESSION["mobile"];
	$address=$_SESSION["address"];
	$landmark=$_SESSION["landmark"];
	$code=$_SESSION["code"];
	$email=$_SESSION["email"];
	$city=$_SESSION["city"];
	$state=$_SESSION["state"];
	$status="ORDER PLACED";
	$payment=$_SESSION["payment"];
	$return_day=$_SESSION["return_day"];
	$price=$_SESSION["price"];
	$delivery=$_SESSION["delivery"];
	$total=$_SESSION["total"];
	$wallet=$_SESSION["wallet"];
	$amount=$_SESSION["amount"];
	$discount=0;

$surl='http://sportstrefa.tk/payment/success.php';
$furl='http://sportstrefa.tk/payment/failure.php';
$MERCHANT_KEY = "JfrU55Dc";
$SALT = "JvRzxIXuqJ";
// Merchant Key and Salt as provided by Payu.

$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
	
  </script>
  </head>
  <body onload="document.forms['payuForm'].submit()">
    <p>YOU WILL BE REDIRECTED TO THE PAYMENT PAGE IN 10 SECONDS PLEASE BE PATIENT.....
    <br/>
    <?php if($formError) { ?>
	
      
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm" id="submitform">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <table>
        <tr>
          
        </tr>
        <tr>
          
          <input name="amount" type="hidden" value="<?=$amount?>" /></td>
          
          <td><input name="firstname" type="hidden" id="firstname" value="<?=$name?>" /></td>
        </tr>
        <tr>
         
          <td><input name="email" type="hidden" id="email" value="<?=$email?>" /></td>
          
          <td><input name="phone" type="hidden" value="<?=$mobile?>" /></td>
        </tr>
        <tr>
          
          <td colspan="3"><input name="productinfo" type="hidden" value="<?=$user_id?>"></td>
        </tr>
        <tr>
         
          <td colspan="3"><input name="surl" type="hidden" value="<?=$surl?>" size="64" /></td>
        </tr>
        <tr>
          
          <td colspan="3"><input name="furl" type="hidden" value="<?=$furl?>" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>

        
          <?php if(!$hash) { ?>
            
<?php }   ?>
        </tr>
      </table>
    </form>
  </body>
</html>
