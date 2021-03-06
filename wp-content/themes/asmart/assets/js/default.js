// ---------------------------------------------------------
// !!!!!!!!!!!!!!!!!document ready!!!!!!!!!!!!!!!!!!!!!!!!!!
// ---------------------------------------------------------
document.addEventListener('wpcf7mailsent', function(event) {

    setTimeout(function(){
        jQuery('.custom-modal, .overlya-modal-layer').removeClass('show-blocks-modal');


    },2000);


}, false);
jQuery(document).ready(function() {
    "use strict";

    /*
    * Match height
    */
    jQuery('.products li.product-item').matchHeight();

    /*
    * Input telephone mask
     */

    jQuery('.phone-iput').inputmask("(999) 999-9999");

    HomeSlider();
    CertCarousel();
    InitMaps();
    Lightbox();
    OneNva();
    ActionSlider();
    backToTop();
    Ajaxprice();
    Modal();
    MobileLInks();
    PartnersCarousel();
// end redy funvtion
});

/*
*   hide   in mobile for internal links
*/
function MobileLInks() {


    if ( window.location.pathname == '/'  && jQuery(window).width()  < 1000 ){





        jQuery('body').on('click', 'a[href*="/#"]', function () {

            jQuery('#responsive-menu-button').trigger('click');

        });



    }
}

/*
* show modal
*/
function Modal() {


    jQuery('body').on('click', '.btn-link.call-button', function () {

      jQuery('.custom-modal').addClass('show-blocks-modal');
      jQuery('.overlya-modal-layer').addClass('show-blocks-modal');

        return false;

    });

    jQuery('body').on('click', '.overlya-modal-layer, .close-modal ', function () {
        jQuery('.custom-modal').removeClass('show-blocks-modal');
        jQuery('.overlya-modal-layer').removeClass('show-blocks-modal');


        return false;

    });
}


/*
* Ajax
*/
function Ajaxprice() {


    jQuery('body').on('click', '.price-item-walp ', function () {

        jQuery('.price-item-walp').removeClass('active');
        jQuery(this).addClass('active');
        var $term = jQuery(this).attr('data-type');
        var data = {
            action: 'be_ajax_load_price',
            term: $term
        };


        jQuery.post(myajax.url, data, function (res) {

            if (res.success) {
                if (res.data != '') {

                    console.log(res.data);
                    jQuery('.table-price tbody').html(' ');
                    jQuery('.table-price tbody').append(res.data);

                    jQuery("html, body").animate({ scrollTop: jQuery('.table-price').offset().top }, 1000);
                } else {

                    console.log(res);

                }
            }
        }).fail(function (xhr, textStatus, e) {
            console.log(xhr.responseText);
        });
        return false;

    });
}




// ---------------------------------------------------------
//  Slider action
// ---------------------------------------------------------
function ActionSlider() {


    jQuery('.list-actions').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
      //  autoplay: true,
        prevArrow: jQuery('.action-arrow .nav-link.right'),
        nextArrow: jQuery('.action-arrow .nav-link.left')

    });
}


// ---------------------------------------------------------
// Back To Top
// ---------------------------------------------------------
function backToTop(){
    "use strict";
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 100) {
            jQuery('#back_to_top').addClass('backactive');
        } else {
            jQuery('#back_to_top').removeClass('backactive');
        }
    });
    jQuery(document).on('click','#back_to_top',function(e){
        e.preventDefault();

        jQuery('body,html').animate({scrollTop: 0}, jQuery(window).scrollTop()/3, 'linear');
    });

}

/*
* Lightbox
*/
function OneNva() {
    jQuery('header #menu-main').onePageNav({
        currentClass: 'current',
        changeHash: false,
        scrollSpeed: 750,
        scrollThreshold: 0.5,
        filter: '',
        easing: 'swing',
        begin: function() {
            //I get fired when the animation is starting
        },
        end: function() {
            //I get fired when the animation is ending
        },
        scrollChange: function($currentListItem) {
            //I get fired when you enter a section and I pass the list item of the section
        }
    });

}

/*
* Lightbox
*/
function Lightbox() {
    jQuery('.certs-list').lightGallery({
        download: false,
        selector: '.certs-list a',
        thumbnail: false,
        zoom: true,
        exthumbimage: false
    });

}



/*
* Slider HOme
*/
function HomeSlider() {


    jQuery('.home-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        autoplay: true,
        prevArrow: jQuery('.arrow-slder .nav-link.right'),
        nextArrow: jQuery('.arrow-slder .nav-link.left')

    });
    jQuery('.home-slider .slick-dots').wrap('<div class="container" />');
}
/*
*  Certificate carousel
*/
function CertCarousel() {


    jQuery('.certs-list').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: true,
        autoplay: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]

    });
}

/*
*  Partners carousel
*/
function PartnersCarousel() {


    jQuery('.parnters-list').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: false,
        autoplay: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]

    });
}





/*
*  Maps
*/
function InitMaps() {
    if (jQuery('#map').length) {

        ymaps.ready(function () {
            var myMap = new ymaps.Map('map', {
                    center: [55.050375, 73.255150],
                    zoom: 15,
                    controls: ['zoomControl']
                }, {
                    // searchControlProvider: 'yandex#search'
                }),

                // Создаём макет содержимого.
                /*  MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                      '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
                  ),*/

                myPlacemark = new ymaps.Placemark([55.050375, 73.255150], {
                    id: '1'
                }, {

                    // Опции.
                    // Необходимо указать данный тип макета.
                    iconLayout: 'default#image',
                    // Своё изображение иконки метки.
                    //
                    iconImageHref: 'http://metallplus55.ru/wp-content/themes/asmart/assets/images/marker.png',
                    // // Размеры метки.
                    iconImageSize: [45, 63],
                    // // Смещение левого верхнего угла иконки относительно
                    // // её "ножки" (точки привязки).
                    iconImageOffset: [-22, -63]
                });


            myMap.geoObjects

                .add(myPlacemark);

            myMap.behaviors.disable('scrollZoom');
            myMap.behaviors.disable('multiTouch');


            myMap.behaviors.disable('drag');


        });
    }
}
//
//  Metrics goals
//
document.addEventListener('wpcf7mailsent', function(event) {
    if (event.detail.contactFormId == "158") {
        yaCounter52499815.reachGoal('callback');
        ga('send', 'event', 'form', 'callback');
    } else if (event.detail.contactFormId == "68") {
        yaCounter52499815.reachGoal('order');
        ga('send', 'event', 'form', 'order');
    }

}, false);