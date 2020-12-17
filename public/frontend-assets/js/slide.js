$(document).ready(function(){

    var slick = $('.news-slide').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        centerMode: true,       
        autoplay: false, 
        speed: 1000,
        dots: false,
        nextArrow: '#nextar-news',
        prevArrow: '#prevar-news',
        focusOnSelect: false,

        responsive: [
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 850,
              settings: {
                slidesToShow: 2
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1
              }
            }
        ]
    });

    var slick = $('.board-slide').slick({
        slidesToShow: 3,
        slidesToScroll: 1,    
        autoplay: false, 
        speed: 1000,
        dots: false,
        nextArrow: '#nextar-board',
        prevArrow: '#prevar-board',
        focusOnSelect: false,
        responsive: [
            {
              breakpoint: 1000,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1
              }
            }
        ]
    });
});