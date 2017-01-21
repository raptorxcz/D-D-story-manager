<?php
class CheckboxView extends View {
  
  public $title;
  public $name;
  public $checked;
  
  function __toString() {
    $label = new ElementView('label');
    $label->attributes = array(
      'for' => $this->name,
    );
    $label->content = $this->title;
    
    $title = new ElementView('h3');
    $title->content = $label;
    
    $checkbox = new ElementView('input');
    $checkbox->attributes = array(
      'name' => $this->name,
      'type' => 'checkbox',
    );
    
    if ($this->checked) {
      $checkbox->attributes['checked'] = 'checked';
    }
    
    return (string)$title.$checkbox;
  }
  
}

?>
