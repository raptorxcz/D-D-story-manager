<?php
include_once(MAIN_DIR."core/image.php");

class SquareImage {

  public $name = "";
  public $attributes = array();
  public $size;

  function __construct($name) {
    $this->name = $name;
    $this->attributes['alt'] = $name;
  }

  function __toString() {
    return '<img src="'.$this->url(1).'" srcset="'.$this->url(1).' 1x, '.$this->url(2).' 2x, '.$this->url(3).' 3x"'.$this->formatedAttributes().'>'."\n";
  }

  private function url($scale = 1) {
    $attributes = array();

    if (isset($this->size)) {
      $attributes["size"] = $this->size * $scale;
    }
    
    $attributes['url'] = urlencode($this->name);
    
    $url = array();
    
    foreach ($attributes as $key => $value) {
      $url[] = $key."=".$value;
    }
    
    $urlString = implode("&amp;", $url);
    return '/square-image.php?'.$urlString;
  }

  private function formatedAttributes() {
    $string = "";
    
    foreach ($this->attributes as $key => $value) {
      $string .= ' '.((string)$key).'="'.((string)$value).'"';
    }

    return $string;
  }

}

?>
