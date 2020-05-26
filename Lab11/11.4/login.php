<?php
include "db_login.php";
$db_name = "Lab12";
$conn = createConnection($server, $user, $password, $db_name);
?>
<html>
  <head>
    <title>Login</title>
  </head>
  <body>
    <form action="check_login.php" method="POST">
    </form>
  </body>
</html>
