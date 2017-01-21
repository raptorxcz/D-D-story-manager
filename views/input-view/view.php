<?php
class InputView extends View {
  
  public $title;
  public $name;
  public $value;
  
  function __construct($title, $name, $value) {
    parent::__construct();
    $this->title = $title;
    $this->name = $name;
    $this->value = $value;
  }
  
  protected function variables() {
    return array(
      'title' => $this->title,
      'name' => $this->name,
      'value' => $this->value,
    );
  }
  
}
?>
