$( document ).ready(function() { 
    
    if (window.location.href.indexOf("movie") != -1){ 

      searchMovieOrShowByIdDB($(".objectSearch").attr("id"));  
    
    }else{

     searchMovieOrShowByIdDB($(".objectSearch").attr("id"));  
    
    }
  	
    setTimeout(function() {		
			$(".container").removeAttr("hidden");	
	}, 450);

});