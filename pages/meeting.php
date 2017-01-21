<?php
class MeetingPage extends Page {

  function __construct($id) {
    global $db;
    parent::__construct(new MeetingView());
    $db->where('id', $id);
    $meeting = $db->getOne('meeting');
    $this->title = $meeting['title'];
    $this->view->problem = $meeting['problem'];
    
    $this->view->theOpeningScene = $meeting['the_opening_scene'];
    $this->listOfQuestions($id);
    $this->listOfPeople($id);
    $this->processLore($meeting['lore']);
    $this->listOfEvents($id);
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
  
  private function listOfEvents($meetingId) {
    global $db;
    $maxId = $db->getValue('meeting', 'max(id)');
    
    if ($maxId == $meetingId) {
      $db->where('meeting', 0, '=', 'OR');
    }
    
    $db->orWhere('meeting', $meetingId, '=');
    $events = $db->get("event");
    $eventsText = '';
    
    $section = new SectionView();
    $section->title = 'Scény';
    $section->isBottomSeparatorShowed = false;
    
    $list = new ListView();
    
    foreach ($events as $event) {
      $link = new LinkView();
      $link->url = '/event/'.$event['id'];
      $link->content = $event['title'];
      $list->items[] = $link;
    }
    
    $section->content = $list;
    $this->view->events = $section;
  }

}
?>