$(document).ready(function () {
    $('.drop-trigger').hover(function(){
    	$('#drop-down').css("display","block");
    }); 
    $('.menu-item').hover(function(){
    	$('#drop-down').css("display","none");
    }); 
    $('body').hover(function(){
    	$('#drop-down').css("display","none");
    });
});