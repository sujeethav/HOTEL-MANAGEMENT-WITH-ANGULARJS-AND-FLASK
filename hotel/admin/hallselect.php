<?php 
$con=mysqli_connect("localhost","root","","hotel");
if(isset($_POST['submit']))
{
	$code=$_POST['code']; 
	$code1=$_POST['code1'];
	if($code1!="$code")
	{
	$msg="Invalide code";
	echo "<script type='text/javascript'>alert('$msg');</script>";
	}
	else
	{
							
		#$con=mysqli_connect("localhost","root","","hotel");
		
		$check="SELECT * FROM CUSTOMER WHERE PH_NO= $_POST[phone]";
		
		$result = mysqli_query($con,$check);
		#if($result){echo "<script type='text/javascript'> alert('User Already".$_POST['phone']." in Exists')</script>"; }							
		#$data = mysqli_fetch_array($rs, MYSQLI_NUM);
		if(mysqli_num_rows($result) <1) {
			 
			#echo"<div>".$_POST[gvtid]."<div>";
			$con=mysqli_connect("localhost","root","","hotel");
			#$addcust="INSERT INTO customer('AADHAR_NO','FNAME','MINIT','LNAME','PH_NO','ASTATE','CITY','COUNTRY') VALUES ('$_POST[gvtid]','$_POST[fname]','$_POST[mname]','$_POST[lname]','$_POST[phone]','$_POST[state]','$_POST[city]','$_POST[country]')";
			$addcust="INSERT INTO customer(aadhar_no,fname,minit,lname,ph_no,astate,city) VALUES ($_POST[gvtid],'$_POST[fname]','$_POST[mname]','$_POST[lname]',$_POST[phone],'$_POST[city]','$_POST[country]')";
			$s=mysqli_query($con,$addcust);
            if(!$s ) {
               die('Could not enter data: ' . mysql_error());
            }
		}

		/*else      
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

		$msg="Your code is correct"; */
	}
} 
?>



<?php  /*
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
} */
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SUNRISE HOTEL</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">ALLOT HALL</a>
            </div>
<!--
            <ul class="nav navbar-top-links navbar-right">
			
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
					
					
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul> -->
        </nav>
        <!--/. NAV TOP  -->
        <!--<nav class="navbar-default navbar-side" role="navigation"> 
        <!--    <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="settings.php"><i class="fa fa-dashboard"></i>Room Status</a>
                    </li>
					<li>
                        <a  href="room.php"><i class="fa fa-plus-circle"></i>Add Room</a>
                    </li>
                    <li>
                        <a   href="roomdel.php"><i class="fa fa-pencil-square-o"></i> Delete Room</a>
                    </li>
					

                    
            </div> -->

       <!-- </nav> 
        <!-- /. NAV SIDE  -->
       <!--
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           Available <small> Rooms</small>
                        </h1>
                    </div>
                </div> -->
                 
                                 
            <?php
						#include ('db.php');
						$checkin=date('Y-m-d',strtotime($_POST['cin']));
						$cat=$_POST['catroom'];
						#$nbeds=$_POST['nbeds'];
						$sql = "select * from convention_hall where (CUST_ID is NULL and category='$cat') or HALL_NO in(select HALL_NO from convention_hall,reservation where gst_id=cust_id and checkout_date<'$checkin' and convention_hall.category='$cat')";
						#$sql = "select ROOM_NO from room where (CUSTOMER_ID is NULL and category='Deluxe room' and NO_OF_BEDS=3) or ROOM_NO in(select ROOM_NO from room,reservation where reservation_id=customer_id and checkout_date<'2019-04-22' and room.category='Deluxe room' and NO_OF_BEDS=3)";
						$re = mysqli_query($con,$sql);
			?>
                <div class="row">
				
				
				<?php
										$guestid="select GUEST_ID from customer where PH_NO= $_POST[phone]";
										$checkin=date('Y-m-d',strtotime($_POST['cin']));
										$checkout=date('Y-m-d',strtotime($_POST['cout']));
										$res=mysqli_query($con,$guestid);
										$id=mysqli_fetch_array($res,MYSQLI_ASSOC);
										$gstid=$id['GUEST_ID'];
										while($row= mysqli_fetch_array($re,MYSQLI_ASSOC))
										{
												#$id = $row[''];
											 
											
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-shield fa-5x'></i>
															
														</div>
													                <form method='post' action='hallconfirm.php'>
																	
                    
																	
																	<input type='hidden' name='cin' value='".$checkin."'/>
																	<input type='hidden' name='cout' value='".$checkout."'/>
																	<input type='hidden' name='cat' value='".$cat."'/>
																	<input type='hidden' name='gstid' value='".$gstid."'/>
																	<input type='hidden' name='roomselect' value='".$row['HALL_NO']."'/>
																	<label>".$row['CATEGORY']."</label>
																	<label>".$row['CAPACITY']."</label>
																	<br>
																	<input type='submit' name='submit' class='btn btn-primary' value='".$row['HALL_NO']."'>
																	
																	</form>


													</div>
												</div>";
											
											
										} 
				?>
                    
                </div>
                <!-- /. ROW  -->
                
                                
                  
            
			 <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
</body>
</html>