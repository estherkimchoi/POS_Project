<?php
	 session_start();
     include "../../db.php";
   if(!isset($_SESSION['userId'])){
     header("location:login.php");
     die();
   }

  // $userId = $_POST['userId'];
  $userId = $_GET['userid'];

  $sql = messagQueue("DELETE FROM users  WHERE user_id='$userId'");
//   if($sql){
//     echo "<script>alert('$userId');</script>";

// }
// else{
//     echo "<script>alert('not deleted');</script>";
// }
?>
<meta charset="utf-8" />
<meta http-equiv="refresh" content="0 url=userProfile.php">