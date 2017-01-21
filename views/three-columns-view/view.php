<?php
class ThreeColumnsView extends View {
  
  public $first;
  public $second;
  public $third;
    
  protected function variables() {
    return array(
      'first' => $this->first,
      'second' => $this->second,
      'third' => $this->third,
    );
  } 
  
}

?>
