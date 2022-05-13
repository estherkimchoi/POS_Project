<?php
session_start();
require "../../db.php";
if(!isset($_SESSION['userId'])){
header("location:login.php");
die();
}
  
$productName = $_POST['pname'];
$category = $_POST['category'];
$price = $_POST['price'];
$description = $_POST['description'];
//image
$filename = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];  
$image = "../../images/".$filename;  
$imageContent = base64_encode(file_get_contents(addslashes($image)));

$sql = messagQueue("INSERT INTO product (product_name,description,category_name,product_unit_price,image) VALUES('".$productName."','".$description."','".$category."','".$price."','".$imageContent."')"); 
?>    
    
<meta charset="utf-8" />
<meta http-equiv="refresh" content="0 url=products.php">
    
    
  