<?php
$pid = (int) filter_input(INPUT_GET, 'project_id', FILTER_VALIDATE_INT, ['options' => ['default' => -1]]);


if (empty($pid)) {
  echo "Invalid project ID";
} else {
  $projObj = new WorkView();
  $project = $projObj->viewProject($pid);
?>

  <div class='row d-flex activity-feed pl-5 pr-5 pt-3'>
    <div class="col-md-2">
      <div class="row">
        <div class="col-md">
          <h5><?php echo $project['title'] ?></h5>
        </div>
      </div>
      <div class="row">
        <div class="col-md">Assigned</div>
      </div>
      <div class="row">
        <div class="col-md">Due</div>
      </div>
    </div>
    <div class="col-md">
      <div class="row">
        <div class="col-md">
          &nbsp;
        </div>
      </div>
      <div class="row">
        <div class="col-md"><?php echo timeChange($project['time']); ?></div>
      </div>
      <div class="row">
        <div class="col-md"><?php echo dueIn($project['time'], $project['due_date']); ?></div>
      </div>
    </div>
  </div>
  <div class='row d-flex activity-feed pl-5 pr-5 pt-1'>
    <div class="col-md">
      <h5>Description</h5>
    </div>
  </div>
  <div class='row d-flex activity-feed pl-5 pr-5'>
    <div class="col-md">
      <?php echo $project['details']; ?>
    </div>
  </div>
  <div class='row d-flex activity-feed pl-5 pr-5 pt-1'>
    <div class="col-md">
      <button onClick='completeTask(<?php echo $project['id']; ?>,<?php echo $project['user_id']; ?>, "<?php echo rawurlencode($project['title']); ?>")' class='btn btn-success' title="Complete Task" name="complete" value="<?php echo $project['id']; ?>"><i class="fas fa-check"></i></button>
      <?php
      if ($user[0]['is_admin']) {
      ?>
        <button class='btn btn-warning' title="Edit Task" name="edit" value="<?php echo $project['id']; ?>"><i class="fas fa-edit"></i></button>
        <button class='btn btn-danger' title="Delete Task" name='del' value="<?php echo $project['id']; ?>"><i class="fas fa-times"></i></button>
      <?php
      }
      ?>
    </div>
  </div>
  <div class="row">
    <div id='message' class="col-md text-center">
    </div>
  </div>

<?php
}
