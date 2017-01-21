<?php
class EventView extends View {
  
  public $title;
  public $start;
  public $description;
  public $success;
  public $failure;
  
  protected function variables() {
    return array(
      'title' => $this->title,
      'start' => $this->start,
      'description' => $this->description,
      'success' => $this->success,
      'failure' => $this->failure,
    );
  }
}
?>