<html>
<head>
 <title>Table with database</title>
 <style>
  table {
   border-collapse: collapse;
   width: 100%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
     } 
  th {
   background-color: #588c7e;
   color: white;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
 </style>
</head>
<script>
    function payement_page()
    {
        window.open('paypage.php')
    }
    function cash()
    {
        
    }
    </script>
<body>
<h1>Customer And Room Details</h1><br>
 <table>
 <tr>
  <th>GUEST ID</th> 
  <th>AADHAR_NO</th> 
  <th>FNAME</th>
  <th>MINIT</th>
  <th>LNAME</th>
  <th>Phone Number</th>
  <th>Room Number</th>
  <th>Category</th>
 </tr>
 <?php
    $custId=$_POST['custid'];
    $conn = mysqli_connect("localhost","root","root","hotel_management_system") or die(mysql_error());
    if(!$conn){
        echo "Connection failed";
    } 
    $sql="SELECT GUEST_ID,AADHAR_NO,FNAME,MINIT,LNAME,PH_NO,ROOM_NO,CATEGORY FROM customer,room WHERE ROOM.CUSTOMER_ID=customer.GUEST_ID AND customer.GUEST_ID=$custId;";
    $query_result=mysqli_query($conn,$sql);
    if($query_result){
            // output data of each row
            while($row = $query_result->fetch_assoc()) {
             echo "<tr><td>" . $row["GUEST_ID"]. "</td><td>" . $row["AADHAR_NO"] . "</td><td>"
         . $row["FNAME"]. "</td><td>". $row["MINIT"]. "</td><td>". $row["LNAME"]. "</td><td>". $row["PH_NO"]. "</td><td>". $row["ROOM_NO"]. "</td><td>". $row["CATEGORY"]. "</td></tr>";
         }
         echo "</table>";
         }
    echo "<h1>Reservation Details</h1>";
    $sql="SELECT RESERVATION_ID,CHECKIN_DATE,CHECKOUT_DATE,PERIOD_STAY,HALL_NUMBER,ROOM_NUMBER,CATEGORY FROM reservation WHERE (reservation.GUEST_NO,reservation.ROOM_NUMBER) IN (SELECT customer.GUEST_ID,room.ROOM_NO FROM room,customer where room.CUSTOMER_ID=customer.GUEST_ID and customer.GUEST_ID=$custId);";
    $query_result=mysqli_query($conn,$sql);
    if($query_result){
        echo "<table>";
        echo "<tr><th>Reservation ID</th><th>Check-in Date</th><th>Check-out Date</th><th>Period Stay</th><th>Hall Number</th><th>Room Number</th><th>Category</th></tr>";

        while($row = $query_result->fetch_assoc()) {
            echo "<tr><td>" . $row["RESERVATION_ID"]. "</td><td>" . $row["CHECKIN_DATE"] . "</td><td>"
        . $row["CHECKOUT_DATE"]. "</td><td>". $row["PERIOD_STAY"]. "</td><td>". $row["HALL_NUMBER"]. "</td><td>". $row["ROOM_NUMBER"]. "</td><td>". $row["CATEGORY"]. "</td></tr>";
        }
        echo "</table>";
        }
    
    else{
        echo "NO RECORDS FOUND";
    }

        $sql="SELECT INVOICE_NUMBER FROM invoice where invoice.GUEST_ID=$custId;";
        $query_result=mysqli_query($conn,$sql);
        //echo $custId;
        if (mysqli_num_rows($query_result)==0)
        {
            $sql="INSERT INTO `invoice`(`STATUS`, `INVOICE_DESCRIPTION`, `GUEST_ID`) VALUES ('PAYMENT PENDING',NULL,$custId);";
            $query_result=mysqli_query($conn,$sql);
            if(!$query_result){
                echo "SOME PROBLEM";
            }
        }
        else
        {
            $row = $query_result->fetch_assoc();
            $invoiceNumber=$row['INVOICE_NUMBER'];
        }
    
        
        //echo "invoice_number".$invoiceNumber;

    
        ?>
    
    <h2>Pay Here</h2>
    
    <form method="POST" action="paying.php">
    <input type="radio" name="payment_method" value="cash">Cash<br>
            <input type="radio" name="payment_method" value="card">Credit/Debit Card<br>
            <input type='hidden' name='custID' value=<?php echo $custId ?>>
            <input type="radio" name="payment_method" value="wallets">Payment Wallets<br>
            <input type="submit" name="submit"><br>

    </form>


    
</table>
</body>
</html>



