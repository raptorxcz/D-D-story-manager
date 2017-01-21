<?php
class LoginPage extends Page {
  
  public $title = 'Login';
  
  function __construct() {
    parent::__construct(new LoginView());
    $this->handleLogin();
  }
  
  function handleLogin() {
    if (isset($_POST['submit']) && $_POST['login'] == 'alorie' && $_POST['password'] == 'alorie') {
      global $rights;
      $rights->login();
      $this->redirect('/');
    }
  }

}
?>