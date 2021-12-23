<?php

// Page includes
include("../../classes/dbh.class.php");
include("../../classes/tasks.class.php");
include("../../classes/taskscontr.class.php");
// include("../autoloader.inc.php");

//Activity
include("../../classes/activity.class.php");
include("../../classes/activitycontr.class.php");

//Tickets
include("../../classes/tickets.class.php");
include("../../classes/ticketcontr.class.php");


//Various get methods for switch handler
$uid = (int) filter_input(INPUT_GET, 'user_id', FILTER_VALIDATE_INT, ['options' => ['default' => -1]]);
$task = filter_input(INPUT_GET, 'task', FILTER_DEFAULT, ['options' => ['default' => -1]]);

$taskType = filter_input(INPUT_GET, 'tasktype', FILTER_DEFAULT);



// Switch statement to provide correct functionality



switch ($taskType) {

  case 'task':
    $tid = (int) filter_input(INPUT_GET, 'project_id', FILTER_VALIDATE_INT, ['options' => ['default' => -1]]);
    $actObj = new ActivityContr();
    $result = $actObj->activity($uid, $task, "COMPLETED");

    $taskObj = new TasksContr();

    $msg = $taskObj->completeTask($tid);

    $result = '
      <div class="d-flex justify-content-center">
      <div class="alert bg-success col-md-4" role="alert">
        <h4 class="alert-heading">Marked Completed</h4>
        <p>This project has been successfully marked off as completed. You will not be redirected</p> 
      </div></div>';
    print $result;

    break;

  case 'ticket':

    $tid = (int) filter_input(INPUT_GET, 'ticket_id', FILTER_VALIDATE_INT, ['options' => ['default' => -1]]);

    $ticketObj = new TicketContr();
    $result = $ticketObj->markComplete($tid);

    if ($result) {

      $actObj = new ActivityContr();
      $result = $actObj->activity($uid, $task, "COMPLETED");

      $msg = '
      <div class="d-flex justify-content-center">
      <div class="alert bg-success col-md-4" role="alert">
        <h4 class="alert-heading">Marked Completed</h4>
        <p>This support ticket has been successfully marked off as completed. You will not be redirected</p> 
      </div></div>';
      print $msg;
    } else {
      $msg = '
      <div class="d-flex justify-content-center">
      <div class="alert bg-danger col-md-4" role="alert">
        <h4 class="alert-heading">Error</h4>
        <p>There was an error while trying to mark this as complete.</p> 
      </div></div>';
      print $msg;
    }


    break;

  default:
    # code...
    break;
}
