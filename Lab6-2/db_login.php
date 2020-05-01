<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('DB.php');
$username = 'root';
$password = '12345';
$hostspec = 'localhost';
$database = 'business_service';
$dbtype = 'mysqli';

$dsn = "$dbtype://$username:$password@$hostspec/$database";

# Establish the connection
$db = DB::connect($dsn);
if (DB::isError($db)) {
  die($db->errorMessage());
}
?>