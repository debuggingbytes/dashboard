<?php

class AlertView extends Alert
{

  // View All Alerts
  public function viewSome($uid, $selector)
  {
    $alert = $this->viewAlerts($uid, $selector);
    return $alert;
  }
  //View Single Alert
  public function viewAlert($aid)
  {
    $result = $this->showAlert($aid);
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
