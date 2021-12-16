<?php

/**
 * Article Controller Class File
 * Designed for send queries to database
 * Created: November 15/2021
 * Created By: Kris Cartmell
 * http://www.debuggingbytes.com
 */



class Tasks extends Dbh
{

  // !Activity feed needs to pull from db_cms_users and activity_feed
  protected function activity($uid)
  {
    // Pull information from activity feed where user_id matches
    $sql = "SELECT * FROM activity_feed WHERE user_id= ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uid]);

    // if row count is 0, no results for that user in database
    if ($stmt->rowCount() == 0) {
      $row = "No activity found";
    } else {
      $row = $stmt->fetchAll();
    }
    // return value back to task controller
    return $row;
  }
}
