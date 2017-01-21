<?php
class EventPage extends Page {
  
	function __construct($id) {
    global $db;
    parent::__construct(new EventView());
    $db->where('id', $id);
    $event = $db->getOne('event');
    $this->title = $event['title'];
    $this->view->title = $event['title'];
    $this->view->start = $event['start'];
    $this->view->description = $event['description'];
    $this->view->success = $event['success'];
    $this->view->failure = $event['failure'];
  }
  
}
?>