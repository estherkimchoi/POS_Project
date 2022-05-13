<?php
//<!--busy time-->
	 session_start();
     include "db.php";
   if(!isset($_SESSION['userId'])){
     header("location:login.php");
     die();
   }
  $dailyBarChartSql = messagQueue("SELECT SUM(sub_total) as total, DAYOFWEEK(date) as dayname FROM sales GROUP BY dayname ");
    $result= array();
    while ($row1 =  $dailyBarChartSql->fetch_assoc()){
        
        $result[] = $row1;
 
    }
    echo json_encode($result);

?>
