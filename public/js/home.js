$( document ).ready(function() {  

	$(".searchThisMS >div").each(function() {		
  		searchMovieOrShowByIdDB($( this ).attr("id"));
	});

	$(".searchThisB > div").each(function() {		
  		searchBookByIdDB($( this ).attr("id"));
	});	

});


  