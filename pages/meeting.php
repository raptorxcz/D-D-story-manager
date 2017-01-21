<?php
class MeetingPage extends Page {

	protected $meeting;

  function __construct($id) {
    global $db;
    parent::__construct(new MeetingView());
    $db->where('id', $id);
    $meeting = $db->getOne('meeting');
    $this->meeting = $meeting;
    $this->title = $meeting['title'];
    $this->view->problem = $meeting['problem'];
    
    $this->view->theOpeningScene = $meeting['the_opening_scene'];
    $this->listOfQuestions($id);
    $this->listOfPeople($id);
    $this->processLore($meeting['lore']);
    $this->eventsSection($id);
  }
  
  private function processLore($lore) {
    $rows = explode("\n", $lore);
    $lore = '';
    
    foreach ($rows as $row) {
      $lore .= '<li>'.$row.'</li>';
    }
    
    $this->view->lore = $lore;
  }
  
  private function listOfQuestions($meetingId) {
    global $db;
    $db->where('meeting', $meetingId);
    $questions = $db->get('story_question');
    $storyQuestions = '';
    
    foreach ($questions as $question) {
      $storyQuestions .= '<li>'.$question['question'].'</li>';
    }
    
    $this->view->storyQuestions = $storyQuestions;
  }
  
  private function listOfPeople($meetingId) {
    global $db;
    $db->join("person_in_meeting pie", "p.id = pie.person", "LEFT");
    $db->where("pie.meeting", $meetingId);
    $people = $db->get("person p");
    $peopleText = '';
    
    foreach ($people as $person) {
      $peopleText .= '<li><a href="/person/'.$person['id'].'">'.$person['name'].'</a></li>';
    }
    
    $this->view->people = $peopleText;
  }
  
  private function eventsSection($meetingId) {
	$section = new SectionView();
    $section->title = 'Scény';
    $section->isBottomSeparatorShowed = false;
    $section->content = $this->listOfEvents(0);
    $this->view->events = $section;
  }
  
  private function listOfEvents($parentId) {
    global $db;
    
    $this->setEventQuery();
    $db->where('parent', $parentId);
    $events = $db->get("event");
    $eventsText = '';
    $list = new ListView();
    
    foreach ($events as $event) {
      $link = new LinkView();
      $link->url = '/event/'.$event['id'];
      $link->content = $event['title'];
      $list->items[] = $link.$this->listOfEvents($event['id']);
    }
    
    return $list;
  }
  
  private function setEventQuery() {
	global $db;
	$maxId = $db->getValue('meeting', 'max(id)');
	
    if ($maxId == $this->meeting['id']) {
        $db->where('meeting', array(0, $this->meeting['id']), "IN");
    } else {
	    $db->where('meeting', $this->meeting['id']);
    }
  }

}
?>