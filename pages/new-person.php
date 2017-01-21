<?php
  class NewPersonPage extends Page {
  
    function __construct($name) {
      global $db;
      parent::__construct(new EmptyView());
      
      $id = $db->insert('person', array(
        'name' => urldecode($name)
      ));
      
      $this->redirect('/person/'.$id);
    }
  
  }
?>