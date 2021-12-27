<?php

class Message extends Dbh
{
  protected function viewMessages($uid, $orderBy)
  {
    $sql = "SELECT m.id,m.is_read, m.from_id, m.message, m.sent_time, u.username 
    FROM db_cms_messages m 
    INNER JOIN db_cms_users u 
    ON m.from_id = u.id WHERE m.user_id= ? $orderBy";
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

  // View Message Method
  protected function viewMessage($mid)
  {
    $sql = "SELECT m.id, m.from_id, m.message, m.sent_time, u.username 
    FROM db_cms_messages m 
    INNER JOIN db_cms_users u 
    ON m.from_id = u.id WHERE m.user_id= ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$mid]);

    return $stmt->fetch();
  }

  protected function messageIsRead($mid)
  {
    $sql = "UPDATE db_cms_messages SET is_read=1 WHERE id= ?";
    $stmt = $this->connect()->prepare($sql);

    try {

      $stmt->execute([$mid]);
    } catch (\Exception $e) {
      print $e;
      return false;
    } finally {
      return true;
    }
  }

  protected function messageIsUnread($aid)
  {
    $sql = "UPDATE db_cms_messages SET is_read=0 WHERE id= ?";
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
  protected function messageIsDeleted($aid)
  {
    $sql = "DELETE FROM db_cms_messages WHERE id= ? LIMIT 1";
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
