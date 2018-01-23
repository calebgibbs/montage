$(document).ready(function(){
	$('.fav-tog').click(function(){
		$('#favourites').addClass('open-fav'); 
		$('#main-page').addClass('pause-page');
		$('#overlay').addClass('open-fav'); 
		$('#overlay').addClass('darken');
	}); 
	$('.body').click(function(){
		$('#main-page').removeClass('pause-page');
		$('#favourites').removeClass('open-fav');
		$('#overlay').removeClass('open-fav');
		$('#overlay').removeClass('darken');
	});
	$('#close-fav').click(function(){
		$('#main-page').removeClass('pause-page');
		$('#favourites').removeClass('open-fav');
		$('#overlay').removeClass('open-fav');
		$('#overlay').removeClass('darken'); 
	}); 
	$('.product-data').click(function(){
        window.location = $(this).attr('href');
        return false;
    });
})