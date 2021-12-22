<?php

// // Convert date to "years | months | days | hours | seconds ago
// function timeChange($time)
// {
//   //Convert to epoch format
//   $newTime = strtotime($time);
//   $cur_time = time();

//   // Time Variables
//   $minute = 60;
//   $hour = 3600;
//   $day = 86400;
//   $week = 604800;
//   $month = 2629743;
//   $years = 31556926;
//   $thetime = $cur_time - $newTime;
//   $time = strtok($thetime, ".");

//   if ($time >= $years) {
//     print $time . " ";
//     $time = $time / $years;
//     $time = strtok($time, ".");
//     $result = "<span class='text-muted'>" . $time . " years ago</span>";
//   } elseif ($time >= $month && $time < $years) {
//     print $time . " ";
//     $time = $time / $month;
//     $time = strtok($time, ".");
//     $result = "<span class='text-muted'>" . $time . " months ago</span>";
//   } elseif ($time >= $week && $time < $month) {
//     print $time . " ";
//     $time = $time / $week;
//     $time = strtok($time, ".");
//     $result = "<span class='text-muted'>" . $time . " weeks ago</span>";
//   } elseif ($time >= $day && $time < $week) {
//     print $time . " ";
//     $time = $time / $day;
//     $time = strtok($time, ".");
//     $result = "<span class='text-muted'>" . $time . " days ago</span>";
//   } elseif ($time >= $hour && $time < $day) {
//     print $time . " ";
//     $time = $time / $hour;
//     print $time;
//     $time = strtok($time, ".");
//     $result = "<span class='text-muted'>" . $time . " hours ago</span>";
//   } elseif ($time >= $minute && $time < $hour) {
//     print $time . " ";
//     $time = $time / $minute;
//     $time = strtok($time, ".");
//     $result = "<span class='text-muted'>" . $time . " minutes ago</span>";
//   } elseif ($time >= 2 && $time < $minute) {
//     print $time . " ";
//     $time = strtok($time, ".");
//     $result = "<span class='text-muted'>" . $time . " seconds ago</span>";
//   } else {
//     $result = "<span class='text-muted'>a moment ago</span>";
//     echo $time;
//   }
//   return $result;
// }


function dueIn($in, $due)
{
  $origin = date_create($in);
  $target = date_create($due);
  $interval = date_diff($origin, $target);
  return $interval->format('%R%a days');
}


function timeChange($datetime, $full = false)
{

  $now = new DateTime;
  $ago = new DateTime($datetime);

  $diff = $now->diff($ago);

  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = array(
    'y' => 'year',
    'm' => 'month',
    'w' => 'week',
    'd' => 'day',
    'h' => 'hour',
    'i' => 'minute',
    's' => 'second',
  );
  foreach ($string as $k => &$v) {
    if ($diff->$k) {
      $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
    } else {
      unset($string[$k]);
    }
  }

  if (!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . ' ago' : 'just now';
}
