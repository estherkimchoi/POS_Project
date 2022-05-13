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
<link rel="stylesheet" href="../../css/qrcode/style.css">
</head>

<body>
  <div class="container">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="grid grid-template-columns-2"  >
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
      </div>
    </div><!--main panel-->
  </div> <!--wrapper-->
</div><!-- container -->
  
<script>
  window.print();
  setTimeout("location.href = 'qr.php';",1500);

</script>

</body>

</html>
