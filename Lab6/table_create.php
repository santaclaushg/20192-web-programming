<!DOCTYPE html>
<html lang="en" dir="1tr">
  <head>
    <meta charset="UTF-8">
    <title>Create table</title>
  </head>
  <body>
    <?php
      $server = 'localhost';
      $user = 'root';
      $pass = '12345';
      $mydb = 'sale';
      $table_name = 'Products';
      $connection = mysqli_connect($server, $user, $pass);
      if(!$connection){
        die("Cannot connect to $server using $user");
      }
      else {
        $SQLcmd = "CREATE TABLE $table_name(
                ProductID INT UNSIGNED NOT NULL
                AUTO_INCREMENT PRIMARY KEY,
                Product_desc VARCHAR(50),
                Cost INT,
                Weight INT,
                Numb INT)";
        mysqli_select_db($connection, $mydb);
        if(mysqli_query($connection, $SQLcmd)){
          print '<font size="4" color="blue" >Created Table';
          print "<i>$table_name</i> in database<i>$mydb</i><br /></font>";
          print "<br>SQLcmd = $SQLcmd";
        }
        else {
          die("Table Create Creation Failed SQLcmd = $SQLcmd");
        }
        mysqli_close($connection);
      }
    ?>
  </body>
</html>