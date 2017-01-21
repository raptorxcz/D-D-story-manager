<?php
class AlorieWeb extends Web {
  
  function __construct() {
    parent::__construct(new HtmlView());
    $page = $this->page();
    
    $navigationView = new NavigationView();
    $navigationView->content = $page->view;
    $navigationView->title = $page->title;
    
    $this->view->content = $navigationView;
    $this->view->title = $page->title;
    $this->tidyHtml = false;
  }

  private function page() {
    $path = $this->url['path'];
    $components = explode('/', substr($path, 1));
    
    switch ($components[0]) {
    case 'meeting':
      if (count($components) >= 2) {
        return new MeetingPage((int)$components[1]);
      } else {
        return new IndexPage();
      }
        
    case 'person':
      if (count($components) >= 2) {
        return new PersonPage((int)$components[1]);
      } else {
        return new IndexPage();
      }
    
    case 'new-person':
      if (count($components) >= 2) {
        return new NewPersonPage((string)$components[1]);
      } else {
        return new IndexPage();
      }
      
    case 'event':
      if (count($components) >= 2) {
        return new EventPage((int)$components[1]);
      } else {
        return new IndexPage();
      }
    
    case 'login':
      return new LoginPage();
      
    case 'logout':
      return new LogoutPage();
      
    case 'maps':
      return new MapsPage();
        
    default:
      return new IndexPage();
    }
  }
 
}
?>
