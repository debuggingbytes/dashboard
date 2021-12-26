
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

function markReadAlert(id) {
  $('#message').load("./includes/notifications/handler.note.php?type=readAlert&alert_id=" + id);
  setTimeout(() => {
    $('#message').fadeOut();
  }, 1500);
}
function markUnreadAlert(id) {
  $('#message').load("./includes/notifications/handler.note.php?type=unreadAlert&alert_id=" + id);
  setTimeout(() => {
    $('#message').fadeOut();
  }, 1500);
}
function deleteAlert(id) {
  $('#message').load("./includes/notifications/handler.note.php?type=deleteAlert&alert_id=" + id);
  setTimeout(() => {
    $('#message').fadeOut();
  }, 1500);
  setTimeout(() => {
    $(location).attr('href', 'profile.php?s=alerts')
  }, 3000);
}

function markReadMail(id) {
  $('#message').load("./includes/notifications/handler.note.php?type=readMail&alert_id=" + id);
  setTimeout(() => {
    $('#message').fadeOut();
  }, 1500);

}
function markUnreadMail(id) {
  $('#message').load("./includes/notifications/handler.note.php?type=unreadMail&alert_id=" + id);
  setTimeout(() => {
    $('#message').fadeOut();
  }, 1500);

}
function deleteMail(id) {
  $('#message').load("./includes/notifications/handler.note.php?type=deleteMail&alert_id=" + id);
  setTimeout(() => {
    $('#message').fadeOut();
  }, 1500);
  setTimeout(() => {
    $(location).attr('href', 'profile.php?s=alerts')
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
});

$('.mail-control').change(function () {
  const select = $('.mail-control').find(":selected").val();
  switch (select) {
    case '1':
      $("#mail-side").load("./includes/notifications/messages.view.php?selector=1");
      break;
    case '2':
      $("#mail-side").load("./includes/notifications/messages.view.php?selector=2");
      break;
    default:
      $("#mail-side").load("./includes/notifications/messages.view.php?selector=0");
      break;
  }
  // console.log(select)
})