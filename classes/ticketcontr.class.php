<?php

class TicketContr extends Dbh
{


  protected function pullAllTickets()
  {
  }

  protected function pullTickets($uid)
  {

    // Start SQL query to pull tickets based off UID
    $sql = "SELECT * FROM db_cms_tickets WHERE user_id = ? AND complete = 0";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uid]);

    if ($stmt->rowCount() == 0) {
      $msg = "No current tickets open";
    } else {
      $msg = $stmt->fetchAll();
    }

    return $msg;
  }

  protected function totalTickets($uid)
  {
    $sql = "SELECT * FROM db_cms_tickets WHERE user_id = ? AND complete = 0";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uid]);

    return $stmt->rowCount();
  }
}
