<!--This page is for order list deletion on OrderPayment.php page-->
<!--This page is called by listCheckBox.js-->
<?php
	 session_start();
     include "db.php";
   if(!isset($_SESSION['userId'])){
     header("location:login.php");
     die();
   }

  $indexId = $_POST['indexId'];

  $sql = messagQueue("DELETE FROM purchase_order  WHERE id=$indexId");
  if($sql){
      echo "<script>alert('$indexId');</script>";

  }
  else{
      echo "<script>alert('not deleted');</script>";
  }
?>