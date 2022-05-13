<?php
session_start();
	require "db.php";
  //Get parameters from URL for table number//  check to see if the GET variable exists before attempt to retrieve it
  $tableNum = false;
  if(isset($_GET['tableNum'])){
    $tableNum = $_GET['tableNum'];

    if($tableNum !== false){
      echo '<h1>TableNumber: ' . $tableNum . '</h1>'; 
   }

   $_SESSION['tableNum'] = $tableNum;
  }
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

      <div class="main-panel">
        <div class="content-wrapper">
             
          <div class="row">
          <div class="col-md grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="images/mobileJumbo.JPG">
                  
                </div>
              </div>
            </div>
          <div class="card">
          
                <div class="card-body">
                  <p class="card-description"></p>
                  <ul class="nav nav-pills nav-pills-success" id="pills-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false">Drink</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Pasta</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link  active" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="true">Steak</a>
                    </li>
                    <li class="nave-itme">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart">Cart (<span class="total-count"></span>)</button><button class="clear-cart btn btn-danger">Clear Cart</button>
                    </li>
                  </ul>
                
                  <!-- cartIcon -->
                    <div style="float: right; cursor: pointer;">
                        <span class= "glyphicon glyphicon-shopping-cart my-cart-icon">
                            <span class="badge badge-notify my-cart-badge"></span>
                        </span>
                    </div>

                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                      <div class="container">
                       
                        <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="images/americano.jpg" width="auto" height="auto" />
                          <div class="card-body text-center mx-auto">
                              <div class='cvp'>
                                  <h5 class="card-title">Americano</h5>
                                  <p class="card-text">€3.0</p>
                                 <a href="#" data-name="Americano" data-price="3.0" class="add-to-cart btn btn-primary">Add to Order</a>
                                </div>
                          </div>
                        </div>
                        <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="images/cappuccino.jpg" width="auto" height="auto" />
                          <div class="card-body text-center mx-auto">
                              <div class='cvp'>
                                  <h5 class="card-title">Cappuccino</h5>
                                  <p class="card-text">€4.0</p>
                                  <a href="#" data-name="Cappuccino" data-price="4.0" class="add-to-cart btn btn-primary">Add to Order</a>
                              </div>
                          </div>
                        </div>
                        <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="images/coke.jpg" width="auto" height="auto" />
                          <div class="card-body text-center mx-auto">
                              <div class='cvp'>
                                  <h5 class="card-title">Coca Cola</h5>
                                  <p class="card-text">€2.0</p>
                                  <a href="#" data-name="CocaCola" data-price="2.0" class="add-to-cart btn btn-primary">Add to Order</a>
                              </div>
                          </div>
                        </div>
                        <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="images/fanta.jpg" width="auto" height="auto" />
                          <div class="card-body text-center mx-auto">
                              <div class='cvp'>
                                  <h5 class="card-title">Fanta</h5>
                                  <p class="card-text">€2.0</p>
                                 <a href="#" data-name="Fanta" data-price="2.0" class="add-to-cart btn btn-primary">Add to cart</a>
                              </div>
                          </div>
                        </div>
                        <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="images/zerocoke.jpg" width="auto" height="auto" />
                          <div class="card-body text-center mx-auto">
                              <div class='cvp'>
                                  <h5 class="card-title">Zero Coke</h5>
                                  <p class="card-text">€2.0</p>
                                  <a href="#" data-name="ZeroCoke" data-price="2.0" class="add-to-cart btn btn-primary">Add to cart</a>
                              </div>
                          </div>
                        </div>
                        <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="images/sprite.jpg" width="auto" height="auto" />
                          <div class="card-body text-center mx-auto">
                              <div class='cvp'>
                                  <h5 class="card-title">Sprite</h5>
                                  <p class="card-text">€2.0</p>
                                  <a href="#" data-name="Sprite" data-price="2.0" class="add-to-cart btn btn-primary">Add to cart</a>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                      <div class="container">
                      <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="images/arrabiata1.JPG" width="auto" height="auto" />
                          <div class="card-body text-center mx-auto">
                              <div class='cvp'>
                                  <h5 class="card-title">Arrabiata</h5>
                                  <p class="card-text">€15.0</p>
                                   <a href="#" data-name="Arrabiata" data-price="15.0" class="add-to-cart btn btn-primary">Add to cart</a>
                              </div>
                          </div>
                        </div>
                        <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="images/carbonara1.jpg" width="auto" height="auto" />
                          <div class="card-body text-center mx-auto">
                              <div class='cvp'>
                                  <h5 class="card-title">Carbonara</h5>
                                  <p class="card-text">€16.0</p>
                                  <a href="#" data-name="Carbonara" data-price="16.0" class="add-to-cart btn btn-primary">Add to cart</a>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade active show" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                      <div class="container">
                      <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="images/ribeye.jpg" width="auto" height="auto" />
                          <div class="card-body text-center mx-auto">
                              <div class='cvp'>
                                  <h5 class="card-title">Rib eye steak</h5>
                                  <p class="card-text">€20.0</p>
                                  <!-- <p class="card-text">€20.0</p>  <button type="button" class="btn btn-danger my-cart-btn" data-id="8" data-name ="Rib eye steak" data-summary="summary 8" data-price="20.0" data-quantity="1">ADD TO CART</button> -->
                                  <a href="#" data-name="RibEye" data-price="20.0" class="add-to-cart btn btn-primary">Add to cart</a>
                              </div>
                          </div>
                        </div>
                      <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="images/Tbonesteak.jpg" width="auto" height="auto" />
                          <div class="card-body text-center mx-auto">
                              <div class='cvp'>
                                  <h5 class="card-title">T-bone steak</h5>
                                  <p class="card-text">€20.0</p>
                                  <a href="#" data-name="TboneSteak" data-price="20.0" class="add-to-cart btn btn-primary">Add to cart</a>
                              </div>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>

 <!-- Modal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body-cart">
        <table class="show-cart table">
          
        </table>
        <div>Total price: €<span class="total-cart"></span></div>
      </div>
      <div class="modal-footer" tableNum="<?php echo $tableNum ?>">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" tableNum="<?php echo $tableNum ?>" id="orderNow" class="btn btn-primary" data-dismiss="modal" onclick="dirToConfirm()" >Order now</button>
      </div>
    </div>
  </div>
</div> 
</div>
 </div>
      
      </div>
 
    </div>
    
  </div>
 
  <script src="js/sweetalert.min.js"></script>
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="js/numberPad.js"></script>
  <script src="js/tabBtnMenuClick.js"></script>
  <script src="js/mobileConfirm.js"></script>

  <!-- order cart -->
  <script src="js/jquery.mycart.js"></script>
  <script src="js/cart.js"></script>

</body>

</html>

