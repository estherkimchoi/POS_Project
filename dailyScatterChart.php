<?php
//<!--busy time-->
	 session_start();
     include "db.php";
   if(!isset($_SESSION['userId'])){
     header("location:login.php");
     die();
   }
   
    $dailyScatterSql = messagQueue("SELECT SUM(sub_total) as total, DATE_FORMAT(date, '%H:%i') as time FROM sales GROUP BY sales_unit ORDER BY sales_unit DESC");
   
    $result= array();
    while ($row1 =  $dailyScatterSql->fetch_assoc()){
        
        $result[] = $row1;
 
    }
    echo json_encode($result);

?>
