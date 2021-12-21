
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
