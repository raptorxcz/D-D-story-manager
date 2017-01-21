<?php
class MapsPage extends Page {

  public $title = 'Mapy';
  
  function __construct() {
    parent::__construct(new MapView());
  }
  
}
?>