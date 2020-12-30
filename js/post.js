
$(function()
{

		'use strict';
	$('.form-control').mouseenter(function(){

		$(this).css('border-color','#334189');
		$(this).css('border-width','2px');
	});
	$('.form-control').mouseleave(function(){

		$(this).css('border-color','#ccc');
		$(this).css('border-width','1px');
	});


	$('.b').keydown(function(event) {
  if (event.ctrlKey && event.keyCode == 13) {
    console.log("hello");
    $('.f').trigger('.btn');
  }
})
})