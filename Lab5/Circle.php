<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Circle;

require "Shape.php";

class Circle extends Shape {

  public $radius;

  public function getArea() {
    return (pi() * $this->radius * $this->radius);
  }

}

print 1;
?>

