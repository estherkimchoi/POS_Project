<?php
	 session_start();
     include "db.php";
   if(!isset($_SESSION['userId'])){
     header("location:login.php");
     die();
   }
   
    $popularItmeSql = messagQueue("SELECT product_name, SUM(quantity) AS totalQuantity FROM sales GROUP BY product_name ORDER BY totalQuantity DESC");

    $populaItemData= array();
    while ($row1 =  $popularItmeSql->fetch_assoc()){
        
        $populaItemData[] = $row1;
 
    }
    echo json_encode($populaItemData);

    ?>
