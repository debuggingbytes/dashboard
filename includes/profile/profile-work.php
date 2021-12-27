<?php


//ToDo: Remove hard coded user_id, have pulled based off sessions when login system is complete
$projObj = new WorkView();
$projects = $projObj->projectView($_SESSION['uid']);

?>

<div class="card shadow p-4">
  <div class="card-body">
    <?php
    if (is_array($projects)) {
      foreach ($projects as $project) {

        #$project['complete']  ? $complete = '<i class="text-success fas fa-check"></i>' : $complete = '<i class="text-danger fas fa-times"></i>';

        //ToDo: Database - Change timestamp to allow for timeChange function to properly output days
        //ToDo: Add coloured background based on date vs due date vs completed IE: green, yellow, red

    ?>
        <div class='row d-flex activity-feed'>
          <div class='col-md-8 text-justify text-wrap text-break'>
            <a href='?s=work&project_id=<?php echo $project['id']; ?>'><i class="far fa-eye"></i></a>
            <?php echo substr($project['details'], 0, 70) . "..."; ?>
          </div>
          <div class="col-md">
            <?php echo timeChange($project['time']); ?>
          </div>
          <div class="col-md text-center">
            <?php echo $project['due_date']; ?>
          </div>
          <div class="col-md">

          </div>
        </div>
      <?php
      }
    } else {
      ?>
      <div class='row d-flex activity-feed'>
        <div class="col-md text-center">
          No active projects
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</div>