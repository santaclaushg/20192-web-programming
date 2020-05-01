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
      <table style="width: 100%">
        <thead align="center">
          <tr>
            <td width="20%" bgcolor="#c2bdbc">Cat ID</td>
            <td width="30%" bgcolor="#c2bdbc">Title</td>
            <td bgcolor="#c2bdbc">Description</td>
          </tr>
        </thead>
        <tbody>
          <?php
          require '../connection.php';

          function alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
          }

          // Activate the function which insert into the table Categories
          function insertIntoTable($mysqli, $table_name, ...$values) {
            [$catID, $title, $desc] = $values;
            $insertTableQuery = "INSERT INTO $table_name(
                        CategoryID, Title, Description) VALUES (
                        '$catID', '$title', '$desc')";
            $result = $mysqli->query($insertTableQuery);
            if (!$result) {
              alert("Failed to insert into table $table_name");
              print "<tr>";
              print "<td>";
              print "Failed to insert into table $table_name<br />";
              print "</td>";
              print "</tr>";
              die($mysqli->error);
            } else {
              alert("Insert into table $table_name successfully!");
              print "<tr>";
              print "<td>";
              print $catID;
              print "</td>";
              print "<td>";
              print $title;
              print "</td>";
              print "<td>";
              print $desc;
              print "</td>";
              print "</tr>";
              print "<tr>";
              print "<td>";
              print "Insert into table $table_name successfully!<br />";
              print "</td>";
              print "</tr>";
            }
          }

          $table_name = 'Categories';
          $mysqli = createConnection($server, $user, $password, $db_name);
          if (!is_null($mysqli)) {
            $selectCategoriesSqlQuery = "SELECT * FROM $table_name";
            $mysqli->select_db($db_name);
            $result = $mysqli->query($selectCategoriesSqlQuery);
            if ($result) {
              while ($row = $result->fetch_assoc()) {
                print "<tr>";
                print "<td>" . $row['CategoryID'] . "</td>";
                print "<td>" . $row['Title'] . "</td>";
                print "<td>" . $row['Description'] . "</td>";
                print "</tr>";
              }
            }
            if (!isset($_POST['category_is_added'])) {
              print "<tr>";
              print "<td>";
              print "<input type=\"text\" name=\"catID\" style=\"width: 95%\" />";
              print "</td>";
              print "<td>";
              print "<input type=\"text\" name=\"title\" style=\"width: 95%\" />";
              print "</td>";
              print "<td>";
              print "<input type=\"text\" name=\"desc\" style=\"width: 95%\" />";
              print "</td>";
              print "</tr>";
              print "<tr>";
              print "<td>";
              print "<input type=\"submit\" name=\"category_is_added\" value=\"Add Category\" style=\"width: 95%\" />";
              print "</td>";
              print "</tr>";
            } else {
              ['catID' => $catID, 'title' => $title, 'desc' => $desc] = $_POST;
              insertIntoTable($mysqli, $table_name, $catID, $title, $desc);
            }
          }
          ?>
        </tbody>
      </table>
    </form>
  </body>
</html>
