<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Business Listings</title>
  </head>
  <body>
    <?php
    require '../connection.php';

    $conn = createConnection($server, $user, $password, $db_name);
    $name = 'category';
    if(isset($_POST[$name])){
      $selected_title = $_POST[$name];
//      print $selected_title;
    }
    ?>
    <h1>Business Listings</h1>
    <form action="biz_listing.php" method="POST" style="float: left; margin-right: 2rem;">
      <select size="5" name="category" onchange="this.form.submit()">
        <?php
        $attributes_array = ['Title'];
        $table_name = 'categories';
        $results = selectData($conn, $table_name, $attributes_array);
        while ($row = $results->fetch_assoc()) {
          print '<option>';
          print $row['Title'];
          print '</option>';
        }
        ?>
      </select>
    </form>
    <br>
    <table border="1">
      <tbody>
        <?php
        $attributes_array = ['BusinessID', 'Name', 'Address', 'City',
            'Telephone', 'URL', 'BusinessID', 'CategoryID'];
        $attributes_array_string = implode(',', $attributes_array);
        if(isset($_POST[$name])){
          
        $query = "SELECT B.BusinessID, B.Name, B.Address, B.City, B.Telephone, B.URL, BC.BusinessID, BC.CategoryID
                    FROM businesses B 
                    INNER JOIN biz_categories BC ON (B.BusinessID = BC.BusinessID)
                    INNER JOIN categories C ON (BC.CategoryID = C.CategoryID)
                    WHERE C.Title = '$selected_title';";
        $results = $conn->query($query);
        if (!$results) {
          trigger_error('Invalid query: ' . $conn->error);
        } else {
          while($row = $results->fetch_assoc()) {
            print '<tr>';
            foreach($attributes_array as $attribute){
              print '<td>';
              print $row[$attribute];
              print '</td>';
            }
            print '</tr>';
          }
        }
        }
        ?>
      </tbody>
    </table>
  </body>
</html>