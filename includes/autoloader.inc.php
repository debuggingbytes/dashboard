<?php
spl_autoload_register('myAutoLoader');

function myAutoLoader($className)
{
  //todo comment out before uploading to live server.
  $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  if (strpos($url, 'includes') !== false) {
    $path = '../classes/';
  } else {
    $path = 'classes/';
  }
  // ToDo remove comments when uploading to live server
  // $path = $_SERVER['HTTP_HOST'] . "/classes/";


  $extension = '.class.php';
  $url = $path . strtolower($className) . $extension;
  if (!file_exists($url)) {
    echo "Could not find file ... " . $url;
    exit();
  } else {
    require_once($url);
  }
}
