<?php
  session_start();
  include "db.php";
  if(!isset($_SESSION['userId'])){
    header("location:login.php");
    die();
  }

  $TodayTotalSaleSql=messagQueue("SELECT SUM(sub_total) as sales FROM sales WHERE DATE(date) = CAST(CURRENT_TIMESTAMP AS DATE) ");
  $row = $TodayTotalSaleSql->fetch_assoc();
  $totalSale =$row['sales'];
    
?>
<!DOCTYPE html>
<html lang="en">

  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My POS</title>
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="../../images/favicon2.JPG" />
    
  </head>
  <body>
    <div class="row">
      
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <a class="navbar-brand brand-logo mr-5" href="tableOrders.php"><img src="../images/logo.jpg" width="82.69" height="44" alt="logo"/></a>
            <br><h5>Staff : <?php echo $_SESSION['username'] ?></h5>
          <li class="nav-item">
            <a class="nav-link" href="tableOrders.php">
            <i class="menu-icon"><img src="images/pos.svg"  width="24" height="24"></i>
              <span class="menu-title">POS</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/userProfile/userProfile.php">
            <i class="menu-icon"><img src="images/user.svg"  width="24" height="24"></i>
                <span class="menu-title">Staff Pages</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="pages/qr/qr.php">
            <i class="menu-icon"><img src="images/qrcode.svg"  width="24" height="24"></i>
              <span class="menu-title">QR Code</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/products/products.php">
            <i class="menu-icon"><img src="images/product.svg"  width="24" height="24"></i>
              <span class="menu-title">Products</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="reportChart.php" >
            <i class="menu-icon"><img src="images/sales.svg"  width="24" height="24"></i>
              <span class="menu-title">Sale Report</span>
            </a>
          </li>
          <li class="nav-item">
           <a class="nav-link"  href="pages/login/logout.php">
            <i class="menu-icon"><img src="images/logout.svg"  width="24" height="24"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>
   
      <div class="main-panel">
        <div class="content-wrapper">
        <h2 class="title-center">Sales Report</h2><br>
          <!-- <div class="row" id="row-centered"> -->
            <h3>Today's Total Sales : € <?php echo $totalSale ?></h3>
          <div class="row" >
          <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Daily</h4>
                  <canvas id="daily"></canvas>
                </div>
              </div>
            </div>

            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Busy Time</h4>
                  <canvas id="scatterChart"></canvas>
                </div>
              </div>
            </div>
			
            
          </div>
          <div class="row">
          <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Monthly</h4>
                  <canvas id="barChart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">popular menu</h4>
                  <canvas id="pieChart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
    
      </div>
  
  </div>

  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../js/template.js"></script>
  <script src="js/reportChart.js"></script>
  <script src="js/Chart.bundle.min.js"></script> <!--for scatter chart-->
 

</body>

</html>
