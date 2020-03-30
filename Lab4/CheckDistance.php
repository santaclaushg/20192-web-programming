<html>
    <head>
        <title>Distance and Time Calculations</title>
    </head>
    <body>
        <table>
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
            for($i = 0;$i < count($destination); $i++) {
                if(isset($cities[$destination[$i]])) {
                    $distance = $cities[$destination[$i]];
                    $time = round( ($distance / 60), 2);
                    $walktime = round( ($distance / 5), 2);
                    print "<tr>The distance between Chicago and <i>$destination[$i]</i> is $distance miles.</tr>";
                    print "<br>Driving at 60 miles per hour it would take $time hours.";
                    print "<br>Walking at 5 miles per hour it would take $walktime hours.";
                }
                else {
                    print "Sorry, do not have destination information for $destination[$i].";
                }
                print "<br />";
            }
        ?>
        </table>
    </body>
</html>