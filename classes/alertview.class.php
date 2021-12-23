<?php

class AlertView extends AlertContr
{

  // View All Alerts
  public function viewSome($uid)
  {
    $alert = $this->viewAlerts($uid);
    return $alert;
  }
  //View Single Alert
  public function viewAlert($aid)
  {
    $result = $this->alert($aid);
    return $result;
  }

  public function alerts($uid)
  {
    $alert = $this->notifications($uid);

    if (empty($alert)) {
      return false;
    } else {

      return $alert;
    }
  }
}
