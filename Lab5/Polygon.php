<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Polygon;

include "Shape.php";

// abstract child class
abstract class Polygon extends Shape {

  abstract function getNumberOfSides();
}

?>