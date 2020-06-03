$( document ).ready(function() { 
    
    if (window.location.href.indexOf("movie") != -1){ 

      searchMovieOrShowByIdDB_Type($(".objectSearch").attr("id"), "movies");  
    
    }else{

     searchMovieOrShowByIdDB_Type($(".objectSearch").attr("id"), "series");  
    
    }
  	
});