<?php
	session_start();
	require "db.php";
  if(!isset($_SESSION['userId'])){
    header("location:login.php");
    die();
  }

$isdone = $_POST['isdone'];
$product_name = $_POST['product_name'];
$tableNum = $_POST['tableNum'];

$sql = messagQueue("UPDATE purchase_order SET isdone = 'true' WHERE table_number = $tableNum AND product_name = '".$product_name."' ");

?>