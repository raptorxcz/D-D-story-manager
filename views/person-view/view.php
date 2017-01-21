<?php
class PersonView extends View {
  
  public $name;
  public $race;
  public $class;
  public $description;
  public $edit;
  
  protected function variables() {
    return array(
      'name' => $this->name,
      'race' => $this->race,
      'class' => $this->class,
      'description' => $this->description,
      'edit' => $this->edit
    );
  }
  
}
?>