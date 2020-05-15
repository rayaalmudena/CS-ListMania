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

    $('#Watching').find( ".status" ).each(function() {
 		if ($( this ).text()!="Watching") {
 			$(this).parent().remove();
 		}
	});

	$('#Dropped').find( ".status" ).each(function() {
 		if ($( this ).text()!="Dropped") {
 			$(this).parent().remove();
 		}
	});

	$('#Completed').find( ".status" ).each(function() {
 		if ($( this ).text()!="Completed") {
 			$(this).parent().remove();
 		}
	});

	$('#Plantowatch').find( ".status" ).each(function() {
 		if ($( this ).text()!="Plan to watch") {
 			$(this).parent().remove();
 		}
	});

});