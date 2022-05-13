<?php
	include "db.php";
  
  $tableNum = $_GET['tableNum'];
  $placedOrderListSql =  messagQueue("SELECT product_name,unit_price ,quantity,sub_total FROM purchase_order WHERE table_number = '".$tableNum."' ");
?>


<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>My POS </title>
  <link rel="stylesheet" href="../../../../css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../../images/favicon2.JPG" />
</head>
  
<body>
  <div class="container-scroller">
    <div class="main-panel">          
      <div class="content-wrapper">
        <div class="row">
        
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h2 class="card-title text-center">Table <?php echo $tableNum ?></h2>
                <h2 class="card-title text-center">Order Confirmation</h2>
                
                <div class="row">
                  <div class="col-md-12">
                    <div id="dragula-event-left" class="py-2">

                      <?php
                         $subTotal = 0;
                        while ($row = $placedOrderListSql->fetch_assoc())
                        {
                          $subTotal += $row['sub_total'];                   
                        ?>
                          <div class="card rounded border mb-2">
                            <div class="card-body p-3">
                              <div class="media">
                                <div class="media-body">
                                  <h6 class="mb-1"><?php echo $row['product_name']; ?> (€<?php echo $row['unit_price']; ?>) x <?php echo $row['quantity']; ?></h6>
                                </div>                              
                              </div> 
                            </div>
                          </div>
                        
                      <?php
                      }
                      ?>

                        <br><br>

                      <div class="card rounded border mb-2">
                        <div class="card-body p-3">
                          <div class="media">
                            <div class="media-body">
                              <h6 class="mb-1">Sub Total : €<?php echo $subTotal ?></h6>
                            </div>                              
                          </div> 
                        </div>
                      </div>
                      <br><br>
                      
                    </div> 
                  </div>
                </div>
                  
              </div>
            </div>
          </div>
          
        </div><!--row-->
        
      </div><!--warrper-->
      
    </div><!--main panel-->
    
  </div><!--container-->
  
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

</body>
</html>