<?php


// Load Classes
$ticketObj = new TicketView();

$tickets = $ticketObj->viewTickets($_SESSION['uid']);
?>
<div class='row p-3'>
  <?php
  if (is_array($tickets)) {
    foreach ($tickets as $ticket) {
      if ($ticket['priority'] == 3) {
        $bgcolor = "border-left-danger";
      } else if ($ticket['priority'] == 2) {
        $bgcolor = "border-left-warning";
      } else {
        $bgcolor = "border-left-primary";
      }

  ?>
      <!-- TICKET BODY -->

      <div class="col my-2 mx-1">
        <a href='profile.php?s=tickets&ticket_id=<?php echo $ticket['id']; ?>' class='text-decoration-none'>
          <div class="card <?php echo $bgcolor; ?> shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="font-weight-bold text-secondary text-uppercase mb-1">
                    <?php echo $ticket['title']; ?></div>
                  <div class="h5 mb-0 lead text-gray-800">
                    <?php echo substr($ticket['content'], 0, 80) . "..."; ?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-bug fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

  <?php
    }
  } else {
    echo '<div class="text-center p-5 mx-auto">' . $tickets . '</div>';
  }

  ?>
</div>