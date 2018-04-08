$(document).ready(function(){
	$('#emailTest').keyup(function(){
		var email = $(this).val(); 
		var dataForServer = { 
			Testemail:email
		}  
		$.ajax({
			type:'post', 
			url:'app/ajax/AccountController.php', 
			data:dataForServer, 
			success:function(dataFromServer){
				if (dataFromServer === 'success') {
					$('.regAdmin').css('display','none');	 
					$('.updateUser').css('display', 'block');
				}else{ 
					$('.regAdmin').css('display','block');	 
					$('.updateUser').css('display', 'none');	
				}
			}
		});
	}); 
	$('#pwdPrompt').click(function(){
		$('#pwdPrompt').css('display','none');
		$('#getPwd').css('display','block'); 
		$('#lgDetails').css('display','block')
	}); 
	$('#helpPwdSb').click(function(){
		var pwd = $('#getLG').val(); 
		var id = $('#helpPwdSb').val();  
		if(pwd.length === 0 || pwd.length < 8){
			$('#HelpErMsg').empty().append(' *Please enter a valid password');
		}else{ 
			var dataForServer = {
				Helppwd:pwd, 
				Helpid:id
			}
			$.ajax({
			type:'post', 
			url:'app/ajax/AccountController.php', 
			data:dataForServer, 
			success:function(dataFromServer){
				if (dataFromServer != 'wrongPwd') {
					$('#HelpErMsg').empty(); 
					var details = dataFromServer.split(':'); 
					var user = details[0]; 
					var pass = details[1];
					$('#saberU').append('<i>'+user+'</i>'); 
					$('#saberP').append('<i>'+pass+'</i>'); 
					$('#getPwd').css('display','none');
				}else{ 
					$('#HelpErMsg').empty().append(' *Please enter a valid password');			
				}
			}
		});	
		}
	}); 
	$('.edit-manager').click(function(e){
		e.preventDefault(); 
		var row = $(this).val(); 
		$('#edit' + row).slideToggle(); 
	});  
	$('.add-man-btn-prompt').click(function(){ 
		$('.add-man-row').slideToggle();
	});
});