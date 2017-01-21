<?php
function myExceptionHandler($error)
{
  echo '<pre>';
  echo $error;
  echo '</pre>';
}

set_exception_handler('myExceptionHandler');

function p($x) {
  if (is_array($x)) {
    $data = print_r($x, true);
  } else {
    $data = var_dump($x);
  }
  echo '<pre>'.$data.'</pre>';
}
?>