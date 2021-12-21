<?php

// Ticket view controller
// Created December 21, 2021

class TicketView extends TicketContr
{

  // Pull Tickets based off UID
  public function viewTickets($uid)
  {

    $tickets = $this->pullTickets($uid);
    return $tickets;
  }

  public function viewTotal($uid)
  {

    $totalTickets = $this->totalTickets($uid);
    return $totalTickets;
  }
}
