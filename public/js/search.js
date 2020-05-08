$( document ).ready(function() {  
	
	searchMovieOrShowByNameAPI(searched);
	searchBookByNameAPI(searched);
	
});

$(document).load(function () {
 	
	if ($(".searchedItems").length){   
		
	}else{
		$("#success").hide();
		$("#fail").removeAttr("hidden");
	}
});
  