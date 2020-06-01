<?php session_start();

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$username = $_SESSION['UserName'];
if(!isset($username)) {
  header("Location: http://localhost/20192-web-programming/Lab11/11.4/login.php");
  die();
}
else {
  print('Login Successful!');
}

?>