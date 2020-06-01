<?php
include "db_login.php";
$db_name = "lab11";
$conn = createConnection($server, $user, $password, $db_name);
?>
<html>
  <?php session_start(); ?>
  <head>
    <title>Login</title>
  </head>
  <body>
    <form action="" method="POST">
      <input type="text" name="username" />
      <input type="text" name="password" />
      <?php
        if(isset($_POST['username'])){
          $username = $_POST['username'];
          $userPassword = $_POST['password'];
          $userExisted = findUserExist($conn, $username, $userPassword);
          if($userExisted->num_rows == 1) {
            include_once('welcome_page.html');
            $_SESSION['UserName'] = $username;
          }
          else {
            print('<p style="color: red;">Error login</p>');
          }
        }
      ?>
      <input type="submit" value="submit" />
    </form>
  </body>
</html>
