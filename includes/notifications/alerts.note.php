<?php


//todo link ids to keys from users database to display name instead of number
$alertObj = new AlertView();
$note = $alertObj->viewSome('1');

foreach ($note as $alert) {

  $time = timeChange($alert['time'])

?>
  <a class="dropdown-item d-flex align-items-center" href="#">
    <div class="mr-3">
      <div class="icon-circle bg-primary">
        <i class="fas fa-file-alt text-white"></i>
      </div>
    </div>
    <div>
      <div class="small text-gray-500"><?php echo $time; ?></div>
      <span class="font-weight-bold"><?php echo $alert['note']; ?></span>
    </div>
  </a>
<?php
}
?>

<a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>