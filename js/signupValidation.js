$(document).ready(function(){
	var SUname = false; 
	var SUemail = false;  
	var SUcompany = false;
	var SUpassword1 = false;  
	var SUpassword2 = false; 
	$('#SUname').blur(function(){

		$('#su-name-message').empty(); 
		var nameReg = /^[A-Za-z '.]+$/;

		if ($(this).val().length === 0){
			$("#su-name-message").append("Your name is required"); 
			SUname = false; 
			return; 
		}else if($(this).val().length >= 75){ 
			$("#su-name-message").append("Name is too long"); 
			SUname = false; 
			return;	
		}else if(!$(this).val().match(nameReg)){
			$("#su-name-message").append("Please enter a valid name"); 
			SUname = false; 
			return;	
		}else{ 
			$('#su-name-message').empty();
			SUname = true; 
			return;	
		}
	}); 

	$('#SUemail').blur(function(){ 
		
		var reg = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
		
		var emailVal = $(this).val(); 

		$('#su-email-message').empty(); 

		if($(this).val().length === 0){ 
			$('#su-email-message').append("Your Email is required"); 
			SUemail = false; 
			return;	
		}else if($(this).val().length >= 255){
			$('#su-email-message').append("Your Email is too long"); 
			SUemail = false; 
			return;	
		}else if(!$(this).val().match(reg)){
			$('#su-email-message').append("Please enter a valid email address"); 
			SUemail = false; 
			return;
		} 

		var dataForServer = { 
			email: emailVal
		} 

		$.ajax({
			type:'post', 
			url:'app/ajax/SignupValidation.php', 
			data:dataForServer, 
			success:function(dataFromServer){    
				if( dataFromServer === 'error' ){ 
					$('#su-email-message').empty(); 
					SUemail = true; 
					return;	
				}else if( dataFromServer === 'noEmail' ){ 
					$('#su-email-message').empty(); 
					SUemail = true; 
					return;	
				}else if( dataFromServer === 'emailFound' ){ 
					$('#su-email-message').append("You already have an account. Please log in"); 
					SUemail = false; 
					return;	
				} 
			}
		});

	}); 

	$('#SUcompany').blur(function(){
		$('#su-company-message').empty();
		if($(this).val().length === 0){ 
			$('#su-company-message').append("Your company name is required");	 
			SUcompany = false; 
			return; 
		}else if($(this).val().length > 80){ 
			$('#su-company-message').append("The company name is too long");	 
			SUcompany = false; 
			return;
		}else{ 
			$('#su-company-message').empty(); 
			SUcompany = true; 
			return;	
		}
	}); 

	$('#SUpwd1').blur(function(){
		$('#su-pass1-message').empty(); 
		if($(this).val().length === 0){
			$('#su-pass1-message').append("Password is required");	 
			SUpassword1 = false; 
			return; 
		}else if($(this).val().length < 8){
			$('#su-pass1-message').append("Password is too short");	 
			SUpassword1 = false; 
			return; 
		}else{ 
			$('#su-pass1-message').empty();	 
			SUpassword1 = true; 
			return;
		}
	}); 

	$('#SUpwd2').blur(function(){
		$('#su-pass2-message').empty(); 
		var pass1 = $('#SUpwd1').val(); 
		var pass2 = $(this).val();  
		if ($(this).val().length === 0){
			$('#su-pass2-message').append("Please repeat password");
			SUpassword2 = false;
			return;	
		}else if(pass1 != pass2){
			$('#su-pass2-message').append("Passwords do not match");
			SUpassword2 = false;
			return;	
		}else{ 
			$('#su-pass2-message').empty();
			SUpassword2 = true;
			return;	
		}
	}); 

	$(document).on('click', '#signup-button', function(e){
		if( SUname === true && SUemail === true && SUcompany === true && SUpassword1 === true && SUpassword2 === true ){

		}else{ 
			e.preventDefault();
			console.log('cannot log in with these details'); 
			return false;
		}
	});


});