<?php

/**
 * Article Controller Class File
 * Designed for send queries to database
 * Created: November 15/2021
 * Created By: Kris Cartmell
 * http://www.debuggingbytes.com
 */


class taskContr extends Tasks
{

  public function viewActivity($uid)
  {
    return $result = $this->activity($uid);
  }
}
