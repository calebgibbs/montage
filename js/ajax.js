$(doument).ready(function(){
	$('#logmein').submit(function(e){
		e.preventDefault(); 
		$.ajax({ 
			type: "POST", 
			url: 'app/controllers/LoginController.php', 
			data: $(this).seralize(), 
			success: function(data) 
			{ 
				
			}
		});
	});
});