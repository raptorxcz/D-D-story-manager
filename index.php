<?php
  include_once('core/assembly.php');
  
  $web = new AlorieWeb();
  echo (string)$web->renderView();
?>