
  $( document ).ready(function() {         
       
       //geting the info from user
               
        $("#bookmark").val(val[0]['bookmark']);  
        $("#line").val(val[0]['line']);
        $("#rating").val(val[0]['rating']);
        $("#status").val(val[0]['status']);
        
        if (val[0]['favourite']===1) {
          $('#heart').attr('checked', "checked");
        }

  
});
