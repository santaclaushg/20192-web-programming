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