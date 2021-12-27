<?php
ob_start();
// Is this user logged in ?
include("./includes/session.inc.php");
if (isset($_SESSION['uid'])) {
  // Include Header file
  include("./includes/header.inc.php");
  //include sidebar
  include("./includes/sidebar.inc.php");
  // include top-header
  include("./includes/top-header.inc.php");
  //include main content
  include("./includes/content-profile.inc.php");
  //include footer
  include("./includes/footer.inc.php");
}
?>
<script>
  $(document).ready(function() {
    $("#alerts").load("./includes/notifications/alerts.note.php");
    $("#messages").load("./includes/notifications/mail.note.php");
  })
  setInterval(function() {
    $("#alerts").load("./includes/notifications/alerts.note.php");
    $("#messages").load("./includes/notifications/mail.note.php");
  }, 600000);
</script>