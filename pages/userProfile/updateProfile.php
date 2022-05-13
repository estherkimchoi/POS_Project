<?php  
 session_start();
	include "../../db.php";
  if(!isset($_SESSION['userId'])){
    header("location:login.php");
    die();
  }
  $userId = $_GET['userid'];
   
  $sql = messagQueue("SELECT * FROM users WHERE user_id = '$userId' ");
  $row = $sql->fetch_assoc();
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
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <div style="text-align:center;"><img src="../../images/logo.jpg" alt="logo"></div>
              </div>
              <form action="updateProcess.php?userid=<?php echo $userId?>" method="post" class="forms-sample" enctype="multipart/form-data">
              <!-- <form action="updateProcess.php" method="post" class="forms-sample" enctype="multipart/form-data"> -->
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" value="<?php echo $row["name"]; ?>">
                    </div>
                    <!-- <div type="hidden" class="form-group">
                      <label for="exampleInputStaffNumber">Staff Number</label>
                      <input type="text" name="staffNum" class="form-control" id="" value="<?php echo $row["user_id"]; ?>">
                    </div> -->
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail3" value="<?php echo $row["email"]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Staff Photo</label>
                      <input type="file" name="image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" name="imagepath" class="form-control file-upload-info" placeholder="Upload Photo">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2" >Submit</button>
                    <button class="btn btn-light" formaction="userProfile.php">Cancel</button>
              </form>
            </div>
          </div>
        </div>
      </div>
   
    </div>
   
  </div>

  <script src="../../vendors/js/vendor.bundle.base.js"></script><!--for image upload btn work-->
  <script src="../../js/file-upload.js"></script>
</body>

</html>
