<?php

class MessageContr extends Dbh
{
  protected function viewMessages($uid)
  {
    $sql = "SELECT m.id, m.from_id, m.message, m.sent_time, u.username 
    FROM db_cms_messages m 
    INNER JOIN db_cms_users u 
    ON m.from_id = u.id WHERE m.user_id= ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uid]);


    if ($stmt->rowCount() == 0) {
      $row = "No Mail Available";
    } else {
      $row = $stmt->fetchAll();
    }
    return $row;
  }

  protected function notifications($uid)
  {
    $sql = "SELECT is_read FROM db_cms_messages WHERE user_id= ? AND is_read = 0";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uid]);

    return $stmt->rowCount();
  }
}
