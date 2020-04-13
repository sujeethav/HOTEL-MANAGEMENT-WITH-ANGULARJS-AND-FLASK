<?php 
$con=mysqli_connect("localhost","root","root","hotel");
$a="select fname,guest_id,room_no,checkout_date,ph_no,checkin_date from customer,reservation,room where guest_id=gst_id and gst_id=customer_id and hall_number is NULL";
$b=mysqli_query($con,$a);
?>
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
                        <a class="nav-link" href="custroom.php">
                        <span data-feather="activity"></span>
                            On-Going Room Service
                        </a>
                    </li>
                </ul>
                <hr/>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="EMPLOYEE_ADD/index.php">
                        <span data-feather="user-plus"></span>
                            Add Employee
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span data-feather="users"></span>
                            View Current Employees
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="EMPLOYEE_DELETE/delete.php">
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
      <br/>
      <div class="page-header">
          <h2>On Going Room Service</h2>
      </div>
          <hr/>
          <br/>
                <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Search</span>
                </div>
                  <input id="myInput" type="text" class="form-control-tab" placeholder="Guest Details/Room Number" aria-label="Username" aria-describedby="addon-wrapping">
                </div><br/>
                <table class="table table-striped table-hover">
                      <thead class="thead-dark">
                        <tr>
                          <th>FIRST NAME</th>
                          <th>CUSTOMER ID</th>
                          <th>PHONE NUMBER</th>
                          <th>ROOM NUMBER</th>
                          <th>CHECKIN DATE</th>
                          <th>CHECKOUT DATE</th>
                        </tr>
                      </thead>
                      <tbody id="myTable">
                        <?php 
                          while($row= mysqli_fetch_array($b,MYSQLI_ASSOC))
                          {
                          echo"<tr>
                            <td>".$row['fname']."</td>
                          <td>".$row['guest_id']."</td>
                          <td>".$row['ph_no']."</td>
                          <td>".$row['room_no']."</td>
                          <td>".$row['checkin_date']."</td>
                          <td>".$row['checkout_date']."</td>
                          </tr>";
                          }
                        ?>
                      </tbody>
                </table>
                      
    </main>
    
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="https://getbootstrap.com//docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script></body>       
</body>
</html>
