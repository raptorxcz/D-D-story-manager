<?php
class Image {

  public $name = "";
  public $attributes = array();
  public $width;
  public $height;

  function __construct($name) {
    $this->name = $name;
    $this->attributes['alt'] = $name;
  }

  function __toString() {
    return '<img src="'.$this->url(1).'" srcset="'.$this->url(1).' 1x, '.$this->url(2).' 2x, '.$this->url(3).' 3x"'.$this->formatedAttributes().'>'."\n";
  }

  private function url($scale = 1) {
    $attributes = array();

    if (isset($this->width)) {
      $attributes["width"] = $this->width * $scale;
    }

    if (isset($this->height)) {
      $attributes["height"] = $this->height * $scale;
    }

    $attributes['url'] = urlencode($this->name);
    
    $url = array();
    
    foreach ($attributes as $key => $value) {
      $url[] = $key."=".$value;
    }
    
    $urlString = implode("&amp;", $url);
    return '/image.php?'.$urlString;
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
