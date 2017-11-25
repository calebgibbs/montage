$(document).ready(function(){
	$('.category').each(function(i){
		setTimeout(function(){
			$('.category').eq(i).addClass('category-in')
		}, 300 * i);
	}); 

	$('.diamond').each(function(i){
		setTimeout(function(){
			$('.diamond').eq(i).addClass('diamond-in')
		}, 300 * i);
	});
})