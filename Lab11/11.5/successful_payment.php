<?php session_start();
include "db_login.php";
$db_name = "lab11";
$conn = createConnection($server, $user, $password, $db_name);

$productNamesAddedToCart = $_SESSION['ProductNamesAddedToCart'];

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

print("Payment processing");

if(isset($_POST['buy'])){
  print(count($productNamesAddedToCart));
  for($i = 0; $i < count($productNamesAddedToCart); $i++) {
    print(str_replace('_', ' ', $productNamesAddedToCart[$i]));
    if(insertPayment($conn, $_SESSION['UserName'], str_replace('_', ' ', $productNamesAddedToCart[$i]))) {
      print("Pay " . str_replace('_', ' ', $productNamesAddedToCart[$i]) . "Successfully");
    }
  }
}

?>