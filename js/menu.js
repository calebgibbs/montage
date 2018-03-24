$(document).ready(function () {
    $('img').on('dragstart', function(event) { event.preventDefault(); });
    
    $('.wrk').hover(function(){ 
        $('.scrn').toggleClass('colour');   
    });
    $('.scrn').hover(function(){ 
        $('.wrk').toggleClass('colour');  
    }); 
     $('.drop-trigger').hover(function(){
        $('#drop-down').addClass('show-menu'); 
        $('.drop-trigger').addClass('colour');   
    }); 
    $('.drop-button').one("click", function(e){
        e.preventDefault();
        $('#drop-down').addClass('show-menu');   
    });
    $('.menu-item').hover(function(){
    	$('#drop-down').removeClass('show-menu');
        $('.drop-trigger').removeClass('colour');
    }); 
    $('.body').hover(function(){
    	$('#drop-down').removeClass('show-menu');
        $('.drop-trigger').removeClass('colour');
    }); 
    $('.nav-icon').on('click',function() {
    	$(this).toggleClass('active');    
    	$('#menu').toggleClass('menu-active'); 
    });   
    $('.favourites-nav').hover(function(){
        $('#diamond-narrow').toggleClass('dia-colour');
    });
})