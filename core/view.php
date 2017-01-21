<?php
class View {

    private $variables = array();
    private $templateName = '';
    
    function __construct($templateName = 'view') {
      $this->templateName = $templateName;
    }
    
    function __toString() {
      try {
        return (string)$this->processView($this->relativeTemplatePath(), $this->variables());
      } catch (Exception $e) {
        myExceptionHandler($e);
      }
    }
    
    protected function variables() {
      return array();
    }
    
    private function processView($relativeTemplatePath, $data = array()) {
      if (!file_exists($relativeTemplatePath)) {
        throw new Exception(sprintf("Unable to load: %s", $relativeTemplatePath), 1);
      }
      
      $content = file_get_contents($relativeTemplatePath);
      $keys = array_keys($data);
      $strKeys = array();
      $strData = array();

      foreach($keys as $key => $value) {
        $strKeys[$key] = '{'.$value.'}';
        $strData[$key] = (string)$data[$value];
      }
      
      return str_replace($strKeys, $strData, $content);
    }
    
    private function path() {
      // get reflection for the current class
      $reflection = new ReflectionClass(get_called_class());

      // get the filename where the class was defined
      $definitionPath = $reflection->getFileName();

      // set the class image path
      return realpath(dirname($definitionPath)).'/';
    }
    
    private function relativeTemplatePath() {
      $key = Localization::defaultLocalization()->currentLocaleKey;
      $dir = $this->path();
      $template = $dir.$this->templateName.".".$key.".html";
      
      if (file_exists($template)) {
        return $template;
      } else {
        return $dir.$this->templateName.".html";
      }
    }
  }
?>