$( document ).ready(function() { 
    
    if (window.location.href.indexOf("movie") != -1){ 

      searchMovieOrShowByIdDBType($(".objectSearch").attr("id"), "movies");  
   
    }else{

     searchMovieOrShowByIdDBType($(".objectSearch").attr("id"), "series");  
    
    }
  	
});