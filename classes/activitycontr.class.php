<?php

class ActivityContr extends Activity
{

  public function activity($uid, $task, $crud)
  {
    $msg = $this->feedAdd($uid, $task, $crud);
    return $msg;
  }
}
