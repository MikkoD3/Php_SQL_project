function onLoad() {
var buttonState = Boolean(sessionStorage.getItem("button-state"));
$(".vote").attr('disabled', buttonState);
}