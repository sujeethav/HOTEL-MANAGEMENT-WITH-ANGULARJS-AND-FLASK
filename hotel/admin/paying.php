<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>CATEGORY</th>
        <th>PERIOD OF STAY</th>
        <th>COST_PER DAY</th>
		<th>TOTAL_COST</th>
      </tr>
    </thead>
    <tbody>
<?php
    if(isset($_POST['submit']))
    {
        $payment_method=$_POST['payment_method'];
        $custId=$_POST['custID'];
    }
    $conn = mysqli_connect("localhost","root","root","hotel") or die(mysql_error());
    if(!$conn){
        echo "Error:Connection failed";
    } 
    $sql="SELECT INVOICE_NUMBER FROM invoice where invoice.CUSTOMER_ID=$custId;";
    $query_result=mysqli_query($conn,$sql);
    $row = $query_result->fetch_assoc();
    $invoiceNumber=$row['INVOICE_NUMBER'];
    //echo "Invoice Number: ".$invoiceNumber."Guest ID: ".$custId."Payement Method: ".$payment_method;
    $currentDate=date("Y-m-d H:i:s");
    //echo $currentDate;
    $sql="INSERT INTO `payment`(`GUEST_NUM`, `PAY_DATE`, `INVOICE_NUMBER`, `PAYMENT_METHODS`) VALUES ($custId,'$currentDate',$invoiceNumber,'$payment_method');";
    $query_result=mysqli_query($conn,$sql);
    //echo mysqli_error($conn);
    if(!$query_result)
    {
        echo "SOME PROBLEM";
    }
    echo "<h3>BILL</h3>";
    $sql="SELECT PERIOD_STAY,CATEGORY FROM reservation WHERE reservation.GST_ID=$custId;";
    $query_result=mysqli_query($conn,$sql);
    $row = $query_result->fetch_assoc();
    $durationStay=$row['PERIOD_STAY'];
    $category=$row['CATEGORY'];
    $sql="SELECT PRICE_PER_DAY FROM price_list WHERE CATEGORY='$category';";
    $query_result=mysqli_query($conn,$sql);
    $row = $query_result->fetch_assoc();
    $price_per_day=$row['PRICE_PER_DAY'];
	$sql="SELECT VISIT FROM CUSTOMER WHERE GUEST_ID=$custId";
	$query_result=mysqli_query($conn,$sql);
    $row = $query_result->fetch_assoc();
	$visits=$row['VISIT'];
	$total_amt=$price_per_day*$durationStay;
	if($visits>5)
	{
		$total_amt=$total_amt-(0.25*$total_amt);
	}
	else if($visits>15)
	{
		$total_amt=$total_amt-(0.35*$total_amt);
	}
	
	
    
    echo "<tr><td>$category</td><td>$durationStay</td><td>$$price_per_day</td><td>$$total_amt</td></tr>";
    echo "</tbody></table></div>";
    if($payment_method=="cash")
    {
		echo"<div class='container'><h2>ENTER THE FOLLOWING DETAILS</h2><p></p>";
        echo "  <form class='form-inline' action='cash.php' method='POST'><div class='form-group'><label for='email'>AMOUNT GIVEN    </label><input type='text' class='form-control' id='email' placeholder='Amount given' name='money_given'></div>";
		echo"<div class='form-group'><label for='pwd'>IN THE NAME OF:    </label><input type='text' class='form-control' id='pwd' placeholder='on the name of' name='payee_name'></div>";
		echo"<div class='form-group'><input type='hidden' name='custID' value=".$custId."><input type='hidden' name='total_amt' value=".$total_amt."><input type='hidden' name='inv' value=".$invoiceNumber."></div>";
		echo"<input type='submit' name='submit' class='btn btn-default'>";
        echo"</form></div>";
    }
    else if($payment_method=='card')
    {
        echo"<form action='card.php' method='POST'><input type='text' placeholder='Card Number' name='card_number'><br><input type='text' placeholder='CVV' name='cvv'><br><input type='date' placeholder='Expiry Date' name='expiry_date'><br><input type='text' name='payee_name' placeholder='Name on Card'><br>";
        echo"<div class='form-group'><input type='hidden' name='custID' value=".$custId."><input type='hidden' name='total_amt' value=".$total_amt."><input type='hidden' name='inv' value=".$invoiceNumber."></div>";
        echo"<input type='submit' name='submit' class='btn btn-default'>";
        echo"</form>";
    }
    else if($payment_method=="wallets")
    {
        echo "<form action='wallet.php' method='POST'><input type='text' placeholder='Paytm Number' name='paid_number'><br><input type='text' name='payee_name' placeholder='Bill in the name of'><br><br><input type='submit' name='submit'><br></form>";
    }

    
    ?>
	</body>
</html>