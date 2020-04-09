<?php
    if(isset($_POST['submit']))
    {
        $payment_method=$_POST['payment_method'];
        $custId=$_POST['custID'];
    }
    $conn = mysqli_connect("localhost","root","","hotel_management_system") or die(mysql_error());
    if(!$conn){
        echo "Error:Connection failed";
    } 
    $sql="SELECT INVOICE_NUMBER FROM invoice where invoice.GUEST_ID=$custId;";
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
    $sql="SELECT PERIOD_STAY,CATEGORY FROM reservation WHERE reservation.GUEST_NO=$custId;";
    $query_result=mysqli_query($conn,$sql);
    $row = $query_result->fetch_assoc();
    $durationStay=$row['PERIOD_STAY'];
    $category=$row['CATEGORY'];
    $sql="SELECT PRICE_PER_DAY FROM price_list WHERE CATEGORY='$category';";
    $query_result=mysqli_query($conn,$sql);
    $row = $query_result->fetch_assoc();
    $price_per_day=$row['PRICE_PER_DAY'];
    $total_amt=$price_per_day*$durationStay;
    echo "<table><tr><th>Category</th><th>Period Of Stay</th><th>Cost Per Day</th><th>Total Cost</th></tr><tr><td>$category</td><td>$durationStay</td><td>$$price_per_day</td><td>$$total_amt</td></tr></table>";
    echo "<br><br>";
    if($payment_method=="cash")
    {
        echo "<form action='cash.php' method='POST'><input type='text' placeholder='Amount Given' name='money_given'><br><input type='text' name='payee_name' placeholder='Bill in the name of'><br><br><input type='submit' name='submit'><br><input type='hidden' name='custID' value=".$custId."><input type='hidden' name='total_amt' value=".$total_amt."><input type='hidden' name='inv' value=".$invoiceNumber."></form>";
        
    }
    else if($payment_method=='card')
    {
        echo "<form action='card.php'><input type='text' placeholder='Card Number' name='card_number'><br><input type='text' placeholder='CVV' name='cvv'><br><input type='date' placeholder='Expiry Date' name='expiry_date'><br><input type='text' name='payee_name' placeholder='Name on Card'><br><input type='submit' name='submit'><br></form>";
    }
    else if($payment_method=="wallets")
    {
        echo "<form action='wallet.php' method='POST'><input type='text' placeholder='Paytm Number' name='paid_number'><br><input type='text' name='payee_name' placeholder='Bill in the name of'><br><br><input type='submit' name='submit'><br></form>";
    }

    
    ?>