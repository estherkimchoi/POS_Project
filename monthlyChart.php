<?php
	 session_start();
     include "db.php";
   if(!isset($_SESSION['userId'])){
     header("location:login.php");
     die();
   }
   
    $getMonthDataSql = messagQueue("SELECT YEAR(date) as year, LEFT(DATE_FORMAT(date, '%M'),3) as month, SUM(sub_total) as total FROM sales GROUP BY  MONTH(date)");
   
    $data= array();
    while ($row = $getMonthDataSql->fetch_assoc()){
        
        $data[] = $row;
 
    }
        
    //print the data
    echo json_encode($data);
    
    

?>
