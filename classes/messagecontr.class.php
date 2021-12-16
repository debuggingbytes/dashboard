<?php

class MessageContr extends Dbh
{
  protected function viewMessages($uid)
  {
    $sql = "SELECT * FROM db_cms_messages WHERE user_id= ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uid]);


    if ($stmt->rowCount() == 0) {
      $row = "No Mail Available";
    } else {
      $row = $stmt->fetchAll();
    }
    return $row;
  }
}
