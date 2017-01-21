<?php
class Rights {
  
  function isLogged() {
    return isset($_COOKIE['rights']) && $_COOKIE['rights'] > 0;
  }
  
  function login() {
    setCookie('rights', "1");
  }
  
  function logout() {
    setCookie('rights', "0", time()-3600);
  }
  
  function adminWhereCondition() {
    global $db;
    $rights = $this->isLogged() ? 1 : 0;
    $db->where('rights', $rights, "<=");
  }
  
}

$rights = new Rights()
?>