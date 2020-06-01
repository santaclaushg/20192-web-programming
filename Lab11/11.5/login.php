<?php session_start();
include "db_login.php";
$db_name = "lab11";
$conn = createConnection($server, $user, $password, $db_name);

//unset($_SESSION['UserName']);
//print("<p>" . $_SESSION['UserName'] . "</p>");
$_SESSION['ProductNamesAddedToCart'] = array();
?>
<html>
  <head>
    <title>Login</title>
  </head>
  <body>
    <form action="" method="POST">
      <input type="text" placeholder="username..." name="username" />
      <input type="text" placeholder="password..." name="password" />
      <?php
        if(isset($_POST['username'])){
//          print(2);
          $username = $_POST['username'];
          $userPassword = $_POST['password'];
          $userExisted = findUserExist($conn, $username, $userPassword);
          $_SESSION['UserName'] = $username;
//          print(1);
//          print('num rows: ' . $userExisted->num_rows);
          print("<p>Login successfully!");
          print("<p>Go the this <a href='http://localhost/20192-web-programming/Lab11/11.5/cart_shop.php'>link</a> to cart shop");
        }
        else {
//          print(3);
        }
      ?>
      <input type="submit" value="login" />
    </form>
  </body>
</html>
