$( document ).ready(function() { 
		
      if (window.location.href.indexOf("movie") != -1){        

         //geting the info from user
          $("#timemark").val(val[0]['timemark']);
          $("#rating").val(val[0]['rating']);
          $("#status").val(val[0]['status']);
          
          if (val[0]['favourite']===1) {
           $('#heart').attr('checked', "checked");
          }

      }else{
      
       //geting the info from user
      
        $("#timemark").val(val[0]['timemark']);
        $("#season").val(val[0]['season']);
        $("#episode").val(val[0]['episode']);
        $("#rating").val(val[0]['rating']);
        $("#status").val(val[0]['status']);
        
        if (val[0]['favourite']===1) {
          $('#heart').attr('checked', "checked");
        }


      }




});