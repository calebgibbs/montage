$(document).ready(function(){
	var validEmail = false;  
	var validPassword = false; 
	var Pemail = false;  
	$('#email').blur(function(){
		var emailValue = $(this).val(); 

		var reg = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;

		$('#email-message').empty(); 

		if ( $(this).val().length === 0 ) {
			$("#email-message").removeClass("success").addClass("error").append("This is required");
			validEmail = false;
			return;
		}else if(!$(this).val().match(emailValue)){
			$("#email-message").removeClass("success").addClass("error").append("Email address is invalid");
			validEmail = false;
			return;
		}else{ 
			$('#email-message').empty();	
		} 

		//prepearing ajax 
		var dataForServer = {
			email:emailValue
		} 

		$.ajax({
			type:'post', 
			url:'app/ajax/LoginValidation.php',
			data: dataForServer, 
			success:function(dataFromServer){
				// console.log(dataFromServer); 
				if( dataFromServer === 'emailSuccess' ){
					$('#email-message').empty(); 
					validEmail = true; 
					return;
				}else{ 
					$("#email-message").removeClass("success").addClass("error").append("Email address is invalid");	
					validEmail = false;
					return;
				}
			}
		});
	}); 
	$('#password').blur(function(){
		var passwordValue = $(this).val();  
		$("#password-message").empty();

		if (passwordValue.length === 0) {
			$("#password-message").removeClass("success").addClass("error").append("Password is required");	
			var validPassword = false;  
			return;
		}else if(passwordValue.length < 8){ 
			$("#password-message").removeClass("success").addClass("error").append("Invalid password");	
			var validPassword = false;  
			return;	
		}else{ 
			$("#password-message").empty();
		}  

		var enterdEmailValue = $('#email').val(); 

		var dataForServer = {
			password:passwordValue, 
			entdEmail:enterdEmailValue
		}  

		$.ajax({
			
			type:'post',
			url: 'app/ajax/LoginValidation.php',
			data: dataForServer,
			success:function(dataFromServer){
				// console.log(dataFromServer);
				if(dataFromServer === 'passwordSuccess'){
					ValidPassword = true; 
					return;
				} else {	 
					ValidPassword = false; 
					return;		
				}
			},
			error: function(){
				console.log('Cannot Connect to Server'); 
			}
		}); 

		$(document).on('click', '#log-in-button',function(e){
			if ( ValidPassword === true && ValidEmail === true ) {

			} else {	
				e.preventDefault(); 
				$("#password-message").empty();
				$("#password-message").removeClass("success").addClass("error").append("Passowrd or Email is incorrect"); 
				console.log('cannot log in with these details'); 
				return false;
			} 
		});
	}); 
	$('#emailReset').keyup(function(){ 
		var resEmail = $(this).val(); 
		var dataForServer = { 
			resEmail:resEmail
		}  
		$.ajax({
			type:'post', 
			url:'app/ajax/AccountController.php',
			data: dataForServer, 
			success:function(dataFromServer){
				if(dataFromServer === 'success'){ 
					return Pemail = true;	
				}else{ 
					return Pemail = false;
				} 
			}
		});
	}); 
	$(document).on('click','#change-p-btn',function(e){
		e.preventDefault();
		if(Pemail === true){ 
			$('#reset-email-message').empty(); 
			var email = $('#emailReset').val(); 
			var dataForServer = {
				passwordReset:email
			}
			$.ajax({
				type:'post', 
				url:'app/ajax/AccountController.php',
				data: dataForServer, 
				success:function(dataFromServer){
					if(dataFromServer == 'sent'){
						$('#reset-email-message').empty(); 
						$('.reset-form').addClass('is-sent');  
						$('#change-p-btn').empty().append('sent'); 
						$('.reset-success').addClass('reset-success-show');
						return Pemail = false;
					} 
				}
			});
		}else{ 
			$('#reset-email-message').empty(); 
			$('#reset-email-message').addClass('error').append('This email address is not in our databse');
		}
	})
});