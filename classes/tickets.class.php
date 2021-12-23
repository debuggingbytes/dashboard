<?php

class Tickets extends Dbh
{


  protected function pullAllTickets()
  {
  }

  protected function pullTickets($uid)
  {

    // Start SQL query to pull tickets based off UID
    $sql = "SELECT * FROM db_cms_tickets WHERE user_id = ? AND complete = 0 ORDER BY priority DESC";
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

  protected function ticket($tid)
  {
    $sql = "SELECT t.id, t.from_id, t.title, t.content, t.priority, t.time, t.user_id, u.id, u.username 
    FROM db_cms_tickets t 
    INNER JOIN db_cms_users u 
    ON t.from_id = u.id
    WHERE t.id= ? ";

    $stmt = $this->connect()->prepare($sql);

    try {
      $stmt->execute([$tid]);
    } catch (Exception $e) {
      die($e);
    } finally {
      return $stmt->fetch();
    }
  }


  protected function completeTicket($tid)
  {

    $sql = "UPDATE db_cms_tickets SET complete='1' WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    // $stmt->execute([$tid]);

    try {
      $stmt->execute([$tid]);
    } catch (Exception $e) {
      print $e;
      return false;
    } finally {

      return true;
    }
  }
}
