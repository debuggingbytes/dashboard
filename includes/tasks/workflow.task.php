<?php


//ToDo: Remove hard coded user_id, have pulled based off sessions when login system is complete
$projects = $projObj->projectView('1');

?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class='row d-flex'>
      <div class='col-md'>
        <strong>Project Details</strong>
      </div>
      <div class="col-md">
        <strong> Submitted Date</strong>
      </div>
      <div class="col-md text-center">
        <strong> Due Date</strong>
      </div>
    </div>
  </div>
  <div class="card-body">
    <?php
    foreach ($projects as $project) {

      #$project['complete']  ? $complete = '<i class="text-success fas fa-check"></i>' : $complete = '<i class="text-danger fas fa-times"></i>';

      //ToDo: Database - Change timestamp to allow for timeChange function to properly output days
      //ToDo: Add coloured background based on date vs due date vs completed IE: green, yellow, red

    ?>
      <div class='row d-flex activity-feed'>
        <div class='col-md'>
          <i class="fas fa-project-diagram mx-1"></i>
          <a href='#'><?php echo $project['details']; ?></a>
        </div>
        <div class="col-md">
          <?php echo $project['time']; ?>
        </div>
        <div class="col-md text-center">
          <?php echo $project['due_date']; ?>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</div>