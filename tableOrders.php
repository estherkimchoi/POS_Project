<?php
  session_start();
	include "db.php";
  if(!isset($_SESSION['userId'])){
    header("location:login.php");
    die();
  }
$checkboxsql = messagQueue("SELECT product_name, table_number, quantity, isdone FROM purchase_order WHERE NOT isdone='true' ORDER BY table_number DESC");
?>


<!DOCTYPE html>
<html lang="en">

<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>My POS</title>
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
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
           <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Order Status</h4>

									<div class="list-wrapper pt-2">
										<ul class="d-flex flex-column-reverse todo-list todo-list-custom">

											<?php
											while ($row = $checkboxsql->fetch_assoc())
											{
											?>
											<li  id="checkbox" >

												<div class="form-check form-check-flat">
													<label id ="label" class="form-check-label" pname= "<?php echo $row['product_name']; ?>" tableNum= "<?php echo $row['table_number']; ?>">
														<input class="checkbox" type="checkbox"> <!--checked="checked"-->
												    Table <?php echo $row['table_number']; ?> :	<?php echo $row['product_name']; ?> x <?php echo $row['quantity']; ?>
													</label>
												</div>
												<i class="remove ti-close" ></i>
											</li>
											<?php
										}
										?>
										</ul>
                  </div>

								</div>
							</div>
            </div>

            <div class="col-md-8 grid-margin stretch-card">
              <div class="card-body"> <!-- table Order  part entire container-->
                <h3 class="card-title">Table Order</h3>
                <div class="popover-static-demo"> <!--table boxes container-->
               <!--display tables-->
                <?php for( $i = 0; $i<15; $i++ )
                { $tableNum =$i+1;
                ?>
                  <div class="popover bs-popover-top bs-popover-top-demo" onclick="location.href='orderPayment.php?tableNum=<?php echo $tableNum; ?>'"><!--single table-->
                    <h3 class="popover-header" tableNum="<?php echo $tableNum; ?>"><td>Table <?php echo $tableNum; ?></td></h3>
                    <div class="popover-body">
                        <?php
                          $sql = messagQueue("SELECT product_name, quantity,isdone FROM purchase_order WHERE table_number = '".$tableNum."' ");

                          while ($row = $sql->fetch_assoc())
                          {
                            if($row['isdone']=='true'){
                              $textcolor = '#1E5631';
                              $textbold ='font-weight:bold';
                              
                            }
                            else{
                              $textcolor = '#737F8B';
                              $textbold = 'font-weight:normal';
                            }
                          ?>
                            
                              <li style="color:<?php echo $textcolor ?>; <?php echo $textbold ?>" class="pname" isdone="<?php echo $row['isdone']; ?>" productName="<?php echo $row['product_name']; ?>" ><?php echo $row['product_name']; ?> x <?php echo $row['quantity']; ?></li>
                          <?php
                            // } //if
                          }//while
                          ?>

                    </div>
                  </div>

                <?php //for loop
                }
                ?>


                  
                </div>
              </div>

            </div>

          </div>
        </div> 

        </div>
       
      </div>
     
    </div>
  
  </div>
 
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/todolist.js"></script>
</body>

</html>
