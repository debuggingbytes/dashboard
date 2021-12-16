<?php


//todo link ids to keys from users database to display name instead of number
//todo Alerts database needs to be modified to allow alert type IE Project, Bug etc
$alertObj = new AlertView();
$note = $alertObj->viewSome('1');



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
?>

<a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>