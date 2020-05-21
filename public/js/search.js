$( document ).ready(function() {  
	
	if(searched!=""){
		searchMovieOrShowByNameAPI(searched);
		searchBookByNameAPI(searched);
	}
	
});