$(document).ready(function(){  
	//selecting
	$('#cat1').blur(function(){
		var option = $('#cat1 option:selected').text().toLowerCase(); 
		if(option === 'tech and accesories'){ 
			$('.agileSel').removeClass('showSel');
			$('.joinerySel').removeClass('showSel');  
			$('.seatingCat').removeClass('showSel'); 
			$('.tablesCat').removeClass('showSel'); 		 
			$('.techCat').addClass('showSel');			
		}else if(option === 'table'){ 
			$('.agileSel').removeClass('showSel');
			$('.joinerySel').removeClass('showSel');  
			$('.seatingCat').removeClass('showSel'); 
			$('.techCat').removeClass('showSel');
			$('.tablesCat').addClass('showSel'); 		
		}else if(option === 'agile furniture'){ 
			$('.joinerySel').removeClass('showSel'); 
			$('.seatingCat').removeClass('showSel'); 
			$('.tablesCat').removeClass('showSel'); 
			$('.techCat').removeClass('showSel'); 
			$('.agileSel').addClass('showSel');  
		}else if(option === 'seating'){ 
			$('.agileSel').removeClass('showSel'); 
			$('.joinerySel').removeClass('showSel');  
			$('.tablesCat').removeClass('showSel'); 
			$('.techCat').removeClass('showSel');
			$('.seatingCat').addClass('showSel'); 		
		}else if(option === 'joinery and custom'){ 
			$('.agileSel').removeClass('showSel');  
			$('.seatingCat').removeClass('showSel');
			$('.tablesCat').removeClass('showSel'); 
			$('.techCat').removeClass('showSel');
			$('.joinerySel').addClass('showSel'); 
		}else{ 
			$('.agileSel').removeClass('showSel'); 
			$('.joinerySel').removeClass('showSel');  
			$('.seatingCat').removeClass('showSel'); 
			$('.tablesCat').removeClass('showSel'); 
			$('.techCat').removeClass('showSel');
		}
	}); 
	//sticky form 
	var option = $('#cat1 option:selected').text().toLowerCase(); 
	if(option === 'tech and accesories'){ 
		$('.techCat').addClass('showSel');	
	}else if(option === 'table'){ 
		$('.tablesCat').addClass('showSel');
	}else if(option === 'agile furniture'){ 
		$('.agileSel').addClass('showSel');
	}else if(option === 'seating'){
		$('.seatingCat').addClass('showSel'); 	
	}else if(option === 'joinery and custom'){
		$('.joinerySel').addClass('showSel');	
	}
});