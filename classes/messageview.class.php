<?php

class MessageView extends MessageContr
{

  // View all messages
  public function viewSome($uid)
  {
    $messages = $this->viewMessages($uid);
    return $messages;
  }

  //View Single Message

  public function message($mid)
  {
    $message = $this->viewMessage($mid);
    return $message;
  }

  public function alerts($uid)
  {
    $alerts = $this->notifications($uid);
    return $alerts;
  }

  public function isRead($mid)
  {
    $result = $this->messageIsRead($mid);
    return $result;
  }
}
