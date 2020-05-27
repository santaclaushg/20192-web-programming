<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

  define('DS', DIRECTORY_SEPARATOR);
  define('ROOT', dirname(dirname(__FILE__)));
  $url = $_GET['url'];
  
  require_once(ROOT . DS . 'library' . DS . 'bootstrap.php');
