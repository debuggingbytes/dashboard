
//Date function for copyright
const d = new Date;
const date = d.getFullYear();
const dateArea = document.querySelector("#date");
dateArea.innerText = date;


//Load mail and alerts onpage load
$(document).ready(function () {
  $("#alerts").load("./includes/notifications/alerts.note.php");
  $("#messages").load("./includes/notifications/mail.note.php");
})
//Auto refresh Alerts and Mail every 10 minutes
setInterval(function () {
  $("#alerts").load("./includes/notifications/alerts.note.php");
  $("#messages").load("./includes/notifications/mail.note.php");
}, 60000);







// function for task completion
function completeTask(tid, uid, task) {
  $('#message').load("./includes/tasks/complete.task.php?project_id=" + tid + "&user_id=" + uid + "&task=" + task + "&tasktype=task");
  setTimeout(() => {
    $(location).attr('href', 'profile.php?s=work')
  }, 3000);

}

// Function for ticket completion
function completeTicket(tid, uid, task) {
  $('#message').load("./includes/tasks/complete.task.php?ticket_id=" + tid + "&user_id=" + uid + "&task=" + task + "&tasktype=ticket");
  setTimeout(() => {
    $(location).attr('href', 'profile.php?s=tickets')
  }, 3000);

}

//Alert & Mail Functions

function markReadAlert() {
  $('#message').load("");

}
function markUnreadAlert() {
  $('#message').load("");

}
function deleteAlert() {
  $('#message').load("");
  setTimeout(() => {
    $(location).attr('href', '')
  }, 3000);
}

function markReadMail() {
  $('#message').load("");

}
function markUnreadMail() {
  $('#message').load("");

}
function deleteMail() {
  $('#message').load("");
  setTimeout(() => {
    $(location).attr('href', '')
  }, 3000);
}

// onChange functions for mail / alerts

$('.alert-control').change(function () {
  const select = $('.alert-control').find(":selected").val();
  // console.log(select)
  switch (select) {
    case '1':
      $("#alert-side").load("./includes/notifications/alerts.view.php?selector=1");
      break;
    case '2':
      $("#alert-side").load("./includes/notifications/alerts.view.php?selector=2");
      break;
    default:
      $("#alert-side").load("./includes/notifications/alerts.view.php?selector=0");
      break;
  }
  $("#alert-side").html("<span class='red'>Hello <b>Again</b></span>");
})
$('.mail-control').change(function () {
  const select = $('.mail-control').find(":selected").val();
  console.log(select)
})