$(document).ready(function(){
	var name = false;
	var email = false; 
	var company = false; 
	var currentPwd = false; 
	var pwd1 = false; 
	var pwd2 = false; 
	var del = false;
	$('#MAname').keyup(function(){ 
		var val = $(this).val();
		var reg = /^[A-Za-z '.]+$/;
		$("#MAaccountMsg").empty();
		$('#MAname').removeClass('inputError');
		if($(this).val().trim().length === 0){ 
			name = false;
			$("#MAaccountMsg").removeClass("success").addClass("error").append("This is required"); 
			$('#MAname').removeClass('inputSuccess').addClass('inputError'); 
			return;
		}else if($(this).val().trim().length > 75){ 
			name = false;
			$("#MAaccountMsg").removeClass("success").addClass("error").append("Name is too long");
			$('#MAname').removeClass('inputSuccess').addClass('inputError');  
			return;
		}else if(!reg.test($(this).val())){ 
			name = false;
			$("#MAaccountMsg").removeClass("success").addClass("error").append("Please enter a valid name");
			$('#MAname').removeClass('inputSuccess').addClass('inputError');
			return;
		}else{
			name = true;
		}

	});  

	$(document).on('click', '#nameUpdate',function(e){ 
		e.preventDefault(); 
		var id = $(this).val(); 
		var val = $('#MAname').val();
		if (name === true){
			var dataForServer = {
				name:val, 
				id:id
			}

			$.ajax({
				type:'post', 
				url:'app/ajax/AccountController.php', 
				data:dataForServer, 
				success:function(dataFromServer){
					if (dataFromServer === 'success') {
						$('#nameUpdate').empty().append('Updated!').css("background", "#5cb85c");
						$('#MAname').removeClass('inputError').addClass('inputSuccess');	
					}
				}
			});
		}
	});  

	$('#MAemail').keyup(function(){
		var reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
		$('#MAemailMsg').empty();  
		$('#MAemail').removeClass('inputError'); 
		if ($(this).val().trim().length === 0){
			$('#MAemail').removeClass('inputSuccess').addClass('inputError');
			$('#MAemailMsg').removeClass('success').addClass('error').append('This feild is required'); 
			email = false;
		}else if($(this).val().trim().length < 6){
			$('#MAemail').removeClass('inputSuccess').addClass('inputError');
			$('#MAemailMsg').removeClass('success').addClass('error').append('Please enter a valid email address'); 
			email = false;
		}else if(!reg.test($(this).val())){
			$('#MAemail').removeClass('inputSuccess').addClass('inputError');
			$('#MAemailMsg').removeClass('success').addClass('error').append('Please enter a valid email address'); 
			email = false;
		}else if($(this).val().trim().length > 255){
			$('#MAemail').removeClass('inputSuccess').addClass('inputError');
			$('#MAemailMsg').removeClass('success').addClass('error').append('Email is too long'); 
			email = false;
		}else{ 
			var value = $('#MAemail').val().trim(); 

			var dataForServer = {
				testEmail:value
			} 

			$.ajax({
				type:'post', 
				url:'app/ajax/AccountController.php', 
				data:dataForServer, 
				success:function(dataFromServer){
					if (dataFromServer === 'invalid'){
						$('#MAemail').removeClass('inputSuccess').addClass('inputError');
						$('#MAemailMsg').removeClass('success').addClass('error').append('Email already exists'); 
						email = false;	
					}else if( dataFromServer === 'valid' ){  
						email = true; 
					}else{ 
						$('#MAemailMsg').removeClass('success').addClass('error').append('Unable to access database. Please try later'); 	
					}
				}
			});
		}
	}); 

	$(document).on('click', '#emailUpdate', function(e){
		e.preventDefault(); 
		var id = $(this).val(); 
		var emailValue = $('#MAemail').val(); 

		if( email === true ){
			var dataForServer = {
				newEmail:emailValue, 
				id:id
			} 

			$.ajax({
				type:'post', 
				url:'app/ajax/AccountController.php', 
				data:dataForServer, 
				success:function(dataFromServer){
					if(dataFromServer === 'updateSuccess'){ 
						$('#MAemailMsg').empty();
						$('#MAemail').removeClass('inputError').addClass('inputSuccess');
						$('#emailUpdate').empty().append('Updated!').css("background", "#5cb85c");	
					}else if(dataFromServer === 'something went wrong'){ 
						$('#MAemailMsg').removeClass('success').addClass('error').append('Something went wrong');	
					}
				}
			});
		}
	}); 

	$('#MAcompany').keyup(function(){
		$('#MAcompanyMsg').empty();  
		$('#MAcompany').removeClass('inputError');
		if ($(this).val().trim().length === 0){
			$('#MAcompanyMsg').removeClass('success').addClass('error').append('This feild is required'); 
			$('#MAcompany').removeClass('inputSuccess').addClass('inputError'); 
			company = false;
		}else if ($(this).val().trim().length > 80){
			$('#MAcompanyMsg').removeClass('success').addClass('error').append('Company name is too long'); 
			$('#MAcompany').removeClass('inputSuccess').addClass('inputError'); 
			company = false;
		}else{ 
			$('#MAcompanyMsg').empty();
			$('#MAcompany').removeClass('inputError');
			company = true;
		}
	}); 

	$(document).on('click', '#companyUpdate', function(e){
		e.preventDefault();  
		var value = $('#MAcompany').val(); 
		var id = $('#companyUpdate').val();
		if( company === true ){
			var dataForServer = {
				company:value, 
				id:id
			} 

			$.ajax({
				type:'post', 
				url:'app/ajax/AccountController.php', 
				data:dataForServer, 
				success:function(dataFromServer){
					if(dataFromServer === 'updateSuccess'){ 
						$('#MAcompany').removeClass('inputError').addClass('inputSuccess'); 
						$('#companyUpdate').empty().append('Updated!').css("background", "#5cb85c");		
					}else{ 
						$('#MAcompany').removeClass('inputError').removeClass('inputSuccess'); 
						$('#MAcompanyMsg').removeClass('success').addClass('error').append('Something went wrong. Please try later');	
					}
				}
			});
		}
	});  

	$(document).on('click','#elistUn',function(e){
		e.preventDefault();  
		var data = 'no';  
		var id = $('#elistUn').val();
		var dataForServer = {
			data:data,
			id:id
		} 
		$.ajax({
				type:'post', 
				url:'app/ajax/AccountController.php', 
				data:dataForServer, 
				success:function(dataFromServer){
					if(dataFromServer === 'success'){
						$('#elistUn').empty().append('Unsubscribed!').css('color','#5cb85c'); 		
					}else{ 
						console.log(dataFromServer);
					} 
				}
			});
	});  

	$(document).on('click','#elistSub',function(e){
		e.preventDefault();  
		var data = 'yes';  
		var id = $('#elistSub').val();
		var dataForServer = {
			data:data,
			id:id
		} 
		$.ajax({
				type:'post', 
				url:'app/ajax/AccountController.php', 
				data:dataForServer, 
				success:function(dataFromServer){
					if(dataFromServer === 'success'){
						$('#elistSub').empty().append('Subscribed!').css('color','#5cb85c'); 		
					}else{ 
						console.log(dataFromServer);
					}
				}
			});
	}); 

	$('#MAcurrentPwd').blur(function(){
		$('#MAcurrentpwdMsg').empty();
		$('#MAcurrentPwd').removeClass('inputError'); 
		var value = $('#MAcurrentPwd').val(); 
		var id = $('#changePwdTrig').val();  
		if ($(this).val().length === 0){
			$('#MAcurrentpwdMsg').append('This feild is required');
			$('#MAcurrentPwd').removeClass('inputSuccess').addClass('inputError');
			currentPwd = false; 
		}else if($(this).val().length < 8){ 
			$('#MAcurrentpwdMsg').append('Please enter a valid password');
			$('#MAcurrentPwd').removeClass('inputSuccess').addClass('inputError');
			currentPwd = false; 
		}else{ 
			var dataForServer = {
				cPwd:value, 
				id:id
			} 
			$.ajax({
				type:'post', 
				url:'app/ajax/AccountController.php', 
				data:dataForServer, 
				success:function(dataFromServer){
					if(dataFromServer === 'passwordSuccess'){
						$('#MAcurrentpwdMsg').empty();
						$('#MAcurrentPwd').removeClass('inputError').addClass('inputSuccess');	
						currentPwd = true;
					}else{ 
						$('#MAcurrentpwdMsg').append('Please enter a valid password')
						$('#MAcurrentPwd').removeClass('inputSuccess').addClass('inputError'); 
						currentPwd = false;	
					}	
				}
			});
		}
	}); 

	$('#MAnewPwd').blur(function(){
		$('#MAnewPwd').removeClass('inputError');  
		$('#MAnewpwdMsg').empty(); 
		if ($(this).val().length === 0){
			$('#MAnewPwd').addClass('inputError').removeClass('inputSuccess');  
			$('#MAnewpwdMsg').append('This feild is required');	
			pwd1 = false;
		}else if($(this).val().length < 8){
			$('#MAnewPwd').addClass('inputError').removeClass('inputSuccess');  
			$('#MAnewpwdMsg').append('Password is too short');	
			pwd1 = false;
		}else{
			$('#MAnewPwd').removeClass('inputError').addClass('inputSuccess');  
			$('#MAnewpwdMsg').empty();	
			pwd1 = true;	
		}
	}); 

	$('#MArepeatPwd').blur(function(){
		var p1 = $('#MAnewPwd').val(); 
		$('#MArepeatPwd').removeClass('inputError'); 
		$('#MArepeatpwdMsg').empty(); 
		if ($(this).val().length === 0){
			$('#MArepeatPwd').addClass('inputError').removeClass('inputSuccess'); 
			$('#MArepeatpwdMsg').append('This feild is required');	
			pwd2 = false;
		}else if(p1 != $(this).val()){
			$('#MArepeatPwd').addClass('inputError').removeClass('inputSuccess'); 
			$('#MArepeatpwdMsg').append('Passwords do not match');	
			pwd2 = false;	
		}else if(p1 === $(this).val()){ 
			$('#MArepeatPwd').addClass('inputSuccess').removeClass('inputError'); 
			$('#MArepeatpwdMsg').empty();	
			pwd2 = true;
		}
	}); 

	$(document).on('click', '#pwdUpdate', function(e){
		e.preventDefault(); 
		if( currentPwd === true && pwd1 === true &&  pwd2 === true){
			var p1 = $('#MAnewPwd').val(); 
			var id = $('#pwdUpdate').val(); 
			var dataForServer = {
				uPwd:p1, 
				id:id
			} 
			$.ajax({
				type:'post', 
				url:'app/ajax/AccountController.php', 
				data:dataForServer, 
				success:function(dataFromServer){
					if(dataFromServer === 'success'){
						$('#MAcurrentPwd').empty();
						$('#MAnewPwd').empty(); 
						$('#MArepeatPwd').empty(); 
						$('#pwdUpdate').empty().append('Updated!').css("background", "#5cb85c");
					}	
				}
			});
		}
	}); 

	$(document).on('click', '#delAccount', function(e){
		$('#delPinput').toggleClass('view');
		$('#delAccount').toggleClass('error');  
	}); 

	$('#DelaccPwd').keyup(function(){
		$('#DelaccPwd').removeClass('inputError'); 
		$('#delConfirm').removeClass('view');
		if ($(this).val().length < 8){
			del = false; 
			$('#DelaccPwd').addClass('inputError');
			$('#delConfirm').removeClass('view');
		}else{ 
			var pwd = $('#DelaccPwd').val(); 
			var id = $('#delAccount').val();  
			var dataForServer = {
				delP:pwd,
				id:id
			} 
			$.ajax({
				type:'post', 
				url:'app/ajax/AccountController.php', 
				data:dataForServer, 
				success:function(dataFromServer){
					if(dataFromServer === 'passwordSuccess'){
						$('#delConfirm').addClass('view'); 
						$('#DelaccPwd').removeClass('inputError'); 
						del = true;
					}else{ 
						$('#delConfirm').removeClass('view'); 
						$('#DelaccPwd').addClass('inputError'); 
						del = false;	
					}
				}
			});
		}	
	});	 

	$(document).on('click','#delConfirm',function(e){
		e.preventDefault();
		if (del === true){
			var id = $('#delAccount').val();   
			var dataForServer = {
				delId:id
			} 
			$.ajax({
				type:'post', 
				url:'app/ajax/AccountController.php', 
				data:dataForServer, 
				success:function(dataFromServer){
					if(dataFromServer === 'success'){ 
						window.location.href = "index.php?page=logout"; 
					}else{ 
						console.log('something went wrong');
					}
				}
			});

		}
	});



	

});