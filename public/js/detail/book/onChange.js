  $( document ).ready(function() {  

       //update database
       $('.input-group>input, .input-group>select').change(function () {

          var api_id=$(".objectSearch").attr("id");
          var bookmark=$("#bookmark").val();
          var line=$("#line").val();
          var rating=$("#rating").val();
          var status=$("#status").val();          
          if ( !$('[id=heart]:checked + label').css('color')) {                
              var fav=0;
            } else {
              var fav=1;
            }       

         saveBookUser($("#title").text(),api_id,bookmark,line,rating,status,fav);
       });     
      
});
