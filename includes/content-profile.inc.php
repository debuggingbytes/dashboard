<?php
//Change nasty get value with  filter_input
$workflow = filter_input(INPUT_GET, 's', FILTER_SANITIZE_SPECIAL_CHARS, ['options' => ['default' => "Profile"]]);
if ($workflow == "work") {
  $title = "Current Projects";
} else if ($workflow == "tickets") {
  $title = "Current Tickets";
} else if ($workflow == "alerts") {
  // $workflow = "Mail &amp; Alerts";
  $title = "Mail &amp; Alerts";
} else {
  $title = "Profile Details";
}

// Tickets
$ticket_id = (int) filter_input(INPUT_GET, 'ticket_id', FILTER_VALIDATE_INT, ['options' => ['default' => ""]]);
//Alerts and Mail
$alert_id = (int) filter_input(INPUT_GET, 'alert_id', FILTER_VALIDATE_INT, ['options' => ['default' => ""]]);
$mail_id = (int) filter_input(INPUT_GET, 'mail_id', FILTER_VALIDATE_INT, ['options' => ['default' => ""]]);


?>

<div class="container-fluid" style="min-height: 80vh;">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Dashboard: <?php echo ucfirst($title); ?></h1>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class='row d-flex'>
        <div class='col-md m-0 font-weight-bold text-primary'>
          <strong><?php echo $title; ?></strong>
        </div>
      </div>
    </div>
    <!-- Main Profile Section -->
    <?php

    switch (strtolower($workflow)) {
      case 'work':
        if (isset($_GET['project_id'])) {
          include "profile/profile-work-view.php";
        } else {
          include "profile/profile-work.php";
        }
        break;
      case 'tickets':
        if (!empty($ticket_id)) {
          include "profile/profile-ticket-view.php";
        } else {
          include "profile/profile-tickets.php";
        }
        break;
      case 'alerts':
        if (!empty($alert_id)) {
          include "profile/profile-alert-view.php";
        } else if (!empty($mail_id)) {
          include "profile/profile-mail-view.php";
        } else {
          include "profile/profile-alert-mail.php";
        }
        break;

      default:
        include "profile/profile-main.php";
        break;
    }
    ?>

  </div>


</div>