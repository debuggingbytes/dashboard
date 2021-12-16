<?php


class Work extends Dbh
{

  protected function viewProjects($uid)
  {

    //ToDo: Add order by due_date desc 
    $sql = "SELECT * FROM projects WHERE user_id= ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uid]);

    if ($stmt->rowCount() == 0) {
      $row = "No Projects assigned";
    } else {
      $row = $stmt->fetchAll();
    }
    return $row;
  }
}
