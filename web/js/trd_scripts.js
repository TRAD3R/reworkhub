/**
 * Search phrase
 */
$('#search').on('keypress', function (e) {
    if(e.which === 13){
        trd_search();
    }
});

function trd_search()
{
    var searchPhrase = $('#search').val();
    location.href = "/search?phrase=" + encodeURI(searchPhrase);
}
/** Search phrase*/