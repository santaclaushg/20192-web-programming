<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Date time processing</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' href='./DateTimeProcessing.css' />
    </head>
    <body>
        <font>Enter your name and select date and time for the appointment</font>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
            <?php
            if (array_key_exists("day", $_GET)) {
                $name = $_GET['name'];
                $day = $_GET['day'];
                $month = $_GET['month'];
                $year = $_GET['year'];
                $hour = $_GET['hour'];
                $minute = $_GET['minute'];
                $second = $_GET['second'];
            }
            ?>
            <table>
                <tr>
                    <td>
                        Your name:
                    </td>
                    <td>
                        <input type="text" name="name" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Date:
                    </td>
                    <td>
                        <select name="day">
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                print("<option>$i</option>");
                            }
                            ?>
                        </select>
                        <select name="month">
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                print("<option>$i</option>");
                            }
                            ?>
                        </select>
                        <select name="year">
                            <?php
                            for ($i = 2001; $i <= 2010; $i++) {
                                print("<option>$i</option>");
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Time:
                    </td>
                    <td>
                        <select name="hour">
                            <?php
                            for ($i = 0; $i < 24; $i++) {
                                print("<option>$i</option>");
                            }
                            ?>
                        </select>
                        <select name="minute">
                            <?php
                            for ($i = 0; $i < 24; $i++) {
                                print("<option>$i</option>");
                            }
                            ?>
                        </select>
                        <select name="second">
                            <?php
                            for ($i = 0; $i < 24; $i++) {
                                print("<option>$i</option>");
                            }
                            ?>
                        </select>
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

                function is_leap_year($year) {
                    if ($year % 100 == 0 && $year % 400 == 0) {
                        return true;
                    }
                    return ($year % 4) == 0;
                }

                if (array_key_exists("day", $_GET)) {
                    print "<tr>Hi $name! </tr>";
                    print "<br />";
                    print "You have chosen to have an appointment on $hour:$minute:$second, $day/$month/$year";
                    print "<br />";
                    print "<br />";
                    print "More information";
                    print "<br />";
                    print "<br />";
                    $hour_in_12hours = $hour % 12;
                    print "In 12 hours, the time and date is $hour_in_12hours:$minute:$second PM, $day/$month/$year";
                    print "<br />";
                    switch ($month) {
                        case 1:
                        case 3:
                        case 5:
                        case 7:
                        case 8:
                        case 10:
                        case 12: {
                                $nb_days_in_month = 31;
                                break;
                            }
                        case 4:
                        case 6:
                        case 9:
                        case 11: {
                                $nb_days_in_month = 30;
                                break;
                            }
                        case 2: {
                                if (is_leap_year($year)) {
                                    $nb_days_in_month = 29;
                                } else {
                                    $nb_days_in_month = 28;
                                }
                                break;
                            }
                    }
                    print "This month has $nb_days_in_month days!";
                }
                ?>
            </table>
        </form>
    </body>
</html>
