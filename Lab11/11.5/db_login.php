<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$server = '127.0.0.1';
$db_name = '';
$user = 'root';
$password = 'root';

function createConnection($server, $user, $password, $db_name) {
  $conn = new mysqli($server, $user, $password, $db_name);
  if ($conn->connect_errno) {
    die("Cannot connect to $server by $user: $conn->error");
    return NULL;
  } else {
    return $conn;
  }
}

function findUserExist($conn, $username, $userPassword) {
  $findUserQuery = "SELECT * FROM users WHERE UserName = '$username' AND Password = '$userPassword'";
  $result = $conn->query($findUserQuery);
  return $result;
}
function findAllProducts($conn) {
  $findAllProductsQuery = "SELECT * FROM products";
  $result = $conn->query($findAllProductsQuery);
  return $result;
}
function findProductByName($conn, $productName) {
  $findProductBynameQuery = "SELECT * FROM products WHERE ProductName = '$productName'";
  $result = $conn->query($findProductBynameQuery);
  return $result;
}
function insertPayment($conn, $userName, $productName){
  $insertPaymentQuery = "INSERT INTO users_products (UserName, ProductName) VALUES ('$userName', '$productName')";
  $result = $conn->query($insertPaymentQuery);
  return $result;
}