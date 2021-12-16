<?php

	// Convert date to "years | months | days | hours | seconds ago
	function timeChange($time){
		//Convert to epoch format
		$newTime = strtotime($time);
		$cur_time = time();

		// Time Variables
		$minute = 60;
		$hour = 3600;
		$day = 86400;
		$week = 604800;
		$month = 2629743;
		$years = 31556926;
		$thetime = $cur_time - $newTime;
		$time = strtok($thetime, ".");

		if($time >= $years){
			$time = $time / $years;
			$time = strtok($time, ".");
			$result = "<span class='text-muted'>".$time." years ago..</span>";
		}elseif($time >= $month && $time < $years){
			$time = $time / $month;
			$time = strtok($time, ".");
			$result = "<span class='text-muted'>".$time." monthss ago..</span>";
		}elseif($time >= $week && $time < $month){
			$time = $time / $week;
			$time = strtok($time, ".");
			$result = "<span class='text-muted'>".$time." weeks ago..</span>";
		}elseif($time >= $day && $time < $week){
			$time = $time / $day;
			$time = strtok($time, ".");
			$result = "<span class='text-muted'>".$time." days ago..</span>";
		}elseif($time >= $hour && $time < $day){
			$time = $time / $hour;
			$time = strtok($time, ".");
			$result = "<span class='text-muted'>".$time." hours ago..</span>";
		}elseif($time >= $minute && $time < $hour){
			$time = $time / $minute;
			$time = strtok($time, ".");
			$result = "<span class='text-muted'>".$time." minutes ago..</span>";
		}elseif($time >= 2 && $time < $minute){
			$time = strtok($time, ".");
			$result = "<span class='text-muted'>".$time." seconds ago..</span>";
		}else{
			$result = "<span class='text-muted'>a moment ago</span>";
			echo $time;
		}
		return $result;
	}
	