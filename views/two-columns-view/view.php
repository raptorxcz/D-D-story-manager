<?php
class TwoColumnsView extends View {
  
  public $first;
  public $second;
    
  protected function variables() {
    return array(
      'first' => $this->first,
      'second' => $this->second,
    );
  } 
  
}

?>
