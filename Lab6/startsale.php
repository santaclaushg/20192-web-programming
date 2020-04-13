<!doctype html>
<html>
  <head>
    <title>Start sale page</title>
    <link rel="stylesheet" href="./startsale.css" type="text/css" />
  </head>
  <body>
    <div class="blue-font">Select Product We Just Sold:</div>
    <form action='sale.php' method="POST">
      <div>
        Hammer
        <input type="radio" name="product_desc" value="Hammer" />
        Screwdriver
        <input type="radio" name="product_desc" value="Screwdriver" />
        Wrench
        <input type="radio" name="product_desc" value="Wrench" />
      </div>
      <div>
        <input type="submit" value="Click To Submit" />
        <input type="reset" value="Reset" />
      </div>
    </form>
    <?php
    $server = 'localhost';
    $user = 'root';
    $password = '12345';
    $db_name = 'sale';
    $table_name = 'Products';

    $mysqli = new mysqli($server, $user, $password, $db_name);
    if ($mysqli->connect_errno) {
      die("Cannot connect to $server using $user...");
    } else {
      $selectProductQuery = "Select * FROM $table_name";
      $result = $mysqli->query($selectProductQuery);
      print "<br />The query is $selectProductQuery";
      print "<table border=1>";
      print "<thead>";
      print "<tr>";
      print "<th>Num</th>";
      print "<th>Product</th>";
      print "<th>Cost</th>";
      print "<th>Weight</th>";
      print "<th>Count</th>";
      print "</tr>";
      print "</thead>";
      if ($result->num_rows > 0) {
        print "<tbody>";
        $i = 0;
        $i++;
        while ($row = $result->fetch_assoc()) {
          print "<tr>";
          print "<td>$i</td>";
          print "<td>" . $row['Product_desc'] . "</td>";
          print "<td>" . $row['Cost'] . "</td>";
          print "<td>" . $row['Weight'] . "</td>";
          print "<td>" . $row['Numb'] . "</td>";
          $i++;
        }
        print "</table>";
      }
    }
    ?>
  </body>
</html>
