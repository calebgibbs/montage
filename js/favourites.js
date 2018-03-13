$(document).ready(function(){
	//open log in tab
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
	//open sign up tab
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
	//open account info
	$('#account-trig').click(function(){
		$('#account-form').removeClass('remove');
		$('#account-form').addClass('view');
		$('#signup-form').removeClass('view');
		$('#signup-form').addClass('remove');
		$('#login-form').removeClass('view');
		$('#login-form').addClass('remove'); 
		$('.buttons').removeClass('view');
		$('.buttons').addClass('remove');
		$('#favourite-products-all').removeClass('view');
		$('#favourite-products-all').addClass('remove'); 
		$('#fav-tab-title').text("My Details");
	});
	//back to favourites
	$('.back-btn').click(function(){
		$('#account-form').removeClass('view');
		$('#account-form').addClass('remove');
		$('#login-form').removeClass('view');
		$('#login-form').addClass('remove');
		$('#signup-form').removeClass('view');
		$('#signup-form').addClass('remove');  
		$('.buttons').removeClass('remove');
		$('.buttons').addClass('view');
		$('#favourite-products-all').removeClass('remove');
		$('#favourite-products-all').addClass('view'); 
		$('#passwordReset').addClass('remove');
		$('#passwordReset').removeClass('view');
		$('#fav-tab-title').text("Favourites");
	}); 
	//go to sign up (from log in)
	$('#gtsu').click(function(){
		$('#login-form').removeClass('view');
		$('#login-form').addClass('remove');
		$('#signup-form').removeClass('remove');
		$('#signup-form').addClass('view'); 
		$('.buttons').removeClass('view');
		$('.buttons').addClass('remove'); 
		$('#fav-tab-title').text("Sign up");
	});
	//go to log in (from sign up)
	$('#gtli').click(function(){
		$('#login-form').removeClass('remove');
		$('#login-form').addClass('view'); 
		$('.buttons').removeClass('view');
		$('.buttons').addClass('remove');
		$('#signup-form').removeClass('view');
		$('#signup-form').addClass('remove');
		$('#fav-tab-title').text("Sign in");
	});  
	//go to change password
	$('#gtcp').click(function(){
		$('#login-form').removeClass('view');
		$('#login-form').addClass('remove'); 
		$('#passwordReset').removeClass('remove');
		$('#passwordReset').addClass('view'); 
		$('#fav-tab-title').text("Password Reset");	
	});	  
	//go back to login (from reset password) 
	$('#gtsi').click(function(){
		$('#login-form').addClass('view');
		$('#login-form').removeClass('remove'); 
		$('#passwordReset').addClass('remove');
		$('#passwordReset').removeClass('view'); 
		$('#fav-tab-title').text("Sign in");
	}); 
	//change your password (from account tab)
	$('#changePwdTrig').click(function(){
		$('#account-form').removeClass('view');
		$('#account-form').addClass('remove');
		$('#changePasswords').removeClass('remove'); 
		$('#changePasswords').addClass('view'); 
	}); 
	$('.to-details').click(function(){
		$('#account-form').removeClass('remove');
		$('#account-form').addClass('view');
		$('#changePasswords').removeClass('view'); 
		$('#changePasswords').addClass('remove');
	}); 
});	