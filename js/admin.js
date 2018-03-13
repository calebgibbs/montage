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
});