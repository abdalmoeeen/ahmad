/* global $,alert, console */

$(function()
{


	'use strict';


	var check1=true;
	var check2=true;
	var check3=true;
	var check4=true;

	function checkErrors(){

		if(check1 === true || check2 === true || check3 === true || check4 === true ){

			$('.btn').prop('disabled',true);

		}else{

			$('.btn').prop('disabled',false);
		}
	}

	checkErrors();

	$('.user').keyup(function(){

		if($(this).val().length < 4){
			check1=true;
			$(this).css('border' ,'1px solid #f00');
			$(this).parent().find('.custom-alert').fadeIn();
		}else {
			check1=false;
			$(this).css('border' ,'1px solid #00f');
			$(this).parent().find('.custom-alert').fadeOut();
		}
checkErrors();
})

	$('.pass').keyup(function(){

		if($(this).val().length < 8 || $(this).val().length > 16){
			check2=true;
			$(this).css('border' ,'1px solid #f00');
			$(this).parent().find('.custom-alert').fadeIn();
		}else {
			check2=false;
			$(this).css('border' ,'1px solid #00f');
			$(this).parent().find('.custom-alert').fadeOut();
		}
		if($(this).val() != $('.confpass').val() ){
			check3=true;
			$('.confpass').css('border' ,'1px solid #f00');
			$('.confpass').parent().find('.custom-alert').fadeIn();

		}else{
			check3=false;
			$('.confpass').css('border' ,'1px solid #00f');
			$('.confpass').parent().find('.custom-alert').fadeOut();

		}
checkErrors();
})




	$('.confpass').keyup(function(){

				if($(this).val() != $('.pass').val() ){
			check3=true;
			$(this).css('border' ,'1px solid #f00');
			$(this).parent().find('.custom-alert').fadeIn();

		}else{
			check3=false;
			$(this).css('border' ,'1px solid #00f');
			$(this).parent().find('.custom-alert').fadeOut();

		}

	
checkErrors();
	})


	$('.ans').keyup(function(){

		if($(this).val().length == 0){
			check4=true;
			$(this).css('border' ,'1px solid #f00');
			$(this).parent().find('.custom-alert').fadeIn();
		}else{
			check4=false;
			$(this).css('border' ,'1px solid #00f');
			$(this).parent().find('.custom-alert').fadeOut();

		}
		checkErrors();
	})




});