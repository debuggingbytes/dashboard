<?php

class MessageView extends MessageContr
{

  public function viewSome($uid)
  {
    $messages = $this->viewMessages($uid);
    return $messages;
  }
}
