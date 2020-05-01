<!doctype html>
<html>
  <head>
    <title>Date Check</title>
  </head>
  <body>
    <?php
    $date = $_POST['date'];
    if (preg_match("/^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.]((?:19|20)\d\d)$/", $date)) {
      print "Valid date=$date <br />";
    } else {
      print "Invalid date=$date";
    }
    ?>
  </body>
</html>
