$( document ).ready(function() { 

  $(".thumbLike").one( "click", function() {
     color= $(this).children("div").children("label").css("color");
     if (color=="rgb(128, 128, 128)") {
      $(this).children("div").children("label").css("color","green");
      varnew = parseInt($(this).children("div").children("label").text())+1;
      $(this).children("div").children("label").text(varnew);
      savelike($(this).attr("idreview"));
     } 
  });

});