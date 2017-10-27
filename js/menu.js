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

    //mobile 
    $('.nav-icon').on('click',function() {
    //animate button
    $(this).toggleClass('active');   
    //show menu  
    $('.main-menu').toggleClass('menu-active');
	});
});