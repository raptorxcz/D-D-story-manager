<?php
class PersonPage extends Page {

  protected $id = 0;

  function __construct($id) {
    global $db;
    parent::__construct(new PersonView());
    $this->id = $id;
    $this->handleAction();
    $db->where('id', $id);
    $person = $db->getOne('person');
    $this->title = $person['name'];
    $this->view->name = $person['name'];
    $this->view->race = $person['race'];
    $this->view->class = $person['class'];
    $this->processDescription($person['description']);
    $this->handleEditation($person);
  }
  
  private function handleEditation($person) {
    global $rights;
    
    if ($rights->isLogged()) {
      $this->showEditation($person);
    } else {
      $this->hideEditation();
    }
  }
  
  private function showEditation($person) {
    $formView = new FormView('form');
    $twoColumnsView = new TwoColumnsView();
    
    $textarea = new TextareaView();
    $textarea->title = 'Popis postavy';
    $textarea->name = 'content';
    $textarea->content = $person['description'];
    $twoColumnsView->first = $textarea;
    
    $rightColumn = new InputView('Rasa', 'race', $person['race']);
    $rightColumn .= new InputView('Povolání', 'class', $person['class']);
    $rightColumn .= $this->physicalRow($person);
    $rightColumn .= $this->psychicalRow($person);
    
    $checkbox = new CheckboxView();
    $checkbox->title = 'Admin';
    $checkbox->name = 'rights';
    $checkbox->checked = (bool)$person['rights'];
    
    $rightColumn .= $checkbox;
    $twoColumnsView->second = $rightColumn;
    
    $formView->content = $twoColumnsView;
    $section = new SectionView();
    $section->title = 'Editace';
    $section->content = $formView;
    $section->isBottomSeparatorShowed = false;
    $this->view->edit = $section;
  }
  
  private function physicalRow($person) {
    $physicalRow = new ThreeColumnsView();
    $physicalRow->first = new InputView('Síla', 'str', $this->abilityValue($person['str']));
    $physicalRow->second = new InputView('Obratnost', 'dex', $this->abilityValue($person['dex']));
    $physicalRow->third = new InputView('Odolnost', 'con', $this->abilityValue($person['con']));
    return $physicalRow;
  }
  
  private function psychicalRow($person) {
    $psychicalRow = new ThreeColumnsView();
    $psychicalRow->first = new InputView('Vůle', 'wis', $this->abilityValue($person['wis']));
    $psychicalRow->second = new InputView('Inteligence', 'int', $this->abilityValue($person['inte']));
    $psychicalRow->third = new InputView('Charisma', 'cha', $this->abilityValue($person['cha']));
    return $psychicalRow;
  }
  
  private function abilityValue($ability) {
    return $ability == 0 ? 11 : $ability;
  }
  
  private function hideEditation() {
    $this->view->edit = "";
  }
  
  private function processDescription($description) {
    $rows = explode("\n", $description);
    $description = '';
    
    foreach ($rows as $row) {
      $description .= '<li>'.$row.'</li>';
    }
    
    $this->view->description = $description;
  }
  
  function handleAction() {
    if (isset($_POST['submit'])) {
      global $db;
      $data = Array (
          'description' => trim($_POST['content']),
          'race' => $_POST['race'],
          'class' => $_POST['class'],
          'str' => $_POST['str'],
          'dex' => $_POST['dex'],
          'con' => $_POST['con'],
          'wis' => $_POST['wis'],
          'inte' => $_POST['int'],
          'cha' => $_POST['cha'],
          'rights' => (int)isset($_POST['rights']),
      );
      $db->where('id', $this->id);
      $db->update('person', $data);
    }
  }
  
}
?>