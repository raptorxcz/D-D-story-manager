<?php
class LogoutPage extends Page {

  public $title = 'Logout';

  function __construct() {
    parent::__construct(new LogoutView());
    
    $this->handleLogout();
  }
  
  function handleLogout() {
    if (isset($_POST['submit'])) {
      global $rights;
      $rights->logout();
      $this->redirect('/');
    }
  }

}
?>