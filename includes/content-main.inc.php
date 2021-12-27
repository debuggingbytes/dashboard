<?php

//!rename this to project instead of Work
$projObj = new WorkView();
$totalProjects = $projObj->totalProjects($_SESSION['uid']);
// Tickets class
$ticketObj = new TicketView();


?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Statistics</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                Total Projects: 7<br>
                Total Tickets: 29
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-chart-bar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <a href='profile.php?s=tickets' class='text-decoration-none'>
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                  Open Tickets</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ticketObj->viewTotal($_SESSION['uid']); ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-bug fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <a href='profile.php?s=work' class='text-decoration-none'>
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                  Open Projects</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalProjects; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-comments fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <!-- Invoice Card -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Invoices Due</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-receipt fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End of Invoice Card  -->

  </div>
  <!-- Work flow -->
  <?php include("tasks/workflow.task.php"); ?>

  <!-- recent activity -->
  <?php include("tasks/activity.task.php"); ?>
  <!-- client list -->
  <?php include("clients/list.clients.php"); ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->