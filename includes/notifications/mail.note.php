<?php
if (!isset($_SESSION['uid'])) {
  session_start();
}

include("../../classes/dbh.class.php");
include("../functions.inc.php");
include("../../classes/message.class.php");
include("../../classes/messagecontr.class.php");
include("../../classes/messageview.class.php");



//ToDo uses keys to identify from user to display name
$messageObj = new MessageView();
$message = $messageObj->viewSome($_SESSION['uid'], "");
$mails = $messageObj->alerts($_SESSION['uid']);
?>
<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fas fa-envelope fa-fw"></i>
  <!-- Counter - Messages -->
  <?php if ($mails > 0) {
    echo '<span class="badge badge-danger badge-counter">' . $mails . '</span>';
  } ?>
</a>
<!-- Dropdown - Messages -->
<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
  <h6 class="dropdown-header">
    Message Center
  </h6>


  <?php
  if (is_array($message)) {
    foreach ($message as $note) {
      $time = timeChange($note['sent_time']);
      $readStatus = $note['is_read'] ? 'small text-gray-500' : 'font-weight-bold';

  ?>

      <a class="dropdown-item d-flex align-items-center" href="profile.php?s=alerts&mail_id=<?php echo $note['id']; ?>">
        <div class="dropdown-list-image mr-3">
          <img class="rounded-circle" src="./files/images/undraw_profile_1.svg" alt="...">
          <div class="status-indicator bg-success"></div>
        </div>
        <div class="font-weight-bold">
          <div class="text-truncate <?php echo $readStatus; ?>"><?php echo $note['message']; ?></div>
          <div class="<?php echo $readStatus; ?>"><?php echo $note['username']; ?> · <?php echo $time; ?></div>
        </div>
      </a>
  <?php
    }
  } else {
    echo "<div class='text-center p-3'>" . $message . "</div>";
  }
  ?>
  <a class="dropdown-item text-center small text-gray-500" href="profile.php?s=alerts">Read More Messages</a>
</div>