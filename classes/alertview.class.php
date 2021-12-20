<?php

class AlertView extends AlertContr
{

  public function viewSome($uid)
  {
    $alert = $this->viewAlerts($uid);
    return $alert;
  }

  public function alerts($uid)
  {
    $alert = $this->notifications($uid);
    return $alert;
  }
}
