$( document ).ready(function() { 


    function save(api_id){
          
          if (window.location.href.indexOf("movie") != -1){
            
            var title=$("."+api_id+" [name='title']:first").text();
            var timemark=$("."+api_id+" [name='timemark']:first").val();
            var rating=$("."+api_id+" [name='rating']:first").val();
            var status=$("."+api_id+" [name='status']:first").val();
            var fav=$("."+api_id+" [name='fav']:first").val();
            
            saveMovieUser(title,api_id,timemark,rating,status,fav);

          }else if (window.location.href.indexOf("show") != -1){

            var title=$("."+api_id+" [name='title']:first").text();
            var timemark=$("."+api_id+" [name='timemark']:first").val();
            var season=$("."+api_id+" [name='season']:first").val();
            var episode=$("."+api_id+" [name='episode']:first").val();
            var rating=$("."+api_id+" [name='rating']:first").val();
            var status=$("."+api_id+" [name='status']:first").val();
            var fav=$("."+api_id+" [name='fav']:first").val();
          
             saveShowUser(title,api_id,timemark,season,episode,rating,status,fav);

          }else{

            var title=$("."+api_id+" [name='title']:first").text();
            var bookmark=$("."+api_id+" [name='bookmark']:first").val();
            var line=$("."+api_id+" [name='line']:first").val();
            var rating=$("."+api_id+" [name='rating']:first").val();
            var status=$("."+api_id+" [name='status']:first").val();    
            var fav=$("."+api_id+" [name='fav']:first").val();

              saveBookUser(title,api_id,bookmark,line,rating,status,fav);

          }
      }

      $('input[name="timemark"').on('input',function(e){

        api_id= $(':focus').closest( "tr" ).attr("class"); 
        name= $(':focus').attr('name');
        $('.'+api_id+" [name='"+name+"']" ).each(function() {
              $( this ).val($(':focus').val());
         });
        save(api_id);
      });

     $('input, select').change(function (e) {
          
          api_id= $(':focus').closest( "tr" ).attr("class"); 
          name= $(':focus').attr('name');
          //alert($(":focus").attr("name"))
         /** if (api_id === undefined && api_id === undefined){
            name="timemark";
            select=($(':focus').closest( "select" ));

            api_id=select.closest( "tr" ).attr("class");
          }**/

          $('.'+api_id+" [name='"+name+"']" ).each(function() {
              $( this ).val($(':focus').val());
          });

          save(api_id);

      });


     

});