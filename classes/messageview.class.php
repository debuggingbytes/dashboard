<?php

class MessageView extends MessageContr
{

  public function viewSome($uid)
  {
    $messages = $this->viewMessages($uid);
    return $messages;
  }

  public function alerts($uid)
  {
    $alerts = $this->notifications($uid);
    return $alerts;
  }
}
