
function savelike (id_review){

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method: 'POST',
        url: '/likeUser',
        dataType: 'json',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_review':id_review,
        },  

        error: function (error) {
            //console.log("saveBook");
           // console.log(error);
        }
    }); 
}