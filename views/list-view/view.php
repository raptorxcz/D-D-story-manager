<?php
class ListView extends View {
  
  public $items = array();
  
  function __toString() {
    $list = new ElementView('ul');
    $content = '';
    
    foreach ($this->items as $item) {
      $row = new ElementView('li');
      $row->content = $item;
      $content .= $row;
    }
    
    $list->content = $content;
    return (string)$list;
  }
  
}

?>
