<?php
// Class controller for Alerts

class AlertContr extends Alert
{

  public function markRead($aid)
  {
    $result = $this->read($aid);

    if ($result) {
      return true;
    } else {
      return false;
    }
  }
  public function markunRead($aid)
  {
    $result = $this->unRead($aid);

    if ($result) {
      return true;
    } else {
      return false;
    }
  }
  public function deleteAlert($aid)
  {
    $result = $this->delAlert($aid);

    if ($result) {
      return true;
    } else {
      return false;
    }
  }
}
