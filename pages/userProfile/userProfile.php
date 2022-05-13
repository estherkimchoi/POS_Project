<?php
  session_start();
	include "../../db.php";
  if(!isset($_SESSION['userId'])){
    header("location:login.php");
    die();
  }
  
  $sql = messagQueue("SELECT * FROM users");

?>


<!DOCTYPE html>
<html lang="en">

<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../../../css/vertical-layout-light/style.css"> <!--css used this page-->
  <link rel="shortcut icon" href="../../../images/favicon2.JPG" />
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
            <a class="nav-link" href="userProfile.php">
            <i class="menu-icon"><img src="../../images/user.svg"  width="24" height="24"></i>
                <span class="menu-title">Staff Pages</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="../../pages/qr/qr.php">
            <i class="menu-icon"><img src="../../images/qrcode.svg"  width="24" height="24"></i>
              <span class="menu-title">QR Code</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/products/products.php">
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
          <a class="nav-link"  href="../../pages/login/logout.php">
            <i class="menu-icon"><img src="../../images/logout.svg"  width="24" height="24"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>
    
      <div class="main-panel">
        <div class="content-wrapper">
        <h2 class="title-center">User Profile</h2><br>
        <div class="row">
          <?php 
              while ($row = $sql->fetch_assoc()) 
              { 
            ?>
						<div class="col-md-4 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
                    <div class="userInfo">
                      <div class="row">
                        <div class="col-md-5" >
                          <img src="data:image;base64,<?php echo $row['photo']; ?>"/>
                        </div>
                        <div class="col-md-7" >
                          <h6 class="mb-0" id="userInfo_f"><?php echo $row['name']; ?></h6> 
                          <p class="text-muted mb-1"><?php echo $row['email']; ?></p>
                          <p class="mb-0 text-success font-weight-bold" id="userInfo_l">Staff Number: <?php echo $row['user_id']; ?></p>
                        </div>
                      
                      </div> <!--row-->
                          <!-- <div class="col-md-1" >
                        </div> -->
                    </div>  
                    <div class="row" userid ="<?php echo $row['user_id']; ?>">
                    <a href="updateProfile.php?userid=<?php echo $row['user_id']; ?>"><button type="button" class="btn btn-outline-info ">Edit</button></a>
                    <a href="deleteProfile.php?userid=<?php echo $row['user_id']; ?>"><button type="button"  class="btn btn-outline-danger">Delete</button></a>
                    </div>
                      
								</div>
							</div>
						</div>
            <?php
            }
            ?>    
						
					</div>
        </div>

        </div>
        
      </div>
      
    </div>
 
  </div>
 
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/userProfileBtn.js"></script>

  <style>
    .btn-outline-info{
      margin-left:150px;
      margin-right: 5px;
    }
  </style>
</body>

</html>
