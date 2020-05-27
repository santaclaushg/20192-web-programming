<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Model extends SQLQuery {
  protected $_model;
  
  function __construct() {
    $this->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $this->_model = get_class($this);
    $this->_table = strtolower($this->_model)."s";
  }
  function __destruct() {
    
  }
}
