<?php

$taskObj = new taskContr();

$activity = $taskObj->viewActivity('1');

?>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Activity List</h6>
  </div>
  <div class="card-body">
    <h2>Hello</h2>
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
        <div class='col-md-1'>
          <?php echo $task['user_id']; ?>
        </div>
        <div class="col-md-1">
          <?php echo $crud; ?>
        </div>
        <div class="col-md text-center">
          <?php echo $task['details']; ?>
        </div>
        <div class="col-md-2 text-right">
          <?php echo timeChange($task['time']); ?>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</div>