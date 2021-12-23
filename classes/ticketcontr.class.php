<?php

class TicketContr extends Tickets
{

  public function markComplete($tid)
  {

    $result = $this->completeTicket($tid);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }
}
