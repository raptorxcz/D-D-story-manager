<?php
class TextareaView extends View {
  
  public $content;
  public $title;
  public $name;
  
  function __toString() {
    $label = new ElementView('label');
    $label->attributes = array(
      'for' => $this->name,
    );
    $label->content = $this->title;
    
    $title = new ElementView('h3');
    $title->content = $label;
    
    $textarea = new ElementView('textarea');
    $textarea->attributes = array(
      'rows' => '20',
      'cols' => '50',
      'name' => $this->name,
    );
    $textarea->content = $this->content;
    
    return (string)$title.$textarea;
  }
  
}

?>
