<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db   = "onlineentranceexam";
$conn = null;

try {
  $conn = new PDO("mysql:host={$host};dbname={$db};",$user,$pass);
} catch (Exception $e) {
  
}


 ?>