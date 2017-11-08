$(document).ready(function () {
    $('img').on('dragstart', function(event) { event.preventDefault(); });
    $('.drop-trigger').hover(function(){
    	// $('#drop-down').css('z-index','99988');
        $('#drop-down').addClass('show-menu');   
    }); 
    $('.menu-item').hover(function(){
    	$('#drop-down').removeClass('show-menu');
        // $('#drop-down').css('z-index','-40');
    }); 
    $('.body').hover(function(){
    	$('#drop-down').removeClass('show-menu');
        // $('#drop-down').css('z-index','-40');
    }); 

    //mobile 
    $('.nav-icon').on('click',function() {
    	//animate button
    	$(this).toggleClass('active');   
    	//show menu  
    	$('#menu').toggleClass('menu-active'); 
	}); 

    $('.search-button').click(function(){
        $('#search-feild').focus();
    });

});