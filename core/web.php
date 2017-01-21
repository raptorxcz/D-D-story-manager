<?php
  class Web extends Page {
    
    protected $url = array();
    protected $tidyHtml = true;
    
    function __construct($view) {
      $urlString = $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      $this->url = parse_url($urlString);
      parent::__construct($view);
    }
    
    function view() {
      return $this->view;
    }
    
    function renderView() {
      if ($this->tidyHtml) {
        $tidy_options = array(
          'indent' => 2,
          'output-html' => true,
          'wrap' => 0
        );
        $tidy = new Tidy();
        $tidy->parseString($this->view(), $tidy_options, 'utf8');
        $tidy->cleanRepair();
        return tidy_get_output($tidy);
      } else{
        return $this->view();
      }
    }
    
  }
?>
