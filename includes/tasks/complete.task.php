<?php
ini_set("memory_limit", "36M");
$tid = (int) filter_input(INPUT_GET, 'project_id', FILTER_VALIDATE_INT, ['options' => ['default' => -1]]);
$uid = (int) filter_input(INPUT_GET, 'user_id', FILTER_VALIDATE_INT, ['options' => ['default' => -1]]);
$task = filter_input(INPUT_GET, 'task', FILTER_DEFAULT, ['options' => ['default' => -1]]);
include("../../classes/dbh.class.php");
include("../../classes/tasks.class.php");
include("../../classes/taskscontr.class.php");
// include("../autoloader.inc.php");

//Activity
include("../../classes/activity.class.php");
include("../../classes/activitycontr.class.php");
$actObj = new ActivityContr();
$result = $actObj->activity($uid, $task, "COMPLETED");

$taskObj = new TasksContr();

$msg = $taskObj->completeTask($tid);

$result = '
<div class="d-flex justify-content-center">
<div class="alert alert-success col-md-4" role="alert">
  <h4 class="alert-heading">Marked Completed</h4>
  <p>This project has been successfully marked off as completed. You will not be redirected</p> 
</div></div>';
print $result;
