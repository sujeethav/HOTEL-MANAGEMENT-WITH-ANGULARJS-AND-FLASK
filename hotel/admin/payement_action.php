
DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<style type="text/css">
		table{
			border-collapse: collapse;
			width: 100%;
			color: #000000;
			font-family: monospace;
			font-size: 18px;
			text-align: Left;
		}
		th{
			background-color: #005f69;
			color: white;
		}
		</style>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="top-banner.jpg">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Travel</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/jquery-ui.css">				
			<link rel="stylesheet" href="css/nice-select.css">							
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">				
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>	
			<header id="header">
				<div class="header-top">
					<div class="container">
			  		<div class="row align-items-center">
			  			<div class="col-lg-6 col-sm-6 col-6 header-top-left">
			  				<ul>
			  					<li><a href="#">Visit Us</a></li>
			  					<li><a href="#">Book rooms</a></li>
			  				</ul>			
			  			</div>
			  			<div class="col-lg-6 col-sm-6 col-6 header-top-right">
							<div class="header-social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-dribbble"></i></a>
								<a href="#"><i class="fa fa-behance"></i></a>
							</div>
			  			</div>
			  		</div>			  					
					</div>
				</div>
				<div class="container main-menu">
					<div class="row align-items-center justify-content-between d-flex">
				      
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li><a href="index.php">Home</a></li>
				          <li><a href="about.php">About</a></li>
				          <li><a href="packages.php">Packages</a></li>
				          <li><a href="hotels.php">Hotels</a></li>
				          <li><a href="insurance.php">Insurance</a></li>
				          <li class="menu-has-children"><a href="">Pages</a>
				            <ul>
				            	  <li><a href="elements.php">Elements</a></li>				                		
				            </ul>
				          </li>					          					          		          
				          <li><a href="contact.php">Contact</a></li>
				        </ul>
				      </nav><!-- #nav-menu-container -->					      		  
					</div>
				</div>
			</header><!-- #header -->
			  
			<!-- start banner Area -->
			<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Tour Packages				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="packages.php"> Tour Packages</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

  

<h1>Customer And Room Details</h1><br>
 <table>
 <tr>
  <th>GUEST ID</th> 
  <th>AADHAR_NO</th> 
  <th>FNAME</th><!DOCTYPE html>          
  <th>MINIT</th>
  <th>LNAME</th>
  <th>Phone Number</th>
  <th>Room Number</th>
  <th>Category</th>
 </tr>
 <?php
    $custId=$_POST['custid'];
    $conn = mysqli_connect("localhost","root","root","hotel") or die(mysql_error());
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
    $sql="SELECT RID,CHECKIN_DATE,CHECKOUT_DATE,PERIOD_STAY,HALL_NUMBER,ROOM_NUMBER,CATEGORY FROM reservation WHERE (reservation.GST_ID,reservation.ROOM_NUMBER) IN (SELECT customer.GUEST_ID,room.ROOM_NO FROM room,customer where room.CUSTOMER_ID=customer.GUEST_ID and customer.GUEST_ID=$custId);";
    $query_result=mysqli_query($conn,$sql);
    if($query_result){
        echo "<table>";
        echo "<tr><th>Reservation ID</th><th>Check-in Date</th><th>Check-out Date</th><th>Period Stay</th><th>Hall Number</th><th>Room Number</th><th>Category</th></tr>";

        while($row = $query_result->fetch_assoc()) {
            echo "<tr><td>" . $row["RID"]. "</td><td>" . $row["CHECKIN_DATE"] . "</td><td>"
        . $row["CHECKOUT_DATE"]. "</td><td>". $row["PERIOD_STAY"]. "</td><td>". $row["HALL_NUMBER"]. "</td><td>". $row["ROOM_NUMBER"]. "</td><td>". $row["CATEGORY"]. "</td></tr>";
        }
        echo "</table>";
        }
    
    else{
        echo "NO RECORDS FOUND";
    }

        $sql="SELECT INVOICE_NUMBER FROM invoice where invoice.CUSTOMER_ID=$custId;";
        $query_result=mysqli_query($conn,$sql);
        //echo $custId;
        if (mysqli_num_rows($query_result)==0)
        {
            $sql="INSERT INTO `invoice`(`STATUS`, `INVOICE_DESCRIPTION`, `CUSTOMER_ID`) VALUES ('PAYMENT PENDING',NULL,$custId);";
            $query_result=mysqli_query($conn,$sql);
            
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



