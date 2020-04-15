<!DOCTYPE html>
<html>
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">

        <title>Current Room Service</title>
        <link rel="icon" href="web-icon/favicon.ico" type="image/icon type">

        <!-- Bootstrap core CSS -->
        <link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>





  <style>
  .navbar-default {
  background-color: #0B235A;
  background-image: none;
  background-repeat: no-repeat;
 } 
 .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}

 </style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

  <script>
	function homepage()
	{
		window.open('roomreservation.php')
	}
	
  </script>
  <link href="dash.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
          <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Sunrise Hotels</a>
              <ul class="navbar-nav px-3">
                  <li class="nav-item text-nowrap">
                      <a class="nav-link" href="#">Sign out</a>
                  </li>
              </ul>
      </nav>
      <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                        <span data-feather="home"></span>
                        Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="roomreservation.php">
                        <span data-feather="plus-square"></span>
                        Room Reservation
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="custroom.html">
                        <span data-feather="activity"></span>
                            On-Going Room Service
                        </a>
                    </li>
                </ul>
                <hr/>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="employee_add.html">
                        <span data-feather="user-plus"></span>
                            Add Employee
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cur_employees.html">
                        <span data-feather="users"></span>
                            View Current Employees
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="employee_delete.html">
                        <span data-feather="user-minus"></span>
                            Remove Employees
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="payement.php">
                        <span data-feather="credit-card"></span>
                            Make Payment
                        </a>
                    </li>
                </ul>
                <hr/>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="stats.php">
                        <span data-feather="bar-chart-2"></span>
                            View Stats
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://127.0.0.1:5000/wt2/graph">
                        <span data-feather="bar-chart-2"></span>
                            Analytics
                        </a>
                    </li>
                </ul>
                </div>
            </nav>
        </div>
    </div>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <!--PAGE CONETENT HERE!!!!-->

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
	echo mysqli_error($conn); 
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
        echo "<form action='wallet.php' method='POST'><input type='text' placeholder='Paytm Number' name='paid_number'><br><input type='text' name='payee_name' placeholder='Bill in the name of'><br><br><input type='submit' name='submit'><br>";
        echo"<div class='form-group'><input type='hidden' name='custID' value=".$custId."><input type='hidden' name='total_amt' value=".$total_amt."><input type='hidden' name='inv' value=".$invoiceNumber."></div>";
        echo"<input type='submit' name='submit' class='btn btn-default'>";
        echo"</form>";
    }

    
    ?>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="https://getbootstrap.com//docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script>
	</body>
</html>