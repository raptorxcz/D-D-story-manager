<?php
class HtmlView extends View {
  
  public $content;
  public $title;
  
  protected function variables() {
    return array(
      'content' => $this->content,
      'title' => $this->title,
    );
  }
}
?>