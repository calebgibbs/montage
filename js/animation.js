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
    $('.box-outer').click(function(){
        window.location = $(this).attr('href');
        return false;
    });
    $('.diamond').click(function(){
        window.location = $(this).attr('href');
        return false;
    }); 
    $('.homeLink').click(function(){
        window.location = $(this).attr('href');
        return false;
    }); 
    $('.openSearch').click(function(){
    	$('.search').toggleClass('showSearch-d-sm'); 
    }); 
    $('.closeModal').click(function(){
    	$('.modal').removeClass('openModal'); 
    	$('#sus-page').removeClass('bgModal');
    });
    $('#sus-page').click(function(){
    	$('.modal').removeClass('openModal'); 
    	$('#sus-page').removeClass('bgModal');
    }); 
    $('.material').click(function(){
    	$('#material-modal').addClass('openModal'); 
    	$('#sus-page').addClass('bgModal');  
    	console.log('should work')
    });
})