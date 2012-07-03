// Slider
$(function(){
	$('#slider').anythingSlider({
		autoPlay            : true,
		startStopped        : true,
	});
});
// button slider
function init(){
	iWidthPanel = $(".anythingControls").width();
	var iLeftBack = iWidthPanel+20;
	var iLeftForward = iWidthPanel+42;
	$(".anythingSlider-default .back").css({
		"left" : iLeftBack + "px"
	});
	$(".anythingSlider-default .forward").css({
		"left" : iLeftForward + "px"
	});
}
$(document).ready(function(){
	init();
	$(window).resize(function(){
		init();
	}); 
});
