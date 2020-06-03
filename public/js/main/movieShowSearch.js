function searchMovieOrShowByIdDB (id){

    $.ajax({
       method: 'GET',
       url: '/getMovieOrShow/'+id,
       dataType: 'json',	
       data:{},
       success: function(result){
        	//Change data
            len=Object.keys(result).length;
            if (len==0){     

            	//THERE IS NO DATA ON DB Search on API
            	searchMovieOrShowByIdAPI(id);
            }
            else{
                if (window.location.href.indexOf("movie") != -1 || window.location.href.indexOf("show")!= -1) {


                  addHTMLDetailMovieShow(result[0]['title'], result[0]['awards'], result[0]['country'], result[0]['director'],result[0]['writer'],result[0]['actors'],result[0]['genre'],result[0]['language'],result[0]['plot'],result[0]['image'],result[0]['rated'],result[0]['released'],result[0]['runtime'],result[0]['type'],result[0]['imdbID']);
                  $(".containerSpecial").css("visibility", "visible");   
              }else{

	   				//save in home
	   				//Change data THERE IS DATA
                    $(".searchThisMS > div#"+id+ "> img").attr("src", result[0]['image']).removeAttr("href");
                }

            }
        },
        error: function (error) {
	       //console.log(error);
      }
  });
}


function searchMovieOrShowByIdDBType (id, type){

    $.ajax({
        method: 'GET',
        url: '/getMovieOrShow/'+id,
        dataType: 'json',   
        data:{},
        success: function(result){
            //Change data
            len=Object.keys(result).length;
            if (len==0){     

                //THERE IS NO DATA ON DB Search on API
                searchMovieOrShowByIdAPI(id);
            }
            else{                
                if(result[0]['type']==type){
                    addHTMLDetailMovieShow(result[0]['title'], result[0]['awards'], result[0]['country'], result[0]['director'],result[0]['writer'],result[0]['actors'],result[0]['genre'],result[0]['language'],result[0]['plot'],result[0]['image'],result[0]['rated'],result[0]['released'],result[0]['runtime'],result[0]['type'],result[0]['imdbID']);    
                    $(".containerSpecial").css("visibility", "visible");   
                }else{
                   window.location.href = "/";
               }
           }
       },
       error: function (error) {
           //console.log(error);
       }
   });
}

function searchMovieOrShowByIdAPI(id){

	//http://www.omdbapi.com/?t=
	//http://www.omdbapi.com/?i=

    $.ajax({
        headers: {
            'Access-Control-Allow-Origin': '*',
            'Content-Type':'application/json'
        },
        method: "GET",
        url: "http://www.omdbapi.com/?i=" + id + "&apikey=ea71ae3c" ,
        dataType: 'jsonp',
        success: function(result){
        	//console.log(result);
        	//save detail
        	if (window.location.href.indexOf("movie") != -1 || window.location.href.indexOf("show")!= -1 || window.location.href.indexOf("book")!= -1) {

               addHTMLDetailMovieShow(result['Title'], result['Awards'], result['Country'], result['Director'],result['Writer'],result['Actors'],result['Genre'],result['Language'],result['Plot'],result['Poster'],result['Rated'],result['Released'],result['Runtime'],result['Type'],result['imdbID']);
               $(".containerSpecial").css("visibility", "visible");   

           }else if(window.location.href.indexOf("search") != -1 ){

            addHTMLSearchMovieShow(result['Title'],result['imdbID'],result['Type'],result['Poster']);

        }else{
   				//save in home
   				$(".searchThisMS > div#"+result['imdbID']+ "> img").attr("src", result['image']).removeAttr("href");
               }

               saveMovieOrShow(result['Title'], result['Awards'], result['Country'], result['Director'],result['Writer'],result['Actors'],result['Genre'],result['Language'],result['Plot'],result['Poster'],result['Rated'],result['Released'],result['Runtime'],result['Type'],result['imdbID']);
           },
           error: function(error){
        	//console.log(error);
        }

    });

}

function searchMovieOrShowByNameAPI(name){

    //http://www.omdbapi.com/?t=
    //http://www.omdbapi.com/?i=

    $.ajax({
        headers: {
            'Access-Control-Allow-Origin': '*',
            'Content-Type':'application/json'
        },
        method: "POST",
        url: "http://www.omdbapi.com/?t=" + name + "&apikey=ea71ae3c" ,
        dataType: 'jsonp',
        success: function(result){

            if (result['Title']) {
                searchMovieOrShowByIdDB(result['imdbID']);

            }            

        },
        error: function(error){
            //console.log(error);
        }

    });

}


function saveMovieOrShow(Title,Awards,Country,Director,Writer,Actors,Genre,Language,Plot,Poster,Rated,Released,Runtime,Type,imdbID){

	$.ajax({
       headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
       method: 'POST',
       url: '/saveMovieOrShow',
       dataType: 'json',
       data: {
           '_token': $('input[name=_token]').val(),
           'Title':Title,
           'Awards': Awards,
           'Country': Country,
           'Director': Director,
           'Writer': Writer ,
           'Actors': Actors,
           'Genre': Genre,
           'Language': Language,
           'Plot': Plot,
           'Poster': Poster,
           'Rated': Rated,
           'Released': Released ,
           'Runtime': Runtime,
           'Type': Type ,
           'imdbID': imdbID
       },	

       error: function (error) {
	       // console.log(error);
      }
  });    

}

function addHTMLDetailMovieShow(Title,Awards,Country,Director,Writer,Actors,Genre,Language,Plot,Poster,Rated,Released,Runtime,Type,imdbID){

	$('.title').text(Title);
    $('.addContent').append('<b>Awards</b>: '+ Awards+"<br/>");
    $('.addContent').append('<b>Country</b>: '+ Country+"<br/>");
    $('.addContent').append('<b>Director</b>: '+ Director+"<br/>");
    $('.addContent').append('<b>Writer</b>: '+ Writer +"<br/>");
    $('.addContent').append('<b>Actors</b>: '+ Actors+"<br/>");
    $('.addContent').append('<b>Genre</b>: '+ Genre+"<br/>");
    $('.addContent').append('<b>Language</b>: '+ Language+"<br/>");
    $('.addContent').append('<b>Plot</b>: '+ Plot+"<br/>");
    $('.addContent').append('<b>Rated</b>: '+ Rated+"<br/>");
    $('.addContent').append('<b>Released</b>: '+ Released +"<br/>");
    $('.addContent').append('<b>Runtime</b>: '+ Runtime+"<br/>");
    $("#photo").attr("src", Poster);

}


function addHTMLSearchMovieShow(title,id, type,image){

    if (type=="movie") {
        newtype="movie";
    }else{
        newtype="serie";
    }
    

    if ($("#"+id+"[type="+newtype+"s]").length == 0){

        $(".search").append('<div id="'+id+'" type="'+type+'s" class="col-sm-2 col-md-2 col-xs-2"><a href="/'+newtype+'/'+id+'"><figure class="figure"><img src="'+image+'" alt="..." class="figure-img img-fluid rounded" style="height: 200px;"> <figcaption class="figure-caption">'+title+'</figcaption></figure></a></div>');

    }


}



function saveMovieUser (title,api_id,timemark,rating,status,fav){

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method: 'POST',
        url: '/saveMovieUser',
        dataType: 'json',
        data: {
            '_token': $('input[name=_token]').val(),
            'title':title,
            'api_id':api_id,
            'timemark': timemark,
            'rating':rating,
            'status': status,
            'fav': fav,
        },  

        error: function (error) {
            //console.log("saveBook");
           // console.log(error);
       }
   }); 
}



function saveShowUser (title,api_id,timemark,season,episode,rating,status,fav){

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method: 'POST',
        url: '/saveShowUser',
        dataType: 'json',
        data: {
            '_token': $('input[name=_token]').val(),
            'title':title,
            'api_id':api_id,
            'timemark': timemark,
            'episode': episode,
            'season': season,
            'rating':rating,
            'status': status,
            'fav': fav,
        },  

        error: function (error) {
            //console.log("saveBook");
           // console.log(error);
       }
   }); 
}