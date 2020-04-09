<html>
  <head>
    <title>Distance and Time Calculations</title>
  </head>
  <body>
    <table border="1" >
      <thead>
        <tr>
          <th>No.</th>
          <th>Destination</th>
          <th>Distance</th>
          <th>Driving time</th>
          <th>Walking time</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $cities = array(
            'Dallas' => 803,
            'Toronto' => 435,
            'Boston' => 848,
            'Nashville' => 406,
            'Las Vegas' => 1526,
            'San Francisco' => 1835,
            'Washington, DC' => 595,
            'Miami' => 1189,
            'Pittburgh' => 409
        );
        $destination = $_GET['destination'];
//            print count($destination);
//            print "<br />";
        $count = 1;
        foreach ($destination as $dest) {
          if (isset($cities[$dest])) {
            $distance = $cities[$dest];
            $time = round(($distance / 60), 2);
            $walktime = round(($distance / 5), 2);
            print "<tr>";
            print "<td>$count</td>";
            print "<td>$dest</td>";
            print "<td>$distance</td>";
            print "<td>$time</td>";
            print "<td>$walktime</td>";
            print "</tr>";
          } else {
            print "Sorry, do not have destination information for $dest.";
          }
          $count++;
        }
        ?>
      </tbody>
    </table>
  </body>
</html>