<!doctype html>
<html>
  <head>
    <title>Category Administrator</title>
  </head>
  <body>
    <font size="6">
    <b>Category Administrator</b>
    </font>
    <form action="admin.php" method="POST">
      <table>
        <thead>
          <tr>
            <td>Cat ID</td>
            <td>Title</td>
            <td>Description</td>
          </tr>
        </thead>
        <tbody>
          <?php
            require './serverConfig.php';
            
            $db_name = 'business_service';
            $table_name = 'Categories';
            $mysqli = new mysqli($server, $user, $password);
            if($mysqli->connect_errno){
              die("Cannot connect to $server!");
            }
            else {
              $selectCategoriesSqlQuery = "SELECT * FROM $table_name";
              $mysqli->select_db($db_name);
              $result = $mysqli->query($selectCategoriesSqlQuery);
              if($result) {
                while($row = $result->fetch_assoc()) {
                  print "<tr>";
                  print "<td>" . $row['CategoryID'] ."</td>";
                  print "<td>" . $row['Title'] ."</td>";
                  print "<td>" . $row['Description'] ."</td>";
                  print "</tr>";
                }
              }
            }
          ?>
        </tbody>
      </table>
    </form>
  </body>
</html>
