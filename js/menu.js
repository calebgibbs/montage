$(document).ready(function () {
    $('img').on('dragstart', function(event) { event.preventDefault(); });
    $('.drop-trigger').hover(function(){
    	$('#drop-down').addClass('show-menu');   
    }); 
    $('.menu-item').hover(function(){
    	$('#drop-down').removeClass('show-menu');
    }); 
    $('.body').hover(function(){
    	$('#drop-down').removeClass('show-menu');
    }); 

    //mobile 
    $('.nav-icon').on('click',function() {
    	//animate button
    	$(this).toggleClass('active');   
    	//show menu  
    	$('#menu').toggleClass('menu-active');
	});
});