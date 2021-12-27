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
  include("./includes/content-main.inc.php");
  //include footer
  include("./includes/footer.inc.php");
}
ob_end_flush();
