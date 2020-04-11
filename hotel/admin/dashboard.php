<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    
    <title>Sunrise Dashboard</title>
    <link rel="icon" href="web-icon/favicon.ico" type="image/icon type">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/dashboard/">

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Custom styles for this template -->
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
    </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <div class="page-header">
        <h3>Main Dashboard</h3>
    </div>  
        <div class="btn-toolbar mb-2 mb-md-0">
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>
      <br/><br/>
      <div class="row">
        <div class="col-md-6">
          <iframe src="https://calendar.google.com/calendar/embed?height=400&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FKolkata&amp;src=Y2xhc3Nyb29tMTE3MzMxMzgyNDk4MzU3NDUxMjk0QGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%230B8043&amp;showTitle=0&amp;showNav=1&amp;showDate=1&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0" style="border:solid 1px #777" width="600" height="400" frameborder="0" scrolling="no"></iframe>
        </div>
        <div class="col-md-6">
        <table class="table table-striped table-hover">
                      <thead class="thead-dark">
                        <tr>
                          <th>TYPE OF ROOM/HALL</th>
                          <th>COST PER NIGHT</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Superior Room</td>
                          <td>Rs. 1400</td>
                        </tr>
                        <tr>
                          <td>Deluxe Room</td>
                          <td>Rs. 1000</td>
                        </tr>
                        <tr>
                          <td>Guest House</td>
                          <td>Rs. 2500</td>
                        </tr>
                        <tr>
                          <td>Single Room</td>
                          <td>Rs. 850</td>
                        </tr>
                        <tr>
                          <td>Big Convention Hall</td>
                          <td>Rs. 7500</td>
                        </tr>
                        <tr>
                          <td>Small Convention Hall</td>
                          <td>Rs. 3900</td>
                        </tr>
                      </tbody>
          </table>
      </div>
      </div>
    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="https://getbootstrap.com//docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script></body>
</html>
