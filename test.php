<?php

$name = 10;




$notName = "10";

print "<h1>Hello, " . $name . " " . $notName . "</h1>";

if ($notName === $name) {
  print "Absolute - Its the same<br>";
} else {
  print "Absolute - Its not the same<br>";
}

if ($notName == $name) {
  print "SAME";
} else {
  print " NOT SAME ";
}
