<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace TestShape;

function my_autoloader($class) {
//  print ucfirst($class);
  if (ucfirst($class) != 'Shape') {
    include(ucfirst($class) . ".php");
  }
}

spl_autoload_register('my_autoloader');

$myCollection = array();

// make a rectangle
$r = new Rectangle();
$r->width = 5;
$r->height = 7;
$myCollection[] = $r;
unset($r);

// make a triangle
$t = new Triangle();
$t->base = 4;
$t->height = 5;
$myCollection[] = $t;
unset($t);

// make a circle
$c = new Color();
$c->name = "Blue";
$myCollection[] = $c;
unset($c);

foreach ($myCollection as $s) {
  if ($s instanceof Shape) {
    print ("Area: " . $s->getArea() . "<br />\n");
  }
  if ($s instanceof Polygon) {
    print ("Sides: " . $s->getNumberOfSides() . "<br />\n");
  }
  if ($s instanceof Color) {
    print ("Color: " . $s->name() . "<br />\n");
  }
  print ("<br />");
}
?>