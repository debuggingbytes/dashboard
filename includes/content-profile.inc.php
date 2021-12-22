<?php
//Change nasty get value with  filter_input
$workflow = filter_input(INPUT_GET, 's', FILTER_SANITIZE_SPECIAL_CHARS, ['options' => ['default' => "Profile"]]);
if ($workflow == "work") {
  $title = "Current Projects";
} else if ($workflow == "tickets") {
  $title = "Current Tickets";
} else if ($workflow == "alerts") {
  $title = "Mail &amp; Alerts";
} else {
  $title = "Profile Details";
}

//ToDo: Change "Profile Details" to variable based off of page location

?>

<div class="container-fluid" style="min-height: 80vh;">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Dashboard: <?php echo ucfirst($workflow); ?></h1>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class='row d-flex'>
        <div class='col-md'>
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
        # code...
        break;
      case 'alerts':
        # code...
        break;

      default:
        include "profile/profile-main.php";
        break;
    }
    ?>

  </div>


</div>