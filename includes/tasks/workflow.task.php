<?php


//ToDo: Remove hard coded user_id, have pulled based off sessions when login system is complete
$projects = $projObj->projectView('1');

?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class='row d-flex'>
      <div class='col-md-8'>
        <strong>Project Details</strong>
      </div>
      <div class="col-md">
        <strong> Submitted Date</strong>
      </div>
      <div class="col-md text-center">
        <strong> Due In</strong>
      </div>
    </div>
  </div>
  <div class="card-body">
    <?php
    if (is_array($projects)) {
      foreach ($projects as $project) {

        #$project['complete']  ? $complete = '<i class="text-success fas fa-check"></i>' : $complete = '<i class="text-danger fas fa-times"></i>';

        //ToDo: Database - Change timestamp to allow for timeChange function to properly output days
        //ToDo: Add coloured background based on date vs due date vs completed IE: green, yellow, red
        $due = dueIn($project['time'], $project['due_date']);
        if ($due <= 0) {
          $due = "<span class='text-danger'>" . $due . "</span>";
        } else if ($due <= 1) {
          $due = "<span class='text-danger'>Today</span>";
        } else if ($due <= 4) {
          $due = "<span class='text-warning'>" . $due . "</span>";
        } else {
          $due = "<span class='text-success'>" . $due . "</span>";
        }

    ?>
        <div class='row d-flex activity-feed'>
          <div class='col-md-8 text-justify text-wrap text-break'>
            <a href='profile.php?s=work&project_id=<?php echo $project['id']; ?>'><i class="fas fa-project-diagram mx-1"></i></a>
            <?php echo substr($project['details'], 0, 100) . "..."; ?>
          </div>
          <div class="col-md">
            <?php echo timeChange($project['time']); ?>
          </div>
          <div class="col-md text-center">
            <?php echo $due ?>
          </div>
        </div>
    <?php
      }
    } else {
      echo $projects;
    }
    ?>
  </div>
</div>