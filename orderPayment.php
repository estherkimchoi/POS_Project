<?php

 //receive table num variable from tableOrders.php to display corresponding orderPayment page
  session_start();
  include "db.php";
  if(!isset($_SESSION['userId'])){
    header("location:login.php");
    die();
  }
  
  $tableNum =$_GET['tableNum'];
  
  $sqlDrinks = messagQueue("SELECT product_name,product_id FROM product WHERE category_name = 'Drinks' ");
  $sqlPasta = messagQueue("SELECT product_name,product_id FROM product WHERE category_name = 'Pasta' ");
  $sqlSteak = messagQueue("SELECT product_name,product_id FROM product WHERE category_name = 'Steak' ");
  $orderDisplaysql = messagQueue("SELECT * FROM purchase_order WHERE table_number = '".$tableNum."' ");
  $totalSumDisplay = 0;
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>My POS</title>
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="images/favicon2.JPG" />
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
            <a class="nav-link"  href="../../pages/qr/qr.html">
            <i class="menu-icon"><img src="images/logout.svg"  width="24" height="24"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
      </nav>
      
      <div class="main-panel">
        <div class="content-wrapper">
          <h3 tableNum="<?php echo $tableNum;?>">Table: <?php echo $tableNum;?></h3>
          <div class="row"> <!--entire row-->
            <div class="col-md-6 grid-margin stretch-card" id="partReload">
              <div class="card">
							  <div class="table-responsive">
                    <table class="table" id="partReload">
                      <thead>
                        <tr>
                          <th>
                            <div class="form-check form-check-flat">
                              <!-- <label class="form-check-label">
                                <input class="checkbox" type="checkbox">
                                
                              </label> -->
                            </div>
                          </th>
                          <th>Menu</th>
                          <th>Unit Price €</th>
                          <th>Amount</th>
                          <th>Total €</th>
                        </tr>
                      </thead>
                      <tbody id="displayContainer">

                        <?php 
                          $i=0;
                          $totalSumDisplay = 0;
                        while ($row = $orderDisplaysql->fetch_assoc()) 
                        { 
                          $eachSum =  $row['sub_total'];
                          $totalSumDisplay = $totalSumDisplay + $eachSum;
                          
                        ?>
                          <tr indexId="<?php echo $row['id']; ?>" >
                            <th class="checkboxTh">
                                <input class="checkbox" type="checkbox" indexId="<?php echo $row['id']; ?>">
                            </th>
                            <td><?php echo $row['product_name']; ?></td>
                            <td><?php echo $row['unit_price']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['sub_total']; ?></td>
                          </tr>
                          
                        <?php
                        }
                        ?>

                      </tbody>
                    </table>
                  
                  
							
                </div><!--table responsive-->
              </div><!--card-->
            </div>
            
            <div class="col-md-6 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home-1" role="tab" aria-controls="home-1" >Drinks</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile-1" role="tab" aria-controls="profile-1" >Pasta</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact-1" role="tab" aria-controls="contact-1" >Steak</a>
                      </li>
                  </ul>
                  
									<div class="tab-content">
                        <div class="tab-pane fade active show" id="home-1" role="tabpanel" aria-labelledby="home-tab">
                            <div class="media">
                              <?php 
                              while ($row = $sqlDrinks->fetch_assoc()) 
                              {
                              ?> 
                                <button type="button" tableNum="<?php echo $tableNum; ?>"  id="<?php echo $row['product_id']; ?>" value="<?php echo $row['product_name']; ?>" class="btn btn-menuTapBtn" ><?php echo $row['product_name']; ?></button>
                              <?php
                              }
                              ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab">
                          <div class="media">
                          <?php 
                              while ($row = $sqlPasta->fetch_assoc()) 
                              {
                              ?> 
                                <button type="button" tableNum="<?php echo $tableNum;?>"  id="<?php echo $row['product_id']; ?>" value="<?php echo $row['product_name']; ?>" class="btn btn-menuTapBtn" ><?php echo $row['product_name']; ?></button>
                              <?php
                              }
                              ?>
                          </div>
                        </div>
                      <div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="media">
                        <?php 
                              while ($row = $sqlSteak->fetch_assoc()) 
                              {
                              ?> 
                                <button type="button" tableNum="<?php echo $tableNum;?>"  id="<?php echo $row['product_id']; ?>" value="<?php echo $row['product_name']; ?>" class="btn btn-menuTapBtn" ><?php echo $row['product_name']; ?></button>
                              <?php
                              }
                              ?>
                        </div>
                      </div>
                  </div>
                  
                </div>
                  
							</div>
						</div>
          

          <div class="col-md-6 grid-margin stretch-card">
            
            <div class="col-md-6 grid-margin stretch-card">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>
                      Total Price 
                    </th>
                    <td id="totalPrice">
                    € <?php echo $totalSumDisplay;?>
                    </td>
                  </tr>
                  <tr>
                    <th>
                      Recieved 
                    </th>
                    <td type="text" name="value" id="pressedNumDisplay" class="pressedNumDisplay">€ 
                    </td>
                  </tr>
                  <tr>
                    <th>
                      Change 
                    </th>
                    <td id="changes">
                    €             
                    </td>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>

            <!--number keypad-->
            <div>
                    
                <div class="template-demo d-flex justify-content-between flex-nowrap">
                  <button type="button" value="1" class="btn btn-number1Btn">1</button>
                  <button type="button"  class="btn btn-number1Btn">2</button>
                  <button type="button"  class="btn btn-number1Btn">3</button>
                </div>

                <div class="template-demo d-flex justify-content-between flex-nowrap">
                  <button type="button" class="btn btn-number1Btn">4</button>
                  <button type="button" class="btn btn-number1Btn">5</button>
                  <button type="button" class="btn btn-number1Btn">6</button>
                </div>

                <div class="template-demo d-flex justify-content-between flex-nowrap">
                  <button type="button" class="btn btn-number1Btn">7</button>
                  <button type="button" class="btn btn-number1Btn">8</button>
                  <button type="button" class="btn btn-number1Btn">9</button>
                </div>

                <div class="template-demo d-flex justify-content-between flex-nowrap">
                  <button type="button" class="btn btn-number1Btn" id="C">C</button>
                  <button type="button" class="btn btn-number1Btn">0</button>
                  <button type="button" class="btn btn-number1Btn">.</button>
                </div>
            </div>
        
      </div>

      <div class="col-md-6 grid-margin stretch-card">
        <div>           
          <div class="template-demo d-flex justify-content-between flex-nowrap">
            <button type="button" class="btn btn-orderBtn" onClick="tableOrderPage()">Order</button>
            <button type="button" class="btn btn-cancelBtn">Cancel</button>
          </div>
          <div class="template-demo d-flex justify-content-between flex-nowrap" tableNum="<?php echo $tableNum; ?>">
            <button type="button" class="btn btn-cardBtn" id="byCash" onClick="cashBtn();"> Cash</button>
            <button type="button" class="btn btn-cardBtn" id="byCard" onClick="cardAlertAndTableOrderPage();"> Card</button>
          </div>
        </div>     
      </div>
       
        
        </div><!--wrapper-->
     
      </div><!--main panel-->
    
    </div><!--row-->
  
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="../../js/template.js"></script>
  <script src="js/numberPad.js"></script>
  <script src="js/tabBtnMenuClick.js"></script>
  <script src="js/listCheckBox.js"></script>
  <script src="js/moveSaleTbl.js"></script>
  <script src="js/sweetalert2.all.min.js"></script>

  <script>   

  function cashBtn(){
    var recivedCashText = document.getElementById("pressedNumDisplay").textContent;
    var recivedCash = recivedCashText.replace(/[ (€)]/g, '');
    var toTalPriceText = document.getElementById("totalPrice").textContent;
    var toTalPrice = toTalPriceText.replace(/[ (€)]/g, '');
    var change = recivedCash-toTalPrice;
    document.getElementById("changes").innerHTML = "€ "+ change; 
      
    window.location.href = "tableOrders.php";
  }
 
 function tableOrderPage(){
   window.location.href = "tableOrders.php";
 }

  function cardAlertAndTableOrderPage(){
 
      Swal.fire({
        title: 'Card Payment Approved',
        imageUrl: '/images/card.png',
        imageWidth: 300,
        imageHeight: 200,
        imageAlt: 'Custom image'
      })
      .then(function (result) {
        if (result.value) {
          window.location.href = "tableOrders.php";
        }
    });
  }

 </script>
</body>

</html>

