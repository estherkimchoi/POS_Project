<?php  

session_start();

	include "../../db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>MY POS</title>
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../../images/favicon2.JPG" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <div style="text-align:center;"><img src="../../images/logo.jpg" alt="logo"></div>
              </div>
              <h3>login to start!</h3>
              <form class="pt-3" method="post" action="loginProcess.php">
                <div class="form-group">
                <label for="exampleInputName1">Staff Number</label>
                  <input type="id" name ="userId" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter your staff number">
                </div>
                <div class="form-group">
                <label for="exampleInputName1">Password</label>
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Enter Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >LOGIN </button>
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="register.php">REGISTER</a>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
    
    </div>

  </div>
  
  <style>
    h3{
      text-align:center;
    }
  </style>
 
</body>

</html>
