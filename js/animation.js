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
    $('.box-inner').click(function(){
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
    $('.mobile-H-link').click(function(){
        window.location = $(this).attr('href');
        return false;
    }); 
    $('.port-link').click(function(){
        window.location = $(this).attr('href');
        return false;
    }); 
    $('.mobile-prod-box').click(function(){
        window.location = $(this).attr('href');
        return false;
    });  
    $('.openSearch').click(function(){
    	$('.search').toggleClass('showSearch-d-sm'); 
    }); 
    $('.closeModal').click(function(){
    	$('.modal').removeClass('openM'); 
    	$('#sus-page').removeClass('bgM');
    });
    $('.material').on('click', function(){
    	$('#material-modal').addClass('openM'); 
    	$('#sus-page').addClass('bgM');  
    });
    $('.smart').on('click', function(){
        $('#smart-modal').addClass('openM'); 
        $('#sus-page').addClass('bgM');  
    });
    $('.recycle').on('click', function(){
        $('#recycle-modal').addClass('openM'); 
        $('#sus-page').addClass('bgM');  
    });  
    $(document).on('click','#delPrompt',function(e){
        e.preventDefault(); 
        $('.delButton2').css('display','inline-block');
    }); 
     $(document).on('click','#noDel',function(e){
        e.preventDefault(); 
        $('.delButton2').css('display','none');
    });
})