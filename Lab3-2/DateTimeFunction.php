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
                    function display_date($person_date) {
                        $array_date = explode("-", $person_date);
                        $year = $array_date[0];
                        $month = $array_date[1];
                        $day = $array_date[2];
                        print "<tr><td>$array_date[1]</td></tr>";
                    }
                    if(array_key_exists("first_person_name", $_GET)){
                        $first_person_name = $_GET["first_person_name"];
                        $first_person_birthday = $_GET["first_person_birthday"];
                        $second_person_name = $_GET["second_person_name"];
                        $second_person_birthday = $_GET["second_person_birthday"];
                        print "<tr><td>$first_person_birthday</td></tr>";
                        display_date($first_person_birthday);
                    }
                ?>
            </table>
        </form>
    </body>
</html>