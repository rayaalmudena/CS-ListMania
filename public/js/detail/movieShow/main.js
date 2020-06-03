$( document ).ready(function() { 
    
    if (window.location.href.indexOf("movie") != -1){ 

	//searchMovieOrShowByIdDBType($(".objectSearch").attr("id"), "movies");  
	searchMovieOrShowByIdDB($(".objectSearch").attr("id"));  

    }else{

    // searchMovieOrShowByIdDBType($(".objectSearch").attr("id"), "series");  
     searchMovieOrShowByIdDB($(".objectSearch").attr("id"));  
    
    }
  	
});