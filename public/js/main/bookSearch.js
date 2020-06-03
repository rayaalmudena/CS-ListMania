function searchBookByIdDB (id){

    $.ajax({
        method: 'GET',
        url: '/getBook/'+id,
        dataType: 'json',   
        data:{},
        success: function(result){
            //Change data

            if (Object.keys(result).length==0){   
                //THERE IS NO DATA ON DB Search on API
                searchBookByIdAPI(id);                
            }
            else{
                if (window.location.href.indexOf("book")!= -1) {

                    addHTMLDetailBook(result[0]['country'], result[0]['api_id'], result[0]['title'], result[0]['authors'], result[0]['genre'], result[0]['plot'], result[0]['image'], result[0]['language'], result[0]['rated'], result[0]['pages'], result[0]['publisher'], result[0]['released']);
                    $(".container").css("visibility", "visible");  
                }else{
                    //save in home
                    //Change data THERE IS DATA                
                    $(".searchThisB > div#"+id+ "> img").attr("src", result[0]['image']).removeAttr("href");
                }

                
            }
        },
        error: function (error) {
           // console.log(error);
       }

   });

}

function searchBookByIdAPI (id){

    //https://www.googleapis.com/books/v1/volumes/hTDXDwAAQBAJ
    //https://www.googleapis.com/books/v1/volumes?q=shiver

    $.ajax({
        headers: {
            'Access-Control-Allow-Origin': '*',
            'Content-Type':'application/json'
        },
        method: "GET",
        url: "https://www.googleapis.com/books/v1/volumes/"+id,
        dataType: 'jsonp',
        success: function(result){

            //save detail
            if (window.location.href.indexOf("book")!= -1) {

                addHTMLDetailBook(result.accessInfo.country , result.id , result.volumeInfo.title ,JSON.stringify(result.volumeInfo.authors) ,JSON.stringify(result.volumeInfo.categories) ,result.volumeInfo.description, result.volumeInfo.imageLinks.thumbnail ,result.volumeInfo.language ,result.volumeInfo.maturityRating , result.volumeInfo.pageCount ,result.volumeInfo.publisher, result.volumeInfo.publishedDate);
                $(".container").css("visibility", "visible");  
                
            }else if(window.location.href.indexOf("search") != -1 ){

                addHTMLSearchBook(result.volumeInfo.title,result.id,"book", result.volumeInfo.imageLinks.thumbnail);
                
            }else{
                //save in home                
                $(".searchThisB > div#"+id+ "> img").attr("src", result.volumeInfo.imageLinks.thumbnail ).removeAttr("href");
            }
            
            saveBook( result.accessInfo.country , result.id , result.volumeInfo.title ,JSON.stringify(result.volumeInfo.authors) ,JSON.stringify(result.volumeInfo.categories) ,result.volumeInfo.description, result.volumeInfo.imageLinks.thumbnail ,result.volumeInfo.language ,result.volumeInfo.maturityRating , result.volumeInfo.pageCount ,result.volumeInfo.publisher, result.volumeInfo.publishedDate);
            //console.log(result.accessInfo.country ,result.id ,result.volumeInfo.title ,result.volumeInfo.authors ,result.volumeInfo.categories ,result.volumeInfo.description, thumb ,result.volumeInfo.language ,result.volumeInfo.maturityRating ,result.volumeInfo.pageCount ,result.volumeInfo.publisher ,result.volumeInfo.publishedDate);


        },
        error: function(error){
           // console.log(error);
       }

   });
}



function searchBookByNameAPI(name){

    $.ajax({
        headers: {
            'Access-Control-Allow-Origin': '*',
            'Content-Type':'application/json'
        },
        method: "GET",
        url: "https://www.googleapis.com/books/v1/volumes?q="+name,
        dataType: 'jsonp',
        success: function(result){

            if ( result.totalItems != 0) {
                var size = result.items.length;
                for (i = 0; i < size; i++) {
                  searchBookByIdDB(result.items[i].id);
              }
          }    
      },
      error: function(error){
               // console.log(error);
           }

       });


}


function saveBook(country, id, title, authors, categories, description, Image, language, maturityRating, pageCount, publisher, publishedDate){

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method: 'POST',
        url: '/saveBook',
        dataType: 'json',
        data: {
            '_token': $('input[name=_token]').val(),
            'Title':title,          
            'Country': country,
            'Authors':authors,
            'Genre': categories,
            'Plot': description,
            'Image': Image,
            'Language': language,
            'Rated': maturityRating,
            'Pages':pageCount,
            'Publisher':publisher,
            'Released': publishedDate ,
            'Id': id,
        },  

        error: function (error) {
            //console.log("saveBook");
           // console.log(error);
       }
   });    

}


function addHTMLDetailBook(country, id, title, authors, categories, description, Image, language, maturityRating, pageCount, publisher, publishedDate){

    $('.title').text(title);
    $('.addContent').append('<b>Country</b>: '+ country+"<br/>");
    $('.addContent').append('<b>Authors</b>: '+ authors+"<br/>");
    $('.addContent').append('<b>Genre</b>: '+ categories+"<br/>");
    $('.addContent').append('<b>Language</b>: '+ language+"<br/>");
    $('.addContent').append('<b>Plot</b>: '+ description+"<br/>");
    $('.addContent').append('<b>Rated</b>: '+ maturityRating+"<br/>");
    $('.addContent').append('<b>Released</b>: '+ publishedDate +"<br/>");
    $('.addContent').append('<b>Publisher</b>: '+ publisher +"<br/>");
    $('.addContent').append('<b>Pages</b>: '+ pageCount+"<br/>");
    $("#photo").attr("src", Image);
    
}



function addHTMLSearchBook(title,id, type,image){

    if ($("#"+id+"[type="+type+"s]").length == 0){  

        $(".search").append('<div id="'+id+'" type="'+type+'s" class="col-sm-2 col-md-2 col-xs-2"><a href="/'+type+'/'+id+'"><figure class="figure"><img src="'+image+'" alt="..." class="figure-img img-fluid rounded" style="height: 200px;"> <figcaption class="figure-caption">'+title+'</figcaption></figure></a></div>');

    }   

}



function saveBookUser (title,api_id,bookmark,line,rating,status,fav){

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method: 'POST',
        url: '/saveBookUser',
        dataType: 'json',
        data: {
            '_token': $('input[name=_token]').val(),
            'title':title,          
            'api_id':api_id,          
            'bookmark': bookmark,
            'line': line,
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