<?php

class WorkView extends Work
{

  public function projectView($uid)
  {

    // Pull information from work class with project information for user_id
    $row = $this->viewProjects($uid);
    return $row;
  }
}
