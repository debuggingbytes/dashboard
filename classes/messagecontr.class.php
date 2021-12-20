<?php

class MessageContr extends Dbh
{
  protected function viewMessages($uid)
  {
    $sql = "SELECT af.id, af.from_id, af.message, af.sent_time, u.username 
    FROM db_cms_messages af 
    INNER JOIN db_cms_users u 
    ON af.from_id = u.id WHERE af.user_id= ?";
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
    $sql = "SELECT is_read FROM db_cms_messages WHERE user_id= ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uid]);

    return $stmt->fetchAll();
  }
}
