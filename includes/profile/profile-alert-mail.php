<?php


//Todo Add sessions for user_IDs
//! Make sure to pull user_id based off of sessions

// Alert Classes
$alertObj = new AlertView();
$alerts = $alertObj->viewSome('1', "");
// Mail Classes
$mailObj = new MessageView();
$mails = $mailObj->viewSome('1');


// ToDo - Card FontAwesome Icon to be based off of alert type, dynamic per alert
?>
<div class="row d-flex px-4 pt-3">
  <div class="col-md form-group">
    <h4>Alerts</h4>
    <form class='alert-control' method='get' action>
      <select class='form-control' name='alerts'>
        <option value='0'>Show All</option>
        <option value='1'>Show Unread</option>
        <option value='2'>Show Read</option>
      </select>
    </form>
  </div>
  <div class="col-md form-group">
    <h4>Mail</h4>
    <form class='mail-control' method='get' action>
      <select class=' form-control' name='alerts'>
        <option value='0'>Show All</option>
        <option value='1'>Show Unread</option>
        <option value='2'>Show Read</option>
      </select>
    </form>
  </div>
</div>
<div class="row d-flex px-4 py-2">
  <!-- Alerts Side -->
  <div class="col-md" id='alert-side'>
    <?php

    if (is_array($alerts)) {
      foreach ($alerts as $alert) {
    ?>
        <div class="row">
          <div class="col my-2 mx-1" style="max-height: 140px; min-height: 140px;">
            <a href='profile.php?s=alerts&alert_id=<?php echo  $alert['id']; ?>' class='text-decoration-none'>
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="font-weight-bold text-secondary text-uppercase mb-1">
                        <?php echo timeChange($alert['time']) ?></div>
                      <div class="h5 mb-0 lead text-gray-800">
                        <?php echo  substr($alert['note'], 0, 80); ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-project-diagram fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
    <?php
      } // FOR EACH LOOP
    } else { // ELSE IS_ARRAY
      echo "No Current Alerts";
    } // IF IS_ARRAY 
    ?>
  </div>
  <!-- End Alerts -->
  <!-- Start Mail -->
  <div class="col-md">
    <?php

    if (is_array($mails)) {
      foreach ($mails as $mail) {
    ?>
        <div class="row ">
          <div class="col my-2 mx-1 " style="max-height: 140px; min-height: 140px;">
            <a href='profile.php?s=alerts&mail_id=<?php echo  $mail['id']; ?>' class='text-decoration-none'>
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="font-weight-bold text-secondary text-uppercase mb-1">
                        <?php echo timeChange($mail['sent_time']) ?></div>
                      <div class="h5 mb-0 lead text-gray-800">
                        <?php echo  substr($mail['message'], 0, 80); ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-project-diagram fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
    <?php
      } // FOR EACH LOOP
    } else { // ELSE IS_ARRAY
      echo "No Current mail";
    } // IF IS_ARRAY 
    ?>
  </div>
  <!-- End Mail -->
</div>