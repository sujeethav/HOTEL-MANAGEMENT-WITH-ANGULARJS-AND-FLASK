<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">

        <title>Room Reservation</title>
        <link rel="icon" href="web-icon/favicon.ico" type="image/icon type">
         <!-- Bootstrap core CSS -->
         <link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
         <link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Custom styles for this template -->
        <link href="dash.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="main_page.html">Sunrise Hotels</a>
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
                </ul>
                <hr/>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="stats.php">
                        <span data-feather="bar-chart-2"></span>
                            View Stats
                        </a>
                    </li>
                </ul>
                </div>
            </nav>
        </div>
    </div>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <br/>  
    <div class="page-header">
        <h3>Room Reservation</h3>
    </div>
    <hr/>
    <br/>
    <div class="row">
    <div class="col-md-6" >
        <form name="form" action="roomselect.php" method="post">
        <div class="panel panel-default" style="height:fit-content;width:100%;background-color:rgb(220,220,220);">
            <div class="panel-heading"><b>Guest Details</b></div>
                <div class="panel-body">
					<div class="form-group">
                        <label>First Name</label>
                            <input name="fname" type="text" class="form-control" required>                        
                    </div>
					<div class="form-group">
                        <label>Middle Name</label>
                            <input name="mname" type="text" class="form-control" required>                
                    </div>
				    <div class="form-group">
                        <label>Last Name</label>
                            <input name="lname" type="text" class="form-control" required>          
                    </div>							   
					<div class="form-group">
                        <label>Govt. ID Number</label>
                            <input name="gvtid" type="number" class="form-control" required>              
                    </div>
					<div class="form-group">
                        <label>Country</label>
                            <input name="country" type ="text" class="form-control" required>                
                    </div>								
					<div class="form-group">
                        <label>Phone Number</label>
                            <input name="phone" type ="text" class="form-control" required>          
                     </div>  
					<div class="form-group">
                        <label>State</label>
                            <input name="state" type="text" class="form-control" required>    
                    </div>
					<div class="form-group">
                        <label>City</label>
                            <input name="city" type="text" class="form-control" required>        
                    </div>		
                </div>
            </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default" style="height:fit-content;width:100%;background-color:rgb(220,220,220)">
            <div class="panel-heading"><b>Room Reservation Details</b></div>    
                <div class="panel-body">
                    <div class="form-group">
                        <label>Type Of Room *</label>
                            <select name="catroom"  class="form-control" required>
							<option value selected ></option>
                            <option value="Superior room">SUPERIOR ROOM</option>
                            <option value="Deluxe room">DELUXE ROOM</option>
							<option value="Guest house">GUEST HOUSE</option>
							<option value="Single room">SINGLE ROOM</option>
                            </select>
                    </div>
					<div class="form-group">
                                <label>No.of beds *</label>
								<input name="nbeds" type ="text" class="form-control" required>
                    </div>
					<div class="form-group">
                                <label>Check-In</label>
                                <input name="cin" type ="date" class="form-control">            
                    </div>
					<div class="form-group">
                                <label>Check-Out</label>
                                <input name="cout" type ="date" class="form-control">            
                    </div>
                    <br/>
                    <hr>
                    <div class="form-group">
                        <h4>HUMAN VERIFICATION</h4>
                            <p>Type Below this code <h3 class="unselectable" style="border-style:solid;width:fit-content;text-shadow: 0 0 5px rgba(0,0,0,1);opacity:0.39;color:black;"><i><strike><?php $Random_code=rand(); echo$Random_code; ?></strike> </i></h3></p>
                                <input  type="text" name="code1" title="random code" />
                                <input type="hidden" name="code" value="<?php echo $Random_code; ?>" /><br/><br/>
                            <input type="submit" name="submit" class="btn btn-primary"> 
                    </div>
    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="https://getbootstrap.com//docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script></body>            
</body>
</html>