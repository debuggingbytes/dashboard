<?php
$tid = (int) filter_input(INPUT_GET, 'mail_id', FILTER_VALIDATE_INT, ['options' => ['default' => -1]]);

//ToDo:  Complete functionality of Read/Unread/Delete buttons  w/ jQuery support


if (empty($tid)) {
  echo "Invalid mail ID";
} else {
  $mailObj = new MessageView();
  $mail = $mailObj->message($tid);

  $mailObj->isRead($tid);

  // print "<pre>";
  // print_r($mail);
  // print "</pre>";

?>

  <div class='row d-flex activity-feed px-5 pt-3'>
    <div class="col-md">
      <div class="row d-flex">
        <div class="col-md-2 p-0">
          Sent:
        </div>
        <div class="col-md p-0 m-0">
          <?php echo timeChange($mail['sent_time']); ?>
        </div>
      </div>
      <div class="row d-flex border-bottom-info pb-4">
        <div class="col-md-2 p-0">
          By:
        </div>
        <div class="col-md p-0 m-0">
          <?php echo $mail['username']; ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 p-0 mt-5">
          <h5>Alert Details</h5>
        </div>
      </div>
      <div class="row">
        <div class="col-md p-2 m-2">
          <?php echo $mail['message']; ?>
        </div>
      </div>
    </div>
    <div class='row d-flex activity-feed pl-5 pr-5 pt-1'>
      <div class="col-md">
        <button onClick="markReadMail(<?php echo $tid ?>)" class='btn btn-success' title="Mark as Read" name="complete" value="<?php echo $mail[0]; ?>"><i class="fas fa-envelope-open"></i></button>
        <button onClick="markUnreadMail(<?php echo $tid ?>)" class='btn btn-warning' title="Mark as Unread" name="edit" value="<?php echo $mail[0]; ?>"><i class="fas fa-envelope"></i></button>
        <button onClick="deleteMail(<?php echo $tid ?>)" class='btn btn-danger' title="Delete" name='del' value="<?php echo $mail[0]; ?>"><i class="fas fa-times"></i></button>
      </div>
    </div>
  </div>
  <div class="row">
    <div id='message' class="col-md text-center">
    </div>
  </div>
<?php
}
