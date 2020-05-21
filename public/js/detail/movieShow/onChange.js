$( document ).ready(function() { 
		
      if (window.location.href.indexOf("movie") != -1){

        //update database
        $('input, select').change(function () {

          var api_id=$(".objectSearch").attr("id");
          var timemark=$("#timemark").val();         
          var rating=$("#rating").val();
          var status=$("#status").val();          
          if ( !$('[id=heart]:checked + label').css('color')) {                
              var fav=0;
            } else {
              var fav=1;
            }
          
          saveMovieUser($("#title").text(),api_id,timemark,rating,status,fav);

      });   

          $('#timemark').on('input',function(e){
            var api_id=$(".objectSearch").attr("id");
            var timemark=$("#timemark").val();         
            var rating=$("#rating").val();
            var status=$("#status").val();          
            if ( !$('[id=heart]:checked + label').css('color')) {                
                var fav=0;
              } else {
                var fav=1;
              }
            saveMovieUser($("#title").text(),api_id,timemark,rating,status,fav);            
          });    

      }else{

        //update database
       $('input, select').change(function () {

          var api_id=$(".objectSearch").attr("id");
          var timemark=$("#timemark").val();
          var season=$("#season").val();
          var episode=$("#episode").val();
          var rating=$("#rating").val();
          var status=$("#status").val();          
          if ( !$('[id=heart]:checked + label').css('color')) {                
              var fav=0;
            } else {
              var fav=1;            }
          
          saveShowUser($("#title").text(),api_id,timemark,season,episode,rating,status,fav);

       });

       $('#timemark').on('input',function(e){
          var api_id=$(".objectSearch").attr("id");
          var timemark=$("#timemark").val();
          var season=$("#season").val();
          var episode=$("#episode").val();
          var rating=$("#rating").val();
          var status=$("#status").val();          
          if ( !$('[id=heart]:checked + label').css('color')) {                
              var fav=0;
            } else {
              var fav=1;            }

             
            saveMovieUser($("#title").text(),api_id,timemark,rating,status,fav);            
          }); 

      }

});