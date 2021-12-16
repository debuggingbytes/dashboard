<?php
spl_autoload_register('myAutoLoader');

function myAutoLoader($className)
{
  $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  if (strpos($url, 'includes') !== false) {
    $path = '../classes/';
  } else {
    $path = 'classes/';
  }
  $extension = '.class.php';
  $url = $path . strtolower($className) . $extension;
  if (!file_exists($url)) {
    echo "Could not find file ... " . $url;
    exit();
  } else {
    require_once($url);
  }
}
