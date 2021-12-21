<?php

include("../../classes/dbh.class.php");
include("../functions.inc.php");
include("../../classes/alertcontr.class.php");
include("../../classes/alertview.class.php");


//todo link ids to keys from users database to display name instead of number
//todo Alerts database needs to be modified to allow alert type IE Project, Bug etc
//! Look into sockets for dynamic alert notifications


$alertObj = new AlertView();
$note = $alertObj->viewSome('1');
$alerts = $alertObj->alerts('1');

?>
<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fas fa-bell fa-fw"></i>
  <!-- Counter - Alerts -->
  <?php
  if ($alerts > 0) {
  ?>
    <span class="badge badge-danger badge-counter"><?php echo $alerts; ?></span>
  <?php
  }
  ?>
</a>
<!-- Dropdown - Alerts -->
<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
  <h6 class="dropdown-header">
    Alerts Center
  </h6>
  <?php
  if (is_array($note)) {
    foreach ($note as $alert) {

      $time = timeChange($alert['time']);

      $readStatus = $alert['is_read'] ? 'small text-gray-500' : 'font-weight-bold';

  ?>
      <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="mr-3">
          <div class="icon-circle bg-primary">
            <i class="fas fa-project-diagram"></i>
          </div>
        </div>
        <div>
          <div class="small text-gray-500"><?php echo $time; ?></div>
          <span class="<?php echo $readStatus; ?>"><?php echo $alert['note']; ?></span>
        </div>
      </a>
  <?php
    }
  } else {
    echo "<div class='text-center p-3'>" . $note . "</div>";
  }
  ?>

  <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
</div>