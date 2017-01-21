<?php
class SectionView extends View {
  
  public $content;
  public $title;
  public $isBottomSeparatorShowed = true;
  
  function __toString() {
    $title = new ElementView('h2');
    $title->content = $this->title;
    
    $content = $title;
    $content .= $this->content;
    
    if ($this->isBottomSeparatorShowed) {
      $separator = new ElementView('img');
      $separator->attributes = array(
        'src' => '/images/separator.png',
        'alt' => '',
        'class' => 'separator',
      );
      $content .= $separator;
    }
    
    return (string)$content;
  }
  
}

?>
