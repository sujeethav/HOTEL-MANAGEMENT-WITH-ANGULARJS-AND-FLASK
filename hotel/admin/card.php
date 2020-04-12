<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script>
	function homepage()
	{
		window.open('roomreservation.php')
	}
	
  </script>
</head>
<body>
<div class="container">
  <<h1 align='center'>SUNRISE HOTEL</h1>
          
  <table class="table table-striped">
    
	<tbody>
  <?php
    
    $payee_name=$_POST['payee_name'];
    $custID=$_POST['custID'];
    $total_amt=$_POST['total_amt'];
    $invoice_number=$_POST['inv'];
    
    
    echo $payee_name.$custID.$total_amt;
    $conn = mysqli_connect("localhost","root","root","hotel") or die(mysql_error());
    if(!$conn){
        echo "Error:Connection failed";
    }
   
    $sql="SELECT * FROM customer WHERE GUEST_ID=$custID";
    $query_result=mysqli_query($conn,$sql);
	  echo mysqli_error($conn); 
    $row = $query_result->fetch_assoc();
    $ph_nooo=$row['PH_NO'];
	  echo "hi".$ph_nooo;
    #echo $ph_nooo;
    $date=date("Y-m-d");
    #echo "CUST: ".$custID;
    $sql="INSERT INTO `bill`(`AMOUNT`, `NAME`, `DATE`, `PH_NO`, `CUSTOMER_ID`) VALUES ($total_amt,'$payee_name','$date',".$ph_nooo.",$custID)";
    $query_result=mysqli_query($conn,$sql);
    echo mysqli_error($conn);	
    if($query_result)
    {
        $sql=" UPDATE `invoice` `STATUS`='PAYEMENT SUCCESFUL' WHERE `INVOICE_NUMBER`=$invoice_number;";
        $query_result=mysqli_query($conn,$sql);
        $sql="SELECT `FNAME`, `MINIT`, `LNAME` FROM `customer` WHERE `GUEST_ID`=$custID;";
        $query_result=mysqli_query($conn,$sql);
        $row = $query_result->fetch_assoc();
        $FNAME=$row['FNAME'];
        $MINIT=$row['MINIT'];
        $LNAME=$row['LNAME'];
        $name=$FNAME." ".$MINIT." ".$LNAME;
        $sql="SELECT  `CHECKIN_DATE`, `CHECKOUT_DATE`, `PERIOD_STAY`,`CATEGORY` FROM `reservation` WHERE GST_ID=$custID";
        $query_result=mysqli_query($conn,$sql);
        $row = $query_result->fetch_assoc();
        $checkindate=$row['CHECKIN_DATE'];
        $checkoutdate=$row['CHECKOUT_DATE'];
        $periodstay=$row['PERIOD_STAY'];
        $category=$row['CATEGORY'];
        $sql="SELECT BILL_ID FROM bill WHERE CUSTOMER_ID=$custID";
        $query_result=mysqli_query($conn,$sql);
        $row = $query_result->fetch_assoc();
        $bill_id=$row['BILL_ID'];
		$sqlq="UPDATE `room` SET `CUSTOMER_ID`=NULL WHERE room.CUSTOMER_ID=$custID";
		$query_rresult=mysqli_query($conn,$sqlq);
		$sql="DELETE FROM reservation where GST_ID=$custID";
		$query_result=mysqli_query($conn,$sql);
        echo "<tr><td>Guest Name: </td><td><b>".$name."</b></td></tr><tr><td>Phone Number: </td><td>".$ph_nooo."</td></tr><tr><td>Customer ID: </td><td>".$custID."</td></tr><tr><td>Bill Number: </td><td>".$bill_id."</td></tr><tr></tr><tr><td>Category: </td><td>".$category."</td></tr><tr><td>Duration Of Stay: </td><td>".$periodstay."</td></tr><tr><td>Bill Amount: </td><td>$". $total_amt."</td></tr><tr><td>Change Returned: </td><td>$". $change."</td></tr>";
    }
    else
    {
        echo "Payement Failed";
    }
?>
</tbody>
  </table>
 <button onclick=homepage()>Home Page</button>
</div>

</body>