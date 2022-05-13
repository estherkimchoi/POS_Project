<?php
  session_start();
	require "../../db.php";
  if(!isset($_SESSION['userId'])){
    header("location:login.php");
    die();
  }
  $sql = messagQueue("SELECT * FROM qrcode_image ORDER BY table_number ASC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>My POS</title>
  <link rel="stylesheet" href="../../css/style1.css">
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css"> 
  <link rel="shortcut icon" href="../../images/favicon2.JPG" />
</head>
<body>
  <div class="row">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <a class="navbar-brand brand-logo mr-5" href="../../tableOrders.php"><img src="../../images/logo.jpg" width="82.69" height="44" alt="logo"/></a>
        <br><h5>Staff : <?php echo $_SESSION['username'] ?></h5>
        <li class="nav-item">
          <a class="nav-link" href="../../tableOrders.php">
          <i class="menu-icon"><img src="../../images/pos.svg"  width="24" height="24"></i>
            <span class="menu-title">POS</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../userProfile/userProfile.php">
          <i class="menu-icon"><img src="../../images/user.svg"  width="24" height="24"></i>
            <span class="menu-title">Staff Pages</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="qr.php">
          <i class="menu-icon"><img src="../../images/qrcode.svg"  width="24" height="24"></i>
            <span class="menu-title">QR Code</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../products/products.php">
          <i class="menu-icon"><img src="../../images/product.svg"  width="24" height="24"></i>
            <span class="menu-title">Products</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="../../reportChart.php" >
          <i class="menu-icon"><img src="../../images/sales.svg"  width="24" height="24"></i>
            <span class="menu-title">Sale Report</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="../login/logout.php">
          <i class="menu-icon"><img src="../../images/logout.svg"  width="24" height="24"></i>
            <span class="menu-title">Logout</span>
          </a>
        </li>
      </ul>
    </nav>

    
    <div class="main-panel">
      <div class="content-wrapper">
          <h2 class="title-center">QR Code</h2><br>

					<div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-3 div-toggle" data-target="div-toggle">
              <button type="button" class="btn btn-inverse-primary btn-fw" data-show=".display" id="showQrcode" >Generate QR code</button>
            </div>
            <div class="col-md-3">
              <a href="download.php">	<button type="button" class="btn btn-inverse-primary btn-fw">Download all QR code</button></a>
            </div>
            <div class="col-md-3">
              <a href="printQRcode.php">	<button type="button" class="btn btn-inverse-primary btn-fw" id="printQR">Print all QR code</button></a>
            </div>
            <div class="col-md-1"></div>
					</div>

					<br>
     
          <div class="display grid grid-template-columns-2 hide"  >
              <?php
                while ($row = $sql->fetch_assoc())

                {
                  $image = $row['image'];
              ?>
                
                <div class="item">
                    <h3> <?php echo $row['table_number']; ?></h3>
                    <img src="data:image;base64, <?php echo base64_encode($image); ?>" class="card-image">
                </div>

              <?php
              }
              ?>
          
          </div>
       
      </div><!--wrapper-->
      
    </div><!--main panel-->
   
  </div><!--row-->
 
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/qrcode.js"></script>
  <script src="../../js/qrcode_jquery.min.js"></script>
  
</body>
</html>
