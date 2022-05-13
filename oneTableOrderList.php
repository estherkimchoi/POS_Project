<!--this page runs when tabBtnMenuClick.js-->
<!--when button clicked the menu is saved to DB-->
<?php
 session_start();
 include "db.php";
if(!isset($_SESSION['userId'])){
 header("location:login.php");
 die();
}

//$fetch product name with sqli and then and used it in sql
$productId = $_POST['productId'];
$tableNum = $_POST['tableNum'];
$pname = $_POST['pname'];
$sql1 = messagQueue("SELECT * FROM product WHERE product_id = '".$productId."' ");
$row = $sql1->fetch_assoc();
$pname = $row['product_name'];
$unitPrice = $row['product_unit_price'];

//check if the same item is in db then update the amount so that 'Americano x2'
$sql2 = messagQueue("SELECT * FROM purchase_order WHERE table_number = $tableNum AND product_name = '".$pname."' ");


$matchFound = mysqli_num_rows($sql2) > 0 ? 'yes' : 'no';
if($matchFound =='yes'){ //if same item exist in DB, update the quantity
    $row2 = $sql2->fetch_assoc();
    $quanityDB = $row2['quantity'];
    $updatedQuantity = $quanityDB+1;
    $subTotal = $unitPrice*$updatedQuantity;
    messagQueue("UPDATE purchase_order SET quantity = $updatedQuantity,sub_total = $subTotal WHERE table_number = $tableNum AND product_name = '".$pname."' ");
   
    echo '<script>', 'reload('.$tableNum.');', '</script>';
    

}
else{ //if not exist
    $amount=0;
    $amount += $amount+1;
    $subTotal = $unitPrice*$amount;
    $isdone = 'false';
    $sql = messagQueue("INSERT INTO purchase_order (table_number,product_name,quantity,unit_price,sub_total,isdone) VALUES('".$tableNum."','".$pname."','".$amount."','".$unitPrice."','".$subTotal."','".$isdone."')"); 
    
    if($sql){
        $s = messagQueue("SELECT * FROM purchase_order WHERE table_number = $tableNum AND product_name = '".$pname."' ");
        $row3 = $s->fetch_assoc();
       showData($row3);
    }
    
}

//display button item data
function showData($row){ //added indexId vlaue to remove list when checkbox is click (for javascript)
    echo "<tr indexId ='".$row['id']."'><th><input class='checkbox' type='checkbox' indexId='".$row['id']."' ></th><td>".$row['product_name']."</td><td>".$row['unit_price']."</td><td>".$row['quantity']."</td><td>".$row['sub_total']."</td></tr>";
    
}    
  

?>
