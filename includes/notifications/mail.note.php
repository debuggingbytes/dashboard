<?php


//ToDo uses keys to identify from user to display name

$messageObj = new MessageView();
$message = $messageObj->viewSome('1');

foreach ($message as $note) {
  $time = timeChange($note['sent_time']);
?>

  <a class="dropdown-item d-flex align-items-center" href="#">
    <div class="dropdown-list-image mr-3">
      <img class="rounded-circle" src="./files/images/undraw_profile_1.svg" alt="...">
      <div class="status-indicator bg-success"></div>
    </div>
    <div class="font-weight-bold">
      <div class="text-truncate"><?php echo $note['message']; ?></div>
      <div class="small text-gray-500"><?php echo $note['from_id']; ?> · <?php echo $time; ?></div>
    </div>
  </a>
<?php
}
?>
<a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>