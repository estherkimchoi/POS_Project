<?php
include "../../db.php";

$userid = $_POST['staffNum'];
$username = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
//photo
$filename = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];  
$image = "../../images/faces/".$filename;  
$imageContent = base64_encode(file_get_contents(addslashes($image)));

$sql = messagQueue("INSERT INTO users (user_id,name,email,password,photo) VALUES('".$userid."','".$username."','".$email."','".$password."','".$imageContent."')"); 
?>

<meta charset="utf-8" />
<meta http-equiv="refresh" content="0 url=login.php">