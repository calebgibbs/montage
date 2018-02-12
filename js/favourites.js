$(document).ready(function(){
	$('#login-trig').click(function(){
		$('#login-form').removeClass('remove');
		$('#login-form').addClass('view'); 
		$('.buttons').removeClass('view');
		$('.buttons').addClass('remove');
		$('#signup-form').removeClass('view');
		$('#signup-form').addClass('remove'); 
		$('#favourite-products-all').removeClass('view');
		$('#favourite-products-all').addClass('remove'); 
		$('#fav-tab-title').text("Sign in");
	}); 
	$('#signup-trig').click(function(){
		$('#signup-form').removeClass('remove');
		$('#signup-form').addClass('view');
		$('#login-form').removeClass('view');
		$('#login-form').addClass('remove'); 
		$('.buttons').removeClass('view');
		$('.buttons').addClass('remove');
		$('#favourite-products-all').removeClass('view');
		$('#favourite-products-all').addClass('remove'); 
		$('#fav-tab-title').text("Sign up");
	});
	$('.back-btn').click(function(){
		$('#login-form').removeClass('view');
		$('#login-form').addClass('remove');
		$('#signup-form').removeClass('view');
		$('#signup-form').addClass('remove');  
		$('.buttons').removeClass('remove');
		$('.buttons').addClass('view');
		$('#favourite-products-all').removeClass('remove');
		$('#favourite-products-all').addClass('view');
		$('#fav-tab-title').text("Favourites");
	}); 
	$('#gtsu').click(function(){
		$('#login-form').removeClass('view');
		$('#login-form').addClass('remove');
		$('#signup-form').removeClass('remove');
		$('#signup-form').addClass('view'); 
		$('.buttons').removeClass('view');
		$('.buttons').addClass('remove'); 
		$('#fav-tab-title').text("Sign up");
	});
	$('#gtli').click(function(){
		$('#login-form').removeClass('remove');
		$('#login-form').addClass('view'); 
		$('.buttons').removeClass('view');
		$('.buttons').addClass('remove');
		$('#signup-form').removeClass('view');
		$('#signup-form').addClass('remove');
		$('#fav-tab-title').text("Sign in");
	}); 

	$('.favDel').click(function(){
		var ids = $(this).attr('id'); 
		
		userId = ids.split(':').pop();  

		productId = ids.split(':').shift();

		var dataForServer = {
			product:productId, 
			user:userId
		}
		$.ajax({
			type:'post', 
			url:'app/ajax/Favourites.php',
			data: dataForServer, 
			success:function(dataFromServer){ 
				if( dataFromServer === 'Success'){ 
					$('#favourite-products-all').load(document.URL +  ' #favourite-products-all'); 
					return;
				}	
			}
		}); 
		return;
	}); 


});	