<?php
function __autoload($class) {
  if (substr($class, -strlen('Page')) == 'Page' || substr($class, -strlen('Web')) == 'Web' ) {
    $file = MAIN_DIR.'pages/'.classNameToFile($class).'.php';
  } else {
    $file = MAIN_DIR.'views/'.classNameToFile($class).'/view.php';
  }
  
  if(file_exists($file))
    require_once $file;
  else
    throw new Exception(sprintf("Unable to load: %s, expected at: %s", $class, $file), 1);
}

function classNameToFile($string) {
  $string = str_replace('Page', '', $string);
  $r = '';
  $first = true;
  
  for ($i = 0; $i < strlen($string); $i++) { 
    if ($string[$i] >= 'A' && $string[$i] <= 'Z') { 
      if(!$first)
        $r .= '-';
        
      $first = false;
      $r .= strtolower($string[$i]);
    } else {
      $r.= $string[$i];
    }
  }

  return $r;
}
?>