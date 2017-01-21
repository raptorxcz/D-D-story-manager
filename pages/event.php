<?php
  class EventPage extends Page {
  
    function __construct($input) {
      global $db;
      parent::__construct(new EventView());
      
      if (is_array($input)) {
        $event = $input;
      } else {
        $db->where('id', (int)$id);
        $event = $db->getOne('event');
      }
      
      $this->view->title = $event['title'];
      $this->view->start = $event['start'];
      $this->view->description = $event['description'];
      $this->view->success = $event['success'];
      $this->view->failure = $event['failure'];
    }

  }
?>