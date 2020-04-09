<html>
  <head><title>Create table</title></head>
  <body>
    <?php
      $server = 'localhost';
      $user = 'root';
      $pass = '12345';
      $mydb = 'sale';
      $table_name = 'Products';
      $mysqli = new mysqli($server, $user, $pass);
      if($mysqli->connect_errno){
        die("Cannot connect to $server using $user");
      }
      else {
        $SQLcmd = "CREATE TABLE $table_name("
                . "ProductID INT UNSIGNED NOT NULL"
                . "AUTO_INCREMENT PRIMARY KEY,"
                . "Product_desc VARCHAR(50),"
                . "Cost INT,"
                . "Weight INT,"
                . "Numb INT)";
        $mysqli->select_db($mydb);
        if($mysqli->query($SQLcmd)){
          print '<font size="4" color="blue" >Created Table';
          print "<i>$table_name</i> in database<i>$mysql</i><br /></font>";
          print "<br>SQLcmd = $SQLcmd";
        }
        else {
          print "failed<br />";
          die("Table Create Creation Failed SQLcmd = $SQLcmd");
        }
        $mysqli->close($connect);
      }
    ?>
  </body>
</html>