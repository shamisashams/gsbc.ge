// BUTTON HOVER
$(function () {
    $('.legal-links')
        .on('mouseenter', function (e) {
            var parentOffset = $(this).offset(),
                relX = e.pageX - parentOffset.left,
                relY = e.pageY - parentOffset.top;
            $(this).find('span').css({top: relY, left: relX})
        })
        .on('mouseout', function (e) {
            var parentOffset = $(this).offset(),
                relX = e.pageX - parentOffset.left,
                relY = e.pageY - parentOffset.top;
            $(this).find('span').css({top: relY, left: relX})
        });
});


// POPUP

$(window).ready(function () {
    if(bannerSection.getBoundingClientRect().top < innerHeight){
        numbersUp();
        count++;
    }
    var init = function () {
        popup();
        readProductData();
    };

    var isDone = true;

    var popup = function () {
        var $items = $('.mini-carousel ul');
        var $linkClick = $('.mini-carousel ul li a');
        $('.video-player').hide();
        $('.btn-view').on('click', function (e) {
            setPanel(e);
            $(window).scrollTop(0);
            $('#quick-view-pop-up').fadeToggle();
            $('#quick-view-pop-up').css({"top": "200px", "left": "calc(50% - 437px)"});
            $('#quick-view-pop-up').css({"top":"200px", "left":"50%"});
            $('.mask').fadeToggle();
        });
        $('.mask').on('click', function () {
            $('.mask').fadeOut();
            $('#quick-view-pop-up').fadeOut();
        });
        $('.quick-view-close').on('click', function () {
            $('.mask').fadeOut();
            $('#quick-view-pop-up').fadeOut();
        });

        $('.prev').on('click', function () {
            //animate on UL element of small image on the left
            if (!isDone) return;
            if ($items.position().top === 0) {
                $items.css({'top': '-125px'});
                $items.children('li').last().prependTo($items);
            }
            isDone = false;
            $('.mini-carousel ul').animate({
                top: "+=125px"
            }, 200, function () {
                isDone = true;
            });
            $('.image-large ul li').last().prependTo($('.image-large ul'));
        });

        $('.next').on('click', function () {
            //animate on UL element of class 'mini-carousel'
            if (!isDone) return;

            if ($items.position().top === 0) {
                $items.css({'top': '125px'});
                $items.children('li').first().appendTo($items);
            }
            isDone = false;
            $('.mini-carousel ul').animate({
                top: "-=125px"
            }, 300, function () {
                isDone = true;
            });
            $('.image-large ul li').first().appendTo($('.image-large ul'));
        });
        $('.quick-view-video').on('click', function () {
            $('.video-player').toggle();
            $('.image-large ul').toggle();
        });
    };
    var readProductData = function () {
        $.getJSON("winners.json", function (result) {
            $.each(result, function (val) {
                console.log(val.key);
            });
        });
    };
    init();
    function setPanel(e) {
        let button = e.target;
        let title = button.previousElementSibling.textContent;
        let text = e.target.parentElement.nextElementSibling.innerHTML;
        let quickPanel = document.querySelector('.quick-view-panel');
        let content = quickPanel.querySelector('.content');
        let contentChild = content.children;

        let contextDiv = e.target.parentElement.parentElement.parentElement;
        let src = contextDiv.previousElementSibling.firstElementChild.src;
        let img = contentChild[0];
        img.src = src;
        let textContent = contentChild[1];
        textContent.children[0].textContent = title;

        textContent.children[1].innerHTML = text;
    }

});

// popup img width

// var imgWidth = $("img").width();

// $("#quick-view-pop-up").css("width", imgWidth+"px")



// navbar on mobile

const menuIcon = document.querySelector('.menu-icon');
const mainNavigation = document.querySelector('.navbar-mobile');

menuIcon.addEventListener('click', () => {
    menuIcon.classList.toggle('close-i');
    mainNavigation.classList.toggle('show-nav');
})


let count=0;
let bannerSection=document.querySelector('#banner-pros');

window.onscroll=function() {
    if (bannerSection.getBoundingClientRect().top < innerHeight &&count===0) {
        count++;
        numbersUp();
    }
}

function numbersUp(){
    $('.counting').each(function () {
        var $this = $(this),
            countTo = processText($this.attr('data-count'))

        $({countNum: $this.text()}).animate({
                countNum: countTo[0],
            },

            {
                duration: 2000,
                easing: 'linear',
                step: function () {
                    $this.text(Math.floor(this.countNum) + countTo[1]);
                },
                complete: function () {
                    $this.text(this.countNum + countTo[1]);
                }

            })
    });
}
function processText(inputText) {
    var output = [];
    var json = inputText.split(' ');
    json.forEach(function (item) {
        output = (item.replace(/'/g, '').split(/(\d+)/).filter(Boolean));
    });
    return output;
}


