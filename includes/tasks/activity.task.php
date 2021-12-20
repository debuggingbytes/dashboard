<?php

$taskObj = new taskContr();

$activity = $taskObj->viewActivity('1');

?>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Activity List</h6>
  </div>
  <div class="card-body">
    <div class='row d-flex activity-feed'>
      <div class='col-md-1'>
        <strong>Username</strong>
      </div>
      <div class="col-md-1">
        <strong> Action</strong>
      </div>
      <div class="col-md text-center">
        <strong> Details</strong>
      </div>
      <div class="col-md-2 text-right">
        <strong> Date</strong>
      </div>
    </div>
    <?php

    //Pull from database activities that matches user and show them in card
    foreach ($activity as $task) {

      if ($task['crud_action'] == "add") {
        $crud = '<i class="text-success far fa-plus-square"></i>';
      } elseif ($task['crud_action'] == "delete") {
        $crud = '<i class="text-danger far fa-trash-alt"></i>';
      } elseif ($task['crud_action'] == "update") {
        $crud = '<i class="text-info far fa-edit"></i>';
      }

    ?>
      <div class='row d-flex activity-feed'>
        <div class='col-md-1 spacer'>
          <?php echo $task['username']; ?>
        </div>
        <div class="col-md-1 spacer">
          <?php echo $crud; ?>
        </div>
        <div class="col-md text-center spacer">
          <?php echo $task['details']; ?>
        </div>
        <div class="col-md-2 spacer text-right">
          <?php echo timeChange($task['time']); ?>
        </div>
      </div>
    <?php
    }
    ?>
    <div class='row d-flex activity-feed'>
      <div class='col-md-1'>
        <strong>Username</strong>
      </div>
      <div class="col-md-1">
        <strong> Action</strong>
      </div>
      <div class="col-md text-center">
        <strong> Details</strong>
      </div>
      <div class="col-md-2 text-right">
        <strong> Date</strong>
      </div>
    </div>
  </div>
</div>