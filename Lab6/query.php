<!doctype html>
<html>
  <header>
    <meta charset="UTF-8">
    <title>Query page</title>
  </header>
  <body>
    <?php
    $server = '127.0.0.1';
    $user = 'root';
    $password = '12345';
    $database = 'sale';
    $table_name = 'Products';

    $connection = mysqli_connect($server, $user, $password);
    if (!$connection) {
      die("Cannot connect to $server using $user");
    } else {
      $selectProductQuery = "SELECT * FROM $table_name";
      mysqli_select_db($connection, $database);
      $result = mysqli_query($connection, $selectProductQuery);
      if (mysqli_num_rows($result) > 0) {
        print "<font color=\"blue\" size=5>Product Data</font><br />";
        print "The Query is $selectProductQuery";
        print "<table border=1>";
        print "<thead>";
        print "<tr>";
        print "<th>Num</th>";
        print "<th>Product</th>";
        print "<th>Cost</th>";
        print "<th>Weight</th>";
        print "<th>Count</th>";
        print "</thead>";
        print "<tbody>";
        $i = 0;
        $i++;
        while ($row = mysqli_fetch_assoc($result)) {
          print "<tr>";
          print "<td>" . $i . "</td>";
          print "<td>" . $row['Product_desc'] . "</td>";
          print "<td>" . $row['Cost'] . "</td>";
          print "<td>" . $row['Weight'] . "</td>";
          print "<td>" . $row['Numb'] . "</td>";
          $i++;
        }
        mysqli_free_result($result);
      }
    }
    ?>
  </body>
</html>