<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
	  <style>.navbar-default {
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
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">sunrise</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="http://localhost/hotel/admin/roomreservation.php">NEW RESERVATION</a></li>

    </ul>
  </div>
</nav>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST"  id="signup-form" class="signup-form">
                        <h2 class="form-title">ADD EMPLOYEE</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="FNAME" id="name" placeholder="FNAME"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="LNAME" id="email" placeholder="LNAME"/>
                        </div>
                        <!--<div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>-->
						<div class="form-group">
                            <input type="text" class="form-input" name="GENDER" id="email" placeholder="GENDER"/>
                        </div>
						<div class="form-group">
							<label>DOB</label>
                            <input type="date" class="form-input" name="dob" id="email" placeholder="dd/mm/yyy"/>
                        </div>						
                        <!--<div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password"/>
                        </div>-->
						<div class="form-group">
                            <input type="text" class="form-input" name="SALARY" id="email" placeholder="SALARY"/>
                        </div>
						<div class="form-group">
                            <input type="text" class="form-input" name="MINIT" id="email" placeholder="MINIT"/>
                        </div>
						<div class="form-group">
                            <input type="number" class="form-input" name="phone" id="email" placeholder="phone number" required>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="registerbtn">
                        </div>
                    </form>
                    
                </div>
            </div>
        </section>

    </div>
<?php
$con=mysqli_connect("localhost","root","","hotel");
if(isset($_POST['submit']))
{
	$phone= $_POST['phone'];
	echo $_POST['phone'];
	$check="select * from employee where PHONE='$phone'";
	$result = mysqli_query($con,$check);
	$phone= $_POST['phone'];
	if(mysqli_num_rows($result) <1) {
			$current_date = date("Y-m-d H:i:s");
			$sql = "INSERT into employee (SALARY,FNAME,MINIT,LNAME,GENDER,PHONE,JOIN_DATE,DOB) VALUES ($_POST[SALARY],'$_POST[FNAME]','$_POST[MINIT]','$_POST[LNAME]','$_POST[GENDER]','$phone','$current_date','$_POST[dob]')";
			$suc=mysqli_query($con,$sql);
			if($suc){
					 echo "<script type='text/javascript'>";
					 echo "alert('success!');";
					 echo "</script>";
					 }
			else{
									 echo "<script type='text/javascript'>";
					 echo "alert('employee exists!');";
					 echo "</script>";
			}
					 
					 
	}
	else{
					 echo "<script type='text/javascript'>";
					 echo "alert('employee exists!');";
					 echo "</script>";
		
		
	}
}
?>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
