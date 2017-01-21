<?php
function myExceptionHandler($error)
{
  echo '<pre>';
  echo $error;
  echo '</pre>';
}

set_exception_handler('myExceptionHandler');

function p($x) {
  $data = print_r($x, true);
  echo '<pre>'.$data.'</pre>';
}
?>