<?php
// !Rename to projects class
class WorkView extends Work
{

  public function projectView($uid)
  {

    // Pull information from work class with project information for user_id
    $row = $this->viewProjects($uid);
    return $row;
  }


  public function totalProjects($uid)
  {
    $row = $this->userProjectsTotal($uid);
    return $row;
  }


  public function viewProject($pid)
  {

    return $this->project($pid);
  }
}
