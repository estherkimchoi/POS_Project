<meta charset="utf-8" />

<?php
	include "../../db.php";
	
	if(!empty($_POST['userId']) && !empty($_POST['password'])){
		
		$password = $_POST['password'];
		$userid = $_POST['userId'];//= staff Number
		$sql = messagQueue("SELECT * FROM users where user_id='$userid'");
		session_start(); 
		$userData = $sql->fetch_assoc();
		$fetchedPassword = $userData['password']; 

			if($password==$fetchedPassword){ 
				
				$_SESSION['userId'] = $userData["user_id"];
				$_SESSION['username'] = $userData["name"];
				echo "<script>location.href='../../tableOrders.php';</script>";
			}else{
				echo "<script>alert('Please enter the valid id and password.'); history.back();</script>";
			}
			
	}else{
		echo '<script> alert("All fields must be filled!"); history.back(); </script>';
	}

?>
