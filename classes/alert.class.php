<?php

class Alert extends Dbh
{
  protected function viewAlerts($uid, $selector)
  {
    $sql = "SELECT * FROM db_cms_alerts WHERE user_id= ? $selector ORDER BY id DESC";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uid]);


    if ($stmt->rowCount() == 0) {
      $row = "No notifications to show";
    } else {
      $row = $stmt->fetchAll();
    }
    return $row;
  }

  // View Single Ticket methods
  protected function showAlert($aid)
  {

    $sql = "SELECT a.id, a.from_id, a.note, a.is_read, a.time, a.user_id, u.id, u.username 
    FROM db_cms_alerts a 
    INNER JOIN db_cms_users u 
    ON a.from_id = u.id
    WHERE a.id= ? ";

    $stmt = $this->connect()->prepare($sql);

    try {
      $stmt->execute([$aid]);
    } catch (\Exception $e) {
      print $e;
      return false;
    } finally {
      return $stmt->fetch();
    }
  }



  protected function notifications($uid)
  {
    $sql = "SELECT is_read from db_cms_alerts WHERE user_id = ? AND is_read = 0";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uid]);

    $total = $stmt->rowCount();
    return $total;
  }

  protected function read($aid)
  {
    $sql = "UPDATE db_cms_alerts SET is_read=1 WHERE id= ?";
    $stmt = $this->connect()->prepare($sql);

    try {
      $stmt->execute([$aid]);
    } catch (\Exception $e) {
      print $e;
      return false;
    } finally {
      return true;
    }
  }
  protected function unRead($aid)
  {
    $sql = "UPDATE db_cms_alerts SET is_read=0 WHERE id= ?";
    $stmt = $this->connect()->prepare($sql);

    try {
      $stmt->execute([$aid]);
    } catch (\Exception $e) {
      print $e;
      return false;
    } finally {
      return true;
    }
  }
  protected function delAlert($aid)
  {
    $sql = "DELETE FROM db_cms_alerts WHERE id= ? LIMIT 1";
    $stmt = $this->connect()->prepare($sql);

    try {
      $stmt->execute([$aid]);
    } catch (\Exception $e) {
      print $e;
      return false;
    } finally {
      return true;
    }
  }
}
