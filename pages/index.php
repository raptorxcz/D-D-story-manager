<?php
class IndexPage extends WebPage {
  
  public $title = 'Index';

  function __construct() {
    parent::__construct(new IndexView());
    $this->addEvents();
    $this->addPeople();
    $this->addNames();
  }

  private function addEvents() {
    global $rights;
    
    if (!$rights->isLogged()) {
      $this->view->meetings = '<strong>Upozornění:</strong> Web není zabezpečen proti útoku. Z tohoto důvodu ho nezkoušejte hacknout, aby jste se dostali k příběhovým věcem, neboť by se vám to povedlo.';
      $this->view->exportLink = '';
      return;
    }
    
    global $db;
    $meetings = $db->get('meeting');
    $meetingsText = '';
    
    foreach ($meetings as $meeting) {
      $meetingsText .= '<li><a href="/meeting/'.$meeting['id'].'">'.$meeting['title'].'</a></li>';
    }
    
    $this->view->meetings = $meetingsText;
    $this->view->exportLink = '<li><a href="/export.php">people</a></li>';
  }
  
  private function addPeople() {
    global $db, $rights;
    $rights->adminWhereCondition();
    $people = $db->get('person');
    $peopleText = '';
    
    foreach ($people as $person) {
      $peopleText .= '<li><a href="/person/'.$person['id'].'">'.$person['name'].'</a></li>';
    }
    
    $this->view->people = $peopleText;
  }
  
  private function addNames() {
    $twoColumnsView = new TwoColumnsView();
    $twoColumnsView->first = $this->namesTextForType('M');
    $twoColumnsView->second = $this->namesTextForType('W');
    $this->view->names = $twoColumnsView;
  }
  
  private function namesTextForType($type) {
     $names = $this->names($type, 5);
     $namesText = '<ul>';
     global $rights;
    
     foreach ($names as $name) {
       if ($rights->isLogged()) {
         $name = '<a href="/new-person/'.urlencode($name['name']).'">'.$name['name'].'</a>';
       } else {
         $name = $name['name'];
       }
       
       $namesText .= '<li>'.$name.'</li>';
     }
     
     $namesText .= '</ul>';
     return $namesText;
  }
  
  private function names($sex, $limit) {
    global $db;
    $db->where('sex', $sex);
    $db->orderBy("RAND ()");
    $names = $db->get('name', $limit);
    return $names;
  }

}
?>