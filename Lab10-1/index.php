<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// index.php file  
include_once("controller/Controller.php");

$controller = new Controller();
$controller->invoke();

?>