
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
}, 600000);







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