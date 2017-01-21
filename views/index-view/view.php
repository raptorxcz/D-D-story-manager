<?php
class IndexView extends View {
  
  public $meetings;
  public $people;
  public $names;
  public $exportLink;
  
  protected function variables() {
    return array(
      'meetings' => $this->meetings,
      'people' => $this->people,
      'names' => $this->names,
      'exportLink' => $this->exportLink
    );
  }
  
}
?>