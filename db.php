<?php

$conn = new mysqli("localhost", "root", "", "pos");
$conn->set_charset("utf8");//incoding 

function messagQueue($sql){
  //global allows for using externally declared $sql whthing the funcition mq
   global $conn;  
   return $conn->query($sql);
}

?>


