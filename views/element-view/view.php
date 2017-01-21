<?php
class ElementView extends View {
  
  public $element;
  public $attributes = array();
  public $content;
  
  function __construct($element) {
    $this->element = $element;
    parent::__construct();
  }
  
  protected function variables() {
    return array(
      'element' => $this->element,
      'attributes' => $this->attributes(),
      'content' => $this->content
    );
  }
  
  private function attributes() {
    $attributesArray = array();
    
    foreach ($this->attributes as $key => $value) {
      $attributesArray[] = $key.'="'.$value.'"';
    }
    
    return implode(' ', $attributesArray);
  }
  
}
?>