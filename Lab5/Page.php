<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Page {

  private $page;
  private $title;
  private $year;
  private $copyright;
  
  function __construct($title, $year, $copyright) {
    $this->title = $title;
    $this->year = $year;
    $this->copyright = $copyright;
  }

  function addHeader() {
    $this->page = $this->page . "<html><head><meta charset='UTF-8'><title>$this->title</title></head>";
  }

  function addContent($content) {
    $this->page = $this->page . "<body>$content</body>";
  }

  function addFooter() {
    $this->page = $this->page . "<footer><p>$this->year - $this->copyright</p></footer></body></html>";
  }

  function get() {
    return $this->page;
  }

}
?>

