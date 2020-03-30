<html>
    <head>
        <title>
            Radian degree conversion
        </title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
            <?php
                if(array_key_exists("radian", $_GET)){
                    $radian = $_GET["radian"];
                }
                else {
                    $radian = 0;
                }
            ?>
            <table>
                <tr>
                    <td>
                        <font>Input a angle in radian: </font>
                    </td>
                    <?php
                        print "<td><input type=\"text\" name=\"radian\" value=$radian /></td>";
                    ?>
                    <td>
                        π radian
                    </td>
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
                    if(array_key_exists("radian", $_GET)){
                        $radian = $_GET["radian"];
                        $degree = 180 * $radian;
                        print "<tr><td>The value in degree is $degree degree!</td></tr>";
                    }
                ?>
            </table>
        </form>
    </body>
</html>