<?php
class LinkView extends View {
  
  public $content;
  public $url;
  public $isLinkOpenedInNewWindow = true;
  
  function __toString() {
    $a = new ElementView('a');
    $a->content = $this->content;
    $attributes = array(
      'href' => $this->url
    );
    
    if ($this->isLinkOpenedInNewWindow) {
      $attributes['target'] = '_blank';
    }
    
    $a->attributes = $attributes;
    return (string)$a;
  }
  
}

?>
