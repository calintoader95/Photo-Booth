$(document).ready(function () {

    $('a').on('click', function(e){
        e.preventDefault();
        var page = $(this).attr('href');

        PageCall(page);
    });
})

function PageCall(pageInput){
    $.ajax({
        url: pageInput,
        type: "GET",
        dataType: "text",

        success: function(response) {
            console.log('the page was loaded', response);
            $('.content').html(response);
        },

        error: function(error){
            console.log('the page was NOT loaded', error);
        },

        complete: function (xhr, status) {
            console.log('the request is completed!');
        }
    });

}