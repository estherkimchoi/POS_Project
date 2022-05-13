<?php
 session_start();
include "../../db.php";
$userId = $_GET['userid'];
$username = $_POST['name'];
$email = $_POST['email'];
$photo = $_POST['imagepath'];

if (empty($photo)) {
    $sql = messagQueue("UPDATE users SET email ='$email',name = '$username' WHERE user_id ='$userId' ");

}

else{
   //photo
$filename = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];  
$image = "../../images/faces/".$filename;  
$imageContent = base64_encode(file_get_contents(addslashes($image)));


$sql = messagQueue("UPDATE users SET email ='$email',name = '$username',photo='$imageContent' WHERE user_id ='$userId' ");
 
}

?>

<meta charset="utf-8" />
<meta http-equiv="refresh" content="0 url=userProfile.php"> 