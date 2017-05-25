$(".vote").click(function() {
var that= this;
$(this).attr("disabled", true);
sessionStorage.setItem("button-state", true);
setTimeout(function() {	$(".vote").attr('disabled', true);	}, 15000);

});
