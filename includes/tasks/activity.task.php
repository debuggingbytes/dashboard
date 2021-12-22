<?php

$taskObj = new TasksView();

$activity = $taskObj->viewActivity('1');

?>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Activity List</h6>
  </div>
  <div class="card-body">
    <div class='row d-flex activity-feed'>
      <div class='col-md-2'>
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



    ?>
      <div class='row d-flex activity-feed'>
        <div class='col-md-2 spacer'>
          <?php echo $task['username']; ?>
        </div>
        <div class="col-md-1 spacer">
          <?php echo $task['crud_action']; ?>
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
      <div class='col-md-2'>
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