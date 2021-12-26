<?php

//require all files for applications
require_once "../../classes/dbh.class.php";
require_once "../../classes/alert.class.php";
require_once "../../classes/alertcontr.class.php";
require_once "../../classes/alertview.class.php";
require_once "../../classes/message.class.php";
require_once "../../classes/messagecontr.class.php";
require_once "../../classes/messageview.class.php";
require_once "../../includes/functions.inc.php";

$type = filter_input(INPUT_GET, "type", FILTER_DEFAULT);
$id = (int)filter_input(INPUT_GET, "alert_id", FILTER_VALIDATE_INT);
// Alerts handler for read/unread/delete

switch ($type) {
    //! Read Alert
  case 'readAlert':
    $alertObj = new AlertContr();
    $result = $alertObj->markRead($id);
    if ($result) {
      print '<div class="d-flex justify-content-center">
      <div class="alert bg-success col-md-4" role="alert">
        <h4 class="alert-heading text-white">Marked Read</h4>
        <p class="text-white">This Alert has been marked as read</p> 
      </div></div>';
    }

    break;
    //! UnRead Alert
  case 'unreadAlert':
    $alertObj = new AlertContr();
    $result = $alertObj->markunRead($id);
    if ($result) {
      print '<div class="d-flex justify-content-center">
      <div class="alert bg-success col-md-4" role="alert">
        <h4 class="alert-heading text-white">Marked Unread</h4>
        <p class="text-white">This Alert has been marked as unread</p> 
      </div></div>';
    }

    break;
    //! Delete Alert
  case 'deleteAlert':
    $alertObj = new AlertContr();
    $result = $alertObj->deleteAlert($id);
    if ($result) {
      print '<div class="d-flex justify-content-center">
      <div class="alert bg-danger col-md-4" role="alert">
        <h4 class="alert-heading text-white">Delete</h4>
        <p class="text-white">This Alert has been deleted.</p> 
      </div></div>';
    }

    break;

    //!Read Mail
  case 'readMail':
    $msgObj = new MessageContr();
    $result = $msgObj->markRead($id);
    if ($result) {
      print '<div class="d-flex justify-content-center">
      <div class="alert bg-success col-md-4" role="alert">
        <h4 class="alert-heading text-white">Marked as Read</h4>
        <p class="text-white">This message has been marked as Read.</p> 
      </div></div>';
    }
    break;
    //!Unread Mail
  case 'unreadMail':
    $msgObj = new MessageContr();
    $result = $msgObj->markUnread($id);
    if ($result) {
      print '<div class="d-flex justify-content-center">
      <div class="alert bg-success col-md-4" role="alert">
        <h4 class="alert-heading text-white">Marked as Unread</h4>
        <p class="text-white">This message has been marked as Unread.</p> 
      </div></div>';
    }
    break;

    //!Delete Mail
  case 'deleteMail':
    $msgObj = new MessageContr();
    $result = $msgObj->deleteMail($id);
    if ($result) {
      print '<div class="d-flex justify-content-center">
      <div class="alert bg-danger col-md-4" role="alert">
        <h4 class="alert-heading text-white">Delete</h4>
        <p class="text-white">This message has been deleted.</p> 
      </div></div>';
    }
    break;

  default:
    return false;
}
