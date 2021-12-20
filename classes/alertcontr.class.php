<?php

class AlertContr extends Dbh
{
  protected function viewAlerts($uid)
  {
    $sql = "SELECT * FROM db_cms_alerts WHERE user_id= ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uid]);


    if ($stmt->rowCount() == 0) {
      $row = "No notifications to show";
    } else {
      $row = $stmt->fetchAll();
    }
    return $row;
  }

  protected function notifications($uid)
  {
    $sql = "SELECT is_read from db_cms_alerts WHERE user_id = ? AND is_read = 0";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uid]);

    $total = $stmt->rowCount();
    return $total;
  }
}
