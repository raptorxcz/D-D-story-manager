<?php
class Localization { // implements ArrayAccess
  
  public $currentLocale = "cs";
  public $currentLocaleKey = "cs";

  private $localizations = array();
  private static $instance;
 
  public static function defaultLocalization() {
    if (null === static::$instance) {
      static::$instance = new static();
    }

    return static::$instance;
  }

//   public function offsetSet($offset, $value) {
//       if (is_null($offset)) {
//           $this->localizations[] = $value;
//       } else {
//           $this->localizations[$offset] = $value;
//       }
//   }
//
//   public function offsetExists($offset) {
//       return isset($this->localizations[$offset]);
//   }
//
//   public function offsetUnset($offset) {
//       unset($this->localizations[$offset]);
//   }
//
//   public function offsetGet($offset) {
//       return isset($this->localizations[$offset]) ? $this->localizations[$offset] : null;
//   }
}
?>