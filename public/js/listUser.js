$( document ).ready(function() {    
	
	$('#All')
  .clone()
  .attr('id', 'Watching')
  .css('display','none')
  .insertAfter('#All');

  $('#All')
  .clone()
  .attr('id', 'Dropped')
  .css('display','none')
  .insertAfter('#Watching');

  $('#All')
  .clone()
  .attr('id', 'Completed')
  .css('display','none')
  .insertAfter('#Dropped');

  $('#All')
  .clone()
  .attr('id', 'Plantowatch')
  .css('display','none')
  .insertAfter('#Completed');

  $( ".status" ).each(function() {      
    $(this).find("select").val($(this).attr("status"));
  });
  
   $( ".rating" ).each(function() {      
    $(this).find("select").val($(this).attr("rating"));
  });



  $('#Watching').find( "[name='status']" ).each(function() {
 		if ($( this ).val()!="Watching") {
 			$(this).parent().parent().remove();
 		}
	});  
	$('#Dropped').find( "[name='status']" ).each(function() {
 		if ($( this ).val()!="Dropped") {
 			$(this).parent().parent().remove();
 		}
	});
	$('#Completed').find( "[name='status']" ).each(function() {
 		if ($( this ).val()!="Completed") {
 			$(this).parent().parent().remove();
 		}
	});
	$('#Plantowatch').find( "[name='status']" ).each(function() {
 		if ($( this ).val()!="Plan to watch") {
 			$(this).parent().parent().remove();
 		}
   });
  

 });