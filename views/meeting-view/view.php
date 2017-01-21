<?php
class MeetingView extends View {
  
  public $title;
  public $problem;
  public $lore;
  public $storyQuestions;
  public $theOpeningScene;
  public $people;
  public $events;
  
  protected function variables() {
    return array(
      'title' => $this->title,
      'problem' => $this->problem,
      'lore' => $this->lore,
      'storyQuestions' => $this->storyQuestions,
      'theOpeningScene' => $this->theOpeningScene,
      'people' => $this->people,
      'events' => $this->events,
    );
  }
  
}
?>