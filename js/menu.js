$(document).ready(function () {
    $('img').on('dragstart', function(event) { event.preventDefault(); });
    $('.drop-trigger').hover(function(){
    	$('#drop-down').css({'opacity':'1'});   
    }); 
    $('.menu-item').hover(function(){
    	$('#drop-down').css({'opacity':'0'});
    }); 
    $('body').hover(function(){
    	$('#drop-down').css({'opacity':'0'});
    }); 

    //mobile 
    $('.nav-icon').on('click',function() {
    //animate button
    $(this).toggleClass('active');   
    //show menu  
    $('.main-menu').toggleClass('menu-active');
	});
});