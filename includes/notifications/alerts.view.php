<?php
date_default_timezone_set('America/Edmonton');
//Classes for ajax loading
include "../../classes/dbh.class.php";
include "../../classes/alert.class.php";
include "../../classes/alertview.class.php";
//Functions
include "../../includes/functions.inc.php";

$selector =  filter_input(INPUT_GET, 'selector', FILTER_DEFAULT, ['options' => ['default' => -1]]);
switch ($selector) {
  case '1':
    $orderBy = "AND is_read=0";
    break;
  case '2':
    $orderBy = "AND is_read=1";
    break;

  default:
    $orderBy = "";
    break;
}

$alertObj = new AlertView();
$alerts = $alertObj->viewSome('1', $orderBy);

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