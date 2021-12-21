<?php
$workflow = $_GET['s'];
if (empty($workflow)) {
  $workflow = "Profile";
}

?>

<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Dashboard: <?php echo ucfirst($workflow); ?></h1>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class='row d-flex'>
        <div class='col-md'>
          <strong>Profile Details</strong>
        </div>
      </div>
    </div>
    <!-- Main Profile Section -->
    <?php

    switch (strtolower($workflow)) {
      case 'work':
        include "profile/profile-work.php";
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