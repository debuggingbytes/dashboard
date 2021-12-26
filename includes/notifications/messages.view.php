<?php
date_default_timezone_set('America/Edmonton');
//Classes for ajax loading
include "../../classes/dbh.class.php";
include "../../classes/message.class.php";
include "../../classes/messageview.class.php";
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

$mailObj = new MessageView();
$mails = $mailObj->viewSome('1', $orderBy);

if (is_array($mails)) {
  foreach ($mails as $mail) {
?>
    <div class="row">
      <div class="col my-2 mx-1" style="max-height: 140px; min-height: 140px;">
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
  echo "No Current Alerts";
} // IF IS_ARRAY 
?>