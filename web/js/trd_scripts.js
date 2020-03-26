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
    });

    /* одинаковая высота для контента traffics на главной странице */
    setMaxHeight('.tariffs-subtitle', '.tariffs-item');
    setMaxHeight('.tariffs-description', '.tariffs-item');


    showReviewItems('.reviews-carousel');
    $('.default-carousel').owlCarousel({
        loop: false,
        margin:10,
        dots: false,
        nav:true,
        autoHeight: true,
        navText: ["<svg width='13' height='14' viewBox='0 0 13 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M7 13L1 7M1 7L7 0.999999M1 7L13 7' stroke='inherit' stroke-width='2' stroke-linejoin='round'/></svg>","<svg width='13' height='14' viewBox='0 0 13 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M6 1L12 7M12 7L6 13M12 7H0' stroke='inherit' stroke-width='2' stroke-linejoin='round'/></svg>"],
        smartSpeed: 500,
        responsive:{
            0:{
                items: 1
            },
        }
    });
});

function setMaxHeight(el, parent) {
    var maxHeight = 0;
    $(parent).each(function () {
        maxHeight = getMaxHeight($(this).find(el), maxHeight);
    });
    $(el).css('min-height', maxHeight + "px");
}

function getMaxHeight(el, maxHeight) {
    if (el.height() > maxHeight) {
        return el.height();
    } else {
        return maxHeight;
    }
}

function showReviewItems(parent) {
    var reviewNameFile = ['review1.png', 'review2.png', 'review3.png'];

    var reviewsHtml = '';
    reviewNameFile.forEach(value => {
        reviewsHtml += getReviewItemHtml(value);
    });

    $(parent).html(reviewsHtml);
}

function getReviewItemHtml(image) {
    return `
            <div class="reviews-carousel-item">
                <div class="reviews-photo">
                  <img src="/images/${image}">
                </div>
            </div>
    `;
}