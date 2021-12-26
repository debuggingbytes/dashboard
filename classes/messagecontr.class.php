<?php

class MessageContr extends Message
{
  public function markRead($mid)
  {
    $result = $this->messageIsRead($mid);
    return $result;
  }

  public function markUnread($mid)
  {
    $result = $this->messageIsUnread($mid);
    return $result;
  }

  public function deleteMail($mid)
  {
    $result = $this->messageIsDeleted($mid);
    return $result;
  }
}
