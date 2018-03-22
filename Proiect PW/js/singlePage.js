$(document).ready(function () {

    $('#home').on('click', function(e){
        e.preventDefault();


        PageCall("home.html",'.content');
        PageCall('home2.html','.content2');
    });

    var hash = [];

    var count = 0;

    $('a').click(function(){
        count ++;
        var link = {
            "order" : count,
            "link" : this.href
        };

        hash.push(link);
        console.log(hash);
    });

});

function PageCall(pageInput, div_selector){
    $.ajax({
        url: pageInput,
        type: "GET",
        dataType: "text",

        success: function(response) {
            console.log('the page was loaded', response);
            $(div_selector).html(response);
        },

        error: function(error){
            console.log('the page was NOT loaded', error);
        },

        complete: function (xhr, status) {
            console.log('the request is completed!');
        }
    });

}