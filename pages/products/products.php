<?php
  session_start();
	include "../../db.php";
  if(!isset($_SESSION['userId'])){
    header("location:login.php");
    die();
  }
  $sql = messagQueue("SELECT * FROM product");
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
            <a class="nav-link"  href="../../pages/qr/qr.php">
            <i class="menu-icon"><img src="../../images/qrcode.svg"  width="24" height="24"></i>
              <span class="menu-title">QR Code</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">
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
       
          <div class="row" id="row-centered">
              <div class="col-md-3 col-md-9 col-md-0">
                <div class="card">
                  <div class="card-body">
                    <h2 class="card-title" style="text-align: center;">Product management</h2>
                  
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="" aria-label="Recipient's username">
                    <div>
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" data-whatever="@fat" type="button">Search</button>
                    
                    <!--trigger the modal with a button-->
                    <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="" type="button">Add products</button>
                        
                    <!-- Modal -->    
                        
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Adding New Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form id="modalForm" action="addProducts.php" method="post" enctype="multipart/form-data">
                              
                              <div class="form-group">
                                <label for="exampleInputName1">Product Name</label>
                                <input type="text" name="pname" class="form-control" id="exampleInputName1" placeholder="Name">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputName1">Product Image</label>
                                <input type="file" name="image" value="" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                  <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                  <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                  </span>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword4">Category</label>
                                <select class="form-control form-control-lg" required name="category" id="exampleFormControlSelect2">
                                  <option>Drinks</option>
                                  <option>Pasta</option>
                                  <option>Steak</option>                        
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword4">Price</label>
                                <input type="price" name="price" class="form-control" id="price" placeholder="Price">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword4">Description</label>
                                <input type="description" name="description" class="form-control" id="description" placeholder="Description">
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" value="Submit" form="modalForm"  class="btn btn-primary">Add</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>


                    </div>
                    </div>
                    <div class="table-responsive mb-2 mb-md-0 mt-2">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>
                              #
                            </th>
                            <th>
                              product image
                            </th>
                            <th>
                              product name
                            </th>
                            <th>
                              price
                            </th>
                            <th>
                              description
                            </th>
                            <th>
                              category
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $i=0;
                          while ($row = $sql->fetch_assoc()) 
                          { 
                            $i=$i+1;
                            $id = $row['product_id'];
                          ?>
                            <tr>
                              
                              <td><?php echo $i; ?></td>
                              <td class="py-1"><img src="data:image;base64,<?php echo $row['image']; ?>"/></td>
                              <td><?php echo $row['product_name']; ?></td>
                              <td><?php echo $row['product_unit_price']; ?></td>
                              <td><?php echo $row['description']; ?></td>
                              <td><?php echo $row['category_name']; ?></td>
                            </tr>
                            
                          <?php
                          }
                          ?>
                        </tbody>
                        <div class="modal fade" id="exampleModal-4" tabindex="-1" aria-labelledby="ModalLabel" style="display: none;" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabel">New message to @fat</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                  </div>
                                  <div class="form-group">
                                    <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea class="form-control" id="message-text"></textarea>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-success">Send message</button>
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                              </div>
                          </div>
                        </div>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div><!--row-->
        </div><!--wrapper-->
      </div><!--main panel-->
       
    </div> <!--row-->
   
  </div>

  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/modal-demo.js"></script>

  </body>

</html>
