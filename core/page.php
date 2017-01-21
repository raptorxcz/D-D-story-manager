<?php
class Page {
  
  public $view;
  private $childPages = array();
  
  function __construct($view) {
    $this->view = $view;
  }
  
  function redirect($location) {
    header('Location: '.$location);
    exit;
  }
  
}

?>
