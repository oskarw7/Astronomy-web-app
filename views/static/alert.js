function hide_alert() {
    var alert = document.getElementById("alert");
    document.body.removeChild(alert);
}
document.addEventListener('DOMContentLoaded', hide_alert);