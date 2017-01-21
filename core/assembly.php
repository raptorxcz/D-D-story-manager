<?php
error_reporting(E_ALL);
$fileDir = dirname(__FILE__);
$fileDir = substr($fileDir, 0, -5);
define('MAIN_DIR',  $fileDir. '/');
include_once('core/helperFunctions.php');
require_once(MAIN_DIR.'core/localization.php');
require_once(MAIN_DIR.'core/view.php');
include_once(MAIN_DIR.'core/database.php');
include_once(MAIN_DIR.'core/rights.php');
include_once(MAIN_DIR."core/page.php");
require_once(MAIN_DIR.'core/web.php');
include_once(MAIN_DIR.'core/autoload.php');
include_once(MAIN_DIR.'core/webPage.php');

?>