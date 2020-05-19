$( document ).ready(function() {  
	
	if(searched!=""){
		searchMovieOrShowByNameAPI(searched);
		searchBookByNameAPI(searched);
	}

	$( ".figure" ).parent().parent().each(function() {      
		id=$(this).attr("type");
		type=$(this).attr("id");
     	$(html).not('#'+id+'[type="'+type+'"]:first').remove();
     
  	});
	
	
});