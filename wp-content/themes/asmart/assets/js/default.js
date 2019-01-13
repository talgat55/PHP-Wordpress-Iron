// ---------------------------------------------------------
// !!!!!!!!!!!!!!!!!document ready!!!!!!!!!!!!!!!!!!!!!!!!!!
// ---------------------------------------------------------

jQuery(document).ready(function() {
    "use strict";

    /*
    * Match height
    */
    jQuery('.products li.product-item').matchHeight();


//
//
//     /*
//     * Carousel brend home
//     */
//     jQuery('.brends-carousel').slick({
//         infinite: true,
//         slidesToShow: 6,
//         arrows: true,
//         dots: true,
//         autoplay: true,
//         responsive: [
//             {
//                 breakpoint: 1024,
//                 settings: {
//                     slidesToShow: 3,
//                     slidesToScroll: 3,
//                 }
//             },
//             {
//                 breakpoint: 600,
//                 settings: {
//                     slidesToShow: 2,
//                     slidesToScroll: 2
//                 }
//             },
//             {
//                 breakpoint: 480,
//                 settings: {
//                     slidesToShow: 1,
//                     slidesToScroll: 1
//                 }
//             }
//             // You can unslick at a given breakpoint now by adding:
//             // settings: "unslick"
//             // instead of a settings object
//         ]
//
//     });
//
//
//     /*
//     * Carousel review home
//     */
//     jQuery('.review-carousel').slick({
//         infinite: true,
//         slidesToShow: 4,
//         arrows: true,
//         dots: true,
//         autoplay: true,
//         responsive: [
//             {
//                 breakpoint: 1024,
//                 settings: {
//                     slidesToShow: 3,
//                     slidesToScroll: 3,
//                 }
//             },
//             {
//                 breakpoint: 600,
//                 settings: {
//                     slidesToShow: 2,
//                     slidesToScroll: 2
//                 }
//             },
//             {
//                 breakpoint: 480,
//                 settings: {
//                     slidesToShow: 1,
//                     slidesToScroll: 1
//                 }
//             }
//             // You can unslick at a given breakpoint now by adding:
//             // settings: "unslick"
//             // instead of a settings object
//         ]
//
//     });
//
//     /*
//     * Carousel partner home
//     */
//     jQuery('.parthers-carousel').slick({
//         infinite: true,
//         slidesToShow: 6,
//         arrows: true,
//         slidesToScroll: 1,
//         dots: true,
//         autoplay: true,
//         responsive: [
//             {
//                 breakpoint: 1024,
//                 settings: {
//                     slidesToShow: 3,
//                     slidesToScroll: 3,
//                 }
//             },
//             {
//                 breakpoint: 600,
//                 settings: {
//                     slidesToShow: 2,
//                     slidesToScroll: 2
//                 }
//             },
//             {
//                 breakpoint: 480,
//                 settings: {
//                     slidesToShow: 1,
//                     slidesToScroll: 1
//                 }
//             }
//             // You can unslick at a given breakpoint now by adding:
//             // settings: "unslick"
//             // instead of a settings object
//         ]
//
//     });
//
//
//     /*
//      *  Functions for urls
//     */
//
//
//     jQuery('.block-filter.first').click(function () {
//         var values;
//         var value = jQuery(this).data('type');
//         if (value == 'price') {
//             if (jQuery(this).hasClass('active')) {
//                 removeQString('SET_PRICE_SORT');
//             } else {
//                 values = 'DESC';
//                 insertParam('SET_PRICE_SORT', values);
//             }
//
//         } else if (value == 'new') {
//             if (jQuery(this).hasClass('active')) {
//                 removeQString('SET_BY_DATE');
//             } else {
//                 values = 'DESC';
//                 insertParam('SET_BY_DATE', values);
//             }
//
//         } else if (value == 'name') {
//             if (jQuery(this).hasClass('active')) {
//                 removeQString('SET_BY_NAME');
//             } else {
//                 values = 'DESC';
//                 insertParam('SET_BY_NAME', values);
//             }
//         } else {
//             console.log('error get type sort');
//         }
//
//
//         //jQuery('.block-filter.first').removeClass('active');
//         jQuery(this).addClass('active');
//
//     });
//
//
// function Initslider(){
//     jQuery('.top-slider, .center-slider, .bottom-slider').on('init', function (event, slick) {
//
//         var $this = jQuery(this).data('slider');
//         console.log($this);
//         if ($this == 'top-slider') {
//             var thumb = '.top-slider-nav li';
//             var valuetitle = jQuery('.top-slider .slick-active').data('title');
//             jQuery('.top-slider .slick-active').parent().parent().parent().parent().eq(0).addClass('autoheight no-display');
//             jQuery(thumb).parent().parent().find('.title-section-sub-section').html(' ').html(valuetitle);
//
//         } else if ($this == 'center-slider') {
//             var thumb = '.center-slider-nav li';
//             var valuetitle = jQuery('.center-slider .slick-active').data('title');
//             jQuery('.center-slider .slick-active').parent().parent().parent().parent().eq(0).addClass('autoheight no-display');
//             jQuery(thumb).parent().parent().find('.title-section-sub-section').html(' ').html(valuetitle);
//
//         } else if ($this == 'bottom-slider') {
//             var thumb = '.bottom-slider-nav li';
//             var valuetitle = jQuery('.bottom-slider .slick-active').data('title');
//             jQuery('.bottom-slider .slick-active').parent().parent().parent().parent().eq(0).addClass('autoheight no-display');
//             jQuery(thumb).parent().parent().find('.title-section-sub-section').html(' ').html(valuetitle);
//
//         }
//
//
//     });
// }
//     Initslider();
//     jQuery('.top-slider, .center-slider, .bottom-slider ').slick({
//         slidesToShow: 1,
//         slidesToScroll: 1,
//         fade: false
//
//     });
// function afterchable(){
//     jQuery('.top-slider, .center-slider, .bottom-slider ').on("afterChange", function (event, slick, currentSlide) {
//
//         var $this = jQuery(this).data('slider');
//         if ($this == 'top-slider') {
//             var thumb = '.top-slider-nav li';
//             var valuetitle = jQuery('.autoheight .top-slider .slick-active').data('title');
//             jQuery(thumb).parent().parent().find('.title-section-sub-section').html(' ').html(valuetitle);
//
//         } else if ($this == 'center-slider') {
//             var thumb = '.center-slider-nav li';
//             var valuetitle = jQuery('.autoheight .center-slider .slick-active').data('title');
//             jQuery(thumb).parent().parent().find('.title-section-sub-section').html(' ').html(valuetitle);
//             console.log(valuetitle);
//
//         } else if ($this == 'bottom-slider') {
//             var thumb = '.bottom-slider-nav li';
//             var valuetitle = jQuery('.autoheight .bottom-slider .slick-active').data('title');
//             jQuery(thumb).parent().parent().find('.title-section-sub-section').html(' ').html(valuetitle);
//
//         }
//
//
//         var cs = jQuery('.autoheight .' + $this).slick('slickCurrentSlide');
//
//
//         jQuery(thumb).each(function () {
//             if (jQuery(this).index() == cs) {
//                 jQuery(this).addClass('active');
//             } else {
//                 jQuery(this).removeClass('active');
//             }
//
//             console.log(event);
//         });
//
//         console.log(currentSlide);
//     });
// }
//     afterchable();
//     jQuery('body').on('click', '.top-slider-nav li, .center-slider-nav li, .bottom-slider-nav li',function(){
//
//         var $type = jQuery(this).parent().data('slider');
//
//         jQuery(this).parent().find('li').removeClass('active');
//         jQuery(this).addClass('active');
//
//         var currentIndex = jQuery(this).index();
//         if($type == 'top-slider' ){
//
//             jQuery('.top-slider').slick('slickGoTo', currentIndex);
//
//         }else if( $type == 'center-slider'){
//             jQuery('.center-slider').slick('slickGoTo', currentIndex);
//         }else if( $type == 'bottom-slider'){
//             jQuery('.bottom-slider').slick('slickGoTo', currentIndex);
//         }
//
//     });
//
//
//
//     //---
//     // Order form builder modal actions
//     //---
//
//     jQuery('body').on('click', '.link-order-forms',function(){
//             jQuery('.overlay-layer-form-builder').fadeIn();
//             jQuery('.modal-block-builder-form').fadeIn();
//             var $topvalue = jQuery('.top-slider .slick-active').data('title');
//             var $centervalue = jQuery('.center-slider .slick-active').data('title');
//             var $bottomvalue = jQuery('.bottom-slider .slick-active').data('title');
//             jQuery('.top-field').val(' ').val($topvalue);
//             jQuery('.center-field').val(' ').val($centervalue);
//             jQuery('.bottom-field').val(' ').val($bottomvalue);
//             return false;
//     });
//     jQuery('body').on('click', '.modal-block-builder-form button', '.overlay-layer-form-builder',function(){
//             jQuery('.overlay-layer-form-builder').fadeOut();
//             jQuery('.modal-block-builder-form').fadeOut();
//         return false;
//     });


    /*
    * Input telephone mask
     */
    jQuery('.phone-iput').inputmask({"mask": "+7 (999) 999-9999"});








    HomeSlider();
    CertCarousel();
    InitMaps();
    Lightbox();
    OneNva();
// end redy funvtion
});


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
        arrows: false

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
                    iconImageHref: 'http://iron.lightxdesign.ru/wp-content/themes/asmart/assets/images/marker.png',
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