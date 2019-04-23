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

/**
 * Accept cookie
 */
$(document).ready(function(){
    var cookie = $('#cookie-panel');
    if(localStorage.getItem('cookie-accept') == null || localStorage.getItem('cookie-accept').indexOf('accept') == -1){
        cookie.show();
    }

    $('#cookie-accept').on('click', function () {
        localStorage.setItem('cookie-accept', 'accept');
        cookie.hide();
    })
})