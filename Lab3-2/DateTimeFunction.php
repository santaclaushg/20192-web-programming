<html>
    <head>
        <title>Date time function!</title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
            <?php
                if(array_key_exists('first_person_birthday', $_GET)){
                    $first_person_name = $_GET["first_person_name"];
                    $first_person_birthday = $_GET["first_person_birthday"];
                    $second_person_name = $_GET["second_person_name"];
                    $second_person_birthday = $_GET["second_person_birthday"];
                }
                else {
                    $first_person_name = "";
                    $first_person_birthday = "00/00/0000";
                    $second_person_name = "";
                    $second_person_birthday = "00/00/0000";
                }
            ?>
            <table>
                <tr>
                    <td>Input the first person's name: </td>
                </tr>
                <tr>
                    <?php
                        print "<td><input type=\"text\" name=\"first_person_name\" value=$first_person_name ></td>";
                    ?>
                </tr>
                <tr>
                    <td>Input the first person's birthday(in form mm/dd/yyyy): </td>
                </tr>
                <tr>
                    <?php
                        print "<td><input type=\"date\" name=\"first_person_birthday\" value=$first_person_birthday ></td>";
                    ?>
                </tr>
                <tr>
                    <td>Input the second person's name: </td>
                </tr>
                <tr>
                    <?php
                        print "<td><input type=\"text\" name=\"second_person_name\" value=$second_person_name ></td>";
                    ?>
                </tr>
                <tr>
                    <td>Input the second person's birthday(in form mm/dd/yyyy): </td>
                </tr>
                <tr>
                    <?php
                        print "<td><input type=\"date\" name=\"second_person_birthday\" value=$second_person_birthday ></td>";
                    ?>
                </tr>
                <tr>
                    <td align="right">
                        <input type="submit" value="Submit" />
                    </td>
                    <td align="left">
                        <input type="reset" value="Reset" />
                    </td>
                </tr>
            </table>
            <table>
                <?php
                    function time_string($person_date) {
                        list($year, $month, $day) = explode("-", $person_date);
                        $timestamp = mktime(0, 0, 0, $month, $day, $year);
//                        print $timestamp;
                        $time_in_format = date("l, F d, Y", $timestamp);
                        return $time_in_format;
                    }
                    function calculate_diff_timestamp($person_date1, $person_date2){
                        list($year_person1, $month_person1, $day_person1) = explode("-", $person_date1);
                        $timestamp1 = mktime(0, 0, 0, $month_person1, $day_person1, $year_person1);
                        list($year_person2, $month_person2, $day_person2) = explode("-", $person_date2);
                        $timestamp2 = mktime(0, 0, 0, $month_person2, $day_person2, $year_person2);
                        
                        $difference_timestamp = $timestamp1 - $timestamp2 > 0 ? 
                                $timestamp1 - $timestamp2 : $timestamp2 - $timestamp1;
//                        print $difference_time_stamp;
                        return $difference_timestamp;
                    }
                    function calculate_diff_day($person_date1, $person_date2){
                        $difference_timestamp = calculate_diff_timestamp($person_date1, $person_date2);
                        $difference_day = $difference_timestamp / (60 * 60 * 24);
                        return $difference_day;
                    }
                    function calculate_diff_year($person_date1, $person_date2){
                        $difference_timestamp = calculate_diff_timestamp($person_date1, $person_date2);
//                        print $difference_time_stamp;
                        $difference_day = $difference_timestamp / (60 * 60 * 24 * 365);
                        return floor($difference_day);
                    }
                    function get_years_old($person_date) {
                        $date_now = new DateTime();
//                        print $date_now->format('Y-m-d');
                        $date_now_timestamp = $date_now->getTimestamp();
                        $difference_timestamp = calculate_diff_timestamp($person_date,$date_now->format('Y-m-d'));
                        $person_year_olds = $difference_timestamp / (60 * 60 * 24 * 365);
//                        print $person_year_olds;
                        return $person_year_olds;
                    }
                    if(array_key_exists("first_person_name", $_GET)){
                        $first_person_name = $_GET["first_person_name"];
                        $first_person_birthday = $_GET["first_person_birthday"];
                        $first_person_birthday_in_format = time_string($first_person_birthday);
                        $first_person_years_old = get_years_old($first_person_birthday);
                        
                        $second_person_name = $_GET["second_person_name"];
                        $second_person_birthday = $_GET["second_person_birthday"];
                        $second_person_birthday_in_format = time_string($second_person_birthday);
                        $second_person_years_old = get_years_old($second_person_birthday);
                        
                        $difference_day = calculate_diff_day($first_person_birthday, $second_person_birthday);
                        $difference_year = calculate_diff_year($first_person_birthday, $second_person_birthday);
                        print "<tr><td>First person's birthday:</td></tr>";
//                        print "<tr><td>$first_person_birthday</td></tr>";
                        print "<tr><td>$first_person_birthday_in_format</td></tr>";
                        print "<tr><td>Second person's birthday:</td></tr>";
                        print "<tr><td>$second_person_birthday_in_format</td></tr>";
                        print "<tr><td>The diffence day between 2 dates is: $difference_day</td></tr>";
                        print "<tr><td>The first person's years old: $first_person_years_old years old</td></tr>";
                        print "<tr><td>The second person's years old: $second_person_years_old years old </td></tr>";
                        print "<tr><td>The diffence year between 2 dates is: $difference_year</td></tr>";
                    }
                ?>
            </table>
        </form>
    </body>
</html>