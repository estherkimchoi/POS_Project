<!--This page is for order list deletion on OrderPayment.php page-->
<?php
	session_start();
	include "db.php";
  if(!isset($_SESSION['userId'])){
    header("location:login.php");
    die();
  }

//sales_unit_counter, it tells the itmes of each sale unit.
$counterSql= messagQueue("SELECT * FROM sales_unit_counter");
$row1 = $counterSql->fetch_assoc();
$data = $row1['sales_unit_counter'];
$sale_unit_counter = $data+1;

if($counterSql){
    messagQueue("UPDATE sales_unit_counter SET sales_unit_counter = '".$sale_unit_counter."' ");

}

$tableNum = $_POST['tableNum'];

//fetch data to save to 'sales' table 
$fetchOrderDataToMoveSql = messagQueue("SELECT * FROM purchase_order WHERE table_number = '".$tableNum."' ");
while($row = $fetchOrderDataToMoveSql->fetch_assoc()){
    $productName = $row['product_name'];
    $quantity = $row['quantity'];
    $unitPrice = $row['unit_price'];
    $subToal = $row['sub_total'];
    $date = $row['date'];

//send the data to sales table
$moveToSalesDBsql = messagQueue("INSERT INTO sales (sales_unit,product_name,quantity,unit_price,sub_total,date)
 VALUES('".$sale_unit_counter."','".$productName."','".$quantity."','".$unitPrice."','".$subToal."','".$date."')"); 

}

$deleteSql = messagQueue("DELETE FROM purchase_order  WHERE table_number=$tableNum");

?>