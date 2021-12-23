<?php
$tid = (int) filter_input(INPUT_GET, 'alert_id', FILTER_VALIDATE_INT, ['options' => ['default' => -1]]);


if (empty($tid)) {
  echo "Invalid Alert ID";
} else {
  $alertObj = new AlertView();
  $ticket = $alertObj->viewAlert($tid);

  // print "<pre>";
  // print_r($ticket);
  // print "</pre>";

?>

  <div class='row d-flex activity-feed px-5 pt-3'>
    <div class="col-md">
      <div class="row d-flex">
        <div class="col-md-2 p-0">
          Ticket:
        </div>
        <div class="col-md p-0 m-0">
          <?php echo $ticket['title']; ?>
        </div>
      </div>
      <div class="row d-flex">
        <div class="col-md-2 p-0">
          Assigned:
        </div>
        <div class="col-md p-0 m-0">
          <?php echo timeChange($ticket['time']); ?>
        </div>
      </div>
      <div class="row d-flex border-bottom-info pb-4">
        <div class="col-md-2 p-0">
          By:
        </div>
        <div class="col-md p-0 m-0">
          <?php echo $ticket['username']; ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 p-0 mt-5">
          <h5>Details</h5>
        </div>
      </div>
      <div class="row">
        <div class="col-md p-2 m-2">
          <?php echo $ticket['content']; ?>
        </div>
      </div>
    </div>
    <div class='row d-flex activity-feed pl-5 pr-5 pt-1'>
      <div class="col-md">
        <button onClick='completeTicket(<?php echo $ticket[0]; ?>, <?php echo $ticket['user_id']; ?>, "<?php echo rawurlencode($ticket['title']); ?>")' class='btn btn-success' title="Complete Task" name="complete" value="<?php echo $ticket[0]; ?>"><i class="fas fa-check"></i></button>
        <?php
        if ($user[0]['is_admin']) {
        ?>
          <button class='btn btn-warning' title="Edit Task" name="edit" value="<?php echo $ticket[0]; ?>"><i class="fas fa-edit"></i></button>
          <button class='btn btn-danger' title="Delete Task" name='del' value="<?php echo $ticket[0]; ?>"><i class="fas fa-times"></i></button>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div id='message' class="col-md text-center">
    </div>
  </div>
<?php
}
