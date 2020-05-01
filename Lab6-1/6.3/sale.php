<!doctype html>
<html>
  <head>
    <title>Sale page</title>
    <link rel="stylesheet" href="./sale.css" />
  </head>
  <body>
    <div class="blue-5">Update Results for Table Products</div>
    <?php
      $server = 'localhost';
      $user = 'root';
      $password = '12345';
      $db_name = 'sale';
      $table_name = 'Products';
      $product_desc = $_POST['product_desc'];
//      print $product_desc;
      
      $mysqli = new mysqli($server, $user, $password);
      if($mysqli->connect_errno) {
        die("Cannot connect to $server using $user");
      }
      else {
        $updateProductSqlQuery = "UPDATE Products SET Numb = Numb - 1
                WHERE (Product_desc = 'Hammer');";
//        $result = $mysqli->query($updateProductSqlQuery);
        
        print "<div>The query is $updateProductSqlQuery</div>";
        $mysqli->select_db($db_name);
        $result = $mysqli->query($updateProductSqlQuery);
        
        if($result) {
          print "<br />";
          print "<table border=\"1\">";
          print "<thead>";
          print "<tr>";
          print "<td>Num</td>";
          print "<td>Product</td>";
          print "<td>Cost</td>";
          print "<td>Weight</td>";
          print "<td>Count</td>";
          print "</tr>";
          print "</thead>";
          $selectProductQuery = "SELECT * FROM $table_name;";
          $result = $mysqli->query($selectProductQuery);
          if($result->num_rows > 0){
            print "<tbody>";
            $i = 0;
            $i++;
            while($row = $result->fetch_assoc()) {
              print "<tr>";
              print "<td>$i</td>";
              print "<td>" . $row['Product_desc'] . "</td>";
              print "<td>" . $row['Cost'] . "</td>";
              print "<td>" . $row['Weight'] . "</td>";
              print "<td>" . $row['Numb'] . "</td>";
              print "</tr>";
              $i++;
            }
            print "</table>";
          }
        }
        else {
          die("<br />" . $mysqli->error);
        }
      }
    ?>
  </body>
</html>
