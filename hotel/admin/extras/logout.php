<?php
session_start();
unset($_SESSION["user"]);
header("location:index.php");
?>

						<?php 
							if(isset($_POST['submit']))
							{
							$code1=$_POST['code1'];
							$code=$_POST['code']; 
							if($code1!="$code")
							{
							$msg="Invalide code"; 
							}
							else
							{
							
									$con=mysqli_connect("localhost","root","root","hotel");
									$check="SELECT * FROM CUSTOMER WHERE PH_NO= '$_POST[phone]'";
									$result = mysqli_query($con,$check);
									
									$data = mysqli_fetch_array($rs, MYSQLI_NUM);
									if(mysqli_num_rows($result) <1) {
										/* echo "<script type='text/javascript'> alert('User Already in Exists')</script>"; */
										$addcust="INSERT INTO 'customer'('aadhar_no','fname','minit','lname','ph_no','astate','city') VALUES ('$_POST[gvtid]','$_POST[fname]','$_POST[mname]','$_POST[lname]','$_POST[phone]','$_POST[state]','$_POST[city]');"
										mysqli_query($con,$addcust);
									}

									else
									{
										$new ="Not Conform";
										$newUser="INSERT INTO `roombook`(`Title`, `FName`, `LName`, `Email`, `National`, `Country`, `Phone`, `TRoom`, `Bed`, `NRoom`, `Meal`, `cin`, `cout`,`stat`,`nodays`) VALUES ('$_POST[title]','$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[nation]','$_POST[country]','$_POST[phone]','$_POST[troom]','$_POST[bed]','$_POST[nroom]','$_POST[meal]','$_POST[cin]','$_POST[cout]','$new',datediff('$_POST[cout]','$_POST[cin]'))";
										if (mysqli_query($con,$newUser))
										{
											echo "<script type='text/javascript'> alert('Your Booking application has been sent')</script>";
											
										}
										else
										{
											echo "<script type='text/javascript'> alert('Error adding user in database')</script>";
											
										}
									}

							$msg="Your code is correct";
							}
							}
							?>