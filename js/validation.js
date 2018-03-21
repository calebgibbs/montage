$(document).ready(function(){  
	//selecting
	$('#cat1').blur(function(){
		var option = $('#cat1 option:selected').text().toLowerCase(); 
		if(option === 'tech and accesories'){ 
			$('.agileSel').removeClass('showSel');
			$('.joinerySel').removeClass('showSel');  
			$('.seatingCat').removeClass('showSel'); 
			$('.tablesCat').removeClass('showSel');
			$('.storageCat').removeClass('showSel'); 		 
			$('.techCat').addClass('showSel');			
		}else if(option === 'table'){ 
			$('.agileSel').removeClass('showSel');
			$('.joinerySel').removeClass('showSel');  
			$('.seatingCat').removeClass('showSel'); 
			$('.techCat').removeClass('showSel');
			$('.storageCat').removeClass('showSel');
			$('.tablesCat').addClass('showSel'); 		
		}else if(option === 'agile furniture'){ 
			$('.joinerySel').removeClass('showSel'); 
			$('.seatingCat').removeClass('showSel'); 
			$('.tablesCat').removeClass('showSel'); 
			$('.techCat').removeClass('showSel');
			$('.storageCat').removeClass('showSel'); 
			$('.agileSel').addClass('showSel');  
		}else if(option === 'seating'){ 
			$('.agileSel').removeClass('showSel'); 
			$('.joinerySel').removeClass('showSel');  
			$('.tablesCat').removeClass('showSel'); 
			$('.techCat').removeClass('showSel');
			$('.storageCat').removeClass('showSel');
			$('.seatingCat').addClass('showSel'); 		
		}else if(option === 'joinery and custom'){ 
			$('.agileSel').removeClass('showSel');  
			$('.seatingCat').removeClass('showSel');
			$('.tablesCat').removeClass('showSel'); 
			$('.techCat').removeClass('showSel');
			$('.storageCat').removeClass('showSel');
			$('.joinerySel').addClass('showSel'); 
		}else if(option === 'storage'){
			$('.agileSel').removeClass('showSel'); 
			$('.joinerySel').removeClass('showSel');  
			$('.seatingCat').removeClass('showSel'); 
			$('.tablesCat').removeClass('showSel'); 
			$('.techCat').removeClass('showSel'); 
			$('.storageCat').addClass('showSel');	
		}else{ 
			$('.agileSel').removeClass('showSel'); 
			$('.joinerySel').removeClass('showSel');  
			$('.seatingCat').removeClass('showSel'); 
			$('.tablesCat').removeClass('showSel'); 
			$('.techCat').removeClass('showSel');
			$('.storageCat').removeClass('showSel');
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
	}else if(option === 'storage'){ 
		$('.storageCat').addClass('showSel');
	}
});