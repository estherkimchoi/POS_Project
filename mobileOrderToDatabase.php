
<?php
session_start();
	require "db.php";
    $tableNum= $_SESSION['tableNum'];

    $cartlist = $_POST['cartlist'];
    foreach($cartlist as $row){
              
                $productName = $row['name'];
                $quantity = $row['count'];
                $unitPrice = $row['price']; 
                $totalPrice = $row['total'];
                $sql = messagQueue("INSERT INTO purchase_order (table_number,product_name,quantity, unit_price, sub_total,isdone) 
                VALUES('".$tableNum."','".$productName."','".$quantity."','".$unitPrice."','".$totalPrice."','false')"); 
    
    }
   

?>
