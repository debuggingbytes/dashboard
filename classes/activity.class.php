<?php

class Activity extends Dbh
{

  //activity feed method
  protected function feedAdd($uid, $task, $crud)
  {
    $sql = "INSERT INTO db_cms_feed (user_id, details, crud_action) VALUES (?,?,?)";
    $stmt = $this->connect()->prepare($sql);

    try {
      $stmt->execute([$uid, $task, $crud]);
    } catch (Exception $e) {
      $msg =  'Caught exception: ' .  $e->getMessage() . "\n";
    } finally {
      $msg = "yes it worked";
    }


    return $msg;
  }
}
