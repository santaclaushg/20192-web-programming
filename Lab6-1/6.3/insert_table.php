<hmtl>
  <header>
    <meta charset="UTF-8">
    <title>Insert table page</title>
  </header>
  <body>
    <?php
      $description = $_POST['description'];
      $weight = $_POST['weight'];
      $cost = $_POST['cost'];
      $numberAvailable = $_POST['numberAvailable'];
    
      $server = 'localhost';
      $user = 'root';
      $password = '12345';
      $database = 'sale';
      $table_name = 'Products';
      $connection = mysqli_connect($server, $user, $password);
      if(!$connection) {
        die("Cannot connect to $server using $user");
      }
      else {
//        print $description;
        $insertProductQuery = "INSERT INTO $table_name(
                  Product_desc, Cost, Weight, Numb)
                  VALUES ('$description', $cost, $weight, $numberAvailable);";   
        mysqli_select_db($connection, $database);
        if(mysqli_query($connection, $insertProductQuery)){
          print "The Query is $insertProductQuery";
          print "<br />Insert into $database successfully!";
        }
        else {
          print mysqli_error($connection);
//          die("Insert failed! <br /> The query is $insertProductQuery");
        }
        mysqli_close($connection);
      }
    ?>
  </body>
</hmtl>