<?php

class TasksContr extends Tasks
{


  public function removeTask($tid)
  {
    $result = $this->delTask($tid);
    return $result;
  }


  public function completeTask($tid)
  {
    $result = $this->finishTask($tid);
    return $result;
  }
}
