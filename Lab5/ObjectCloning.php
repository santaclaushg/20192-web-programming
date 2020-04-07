<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ObjectTracker {

  private static $nextSerial = 0;
  private $id;
  private $name;

  function __construct($name) {
    $this->name = $name;
    $this->id = ++self::$nextSerial;
  }

  function __clone() {
    $this->name = "Clone of $this->name";
    $this->id = ++self::$nextSerial;
  }

  function getId() {
    return $this->id;
  }

  function getName() {
    return $this->name;
  }

  function setName($name) {
    $this->name = $name;
  }

}

$ot = new ObjectTracker("Zeev's Object");
$ot2 = clone $ot;
//    if using assign operator, the first object $ot will change the name, which is "Another Object"
//    $ot2 = $ot;
$ot2->setName("Another Object");

//1 Zeev's Object
print($ot->getId() . " " . $ot->getName() . "<br />");
//2 Clone of Zeev's Object
print($ot2->getId() . " " . $ot2->getName() . "<br />");
?>