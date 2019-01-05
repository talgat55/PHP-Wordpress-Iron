// ---------------------------------------------------------
// !!!!!!!!!!!!!!!!!document ready!!!!!!!!!!!!!!!!!!!!!!!!!!
// ---------------------------------------------------------

jQuery(document).ready(function() {
    "use strict";

    /*
    * Match height
    */
    jQuery('.products li.product-item').matchHeight();


    /*
    * Select  for brend
     */
    jQuery('.brend, .razmer, .select2').select2({
        minimumResultsForSearch: -1
    });


    function insertParam(key, value) {
        key = escape(key);
        value = escape(value);

        var kvp = document.location.search.substr(1).split('&');
        if (kvp == '') {
            document.location.search = '?' + key + '=' + value;
        }
        else {

            var i = kvp.length;
            var x;
            while (i--) {
                x = kvp[i].split('=');

                if (x[0] == key) {
                    x[1] = value;
                    kvp[i] = x.join('=');
                    break;
                }
            }

            if (i < 0) {
                kvp[kvp.length] = [key, value].join('=');
            }

            //this will reload the page, it likely better to store this until finished
            document.location.search = kvp.join('&');
        }
    }

    /*
    * Lightbox
     */
    jQuery('.review-carousel').lightGallery({
        download: false,
        selector: '.review-carousel a',
        thumbnail: true,
        exthumbimage: false
    });
    /*
    * Lightbox
     */
    jQuery('.row-review').lightGallery({
        download: false,
        selector: '.row-review a',
        thumbnail: true,
        exthumbimage: false
    });

    /*
    * Slider HOme
     */
    jQuery('.slider-home-walp').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        autoplay: true,
        prevArrow: jQuery('.arrow-slder .nav-link.right'),
        nextArrow: jQuery('.arrow-slder .nav-link.left')

    });

    /*
    * Carousel brend home
    */
    jQuery('.brends-carousel').slick({
        infinite: true,
        slidesToShow: 6,
        arrows: true,
        dots: true,
        autoplay: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
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


    /*
    * Carousel review home
    */
    jQuery('.review-carousel').slick({
        infinite: true,
        slidesToShow: 4,
        arrows: true,
        dots: true,
        autoplay: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
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

    /*
    * Carousel partner home
    */
    jQuery('.parthers-carousel').slick({
        infinite: true,
        slidesToShow: 6,
        arrows: true,
        slidesToScroll: 1,
        dots: true,
        autoplay: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
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


    /*
    * Fix left dots sliders
     */
    var heightwindow = jQuery('body').width();
    var redywidht = (heightwindow - 1140) / 2;
    jQuery('.slider-home .slick-dots').css('left', redywidht);


    /*
    * Vk widget
     */

    if (jQuery('#vk_groups').length) {
        var heightcontainer = jQuery('.container').width();
        VK.Widgets.Group("vk_groups", {mode: 3, width: heightcontainer, color3: '080808'}, 36054829);
    }

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

//Add or modify querystring
    function changeUrl(key, value) {
        //Get query string value
        var searchUrl = location.search;
        if (searchUrl.indexOf("?") == "-1") {
            var urlValue = '?' + key + '=' + value;
            history.pushState({state: 1, rand: Math.random()}, '', urlValue);
        }
        else {
            //Check for key in query string, if not present
            if (searchUrl.indexOf(key) == "-1") {
                var urlValue = searchUrl + '&' + key + '=' + value;
            }
            else {	//If key present in query string
                oldValue = getParameterByName(key);
                if (searchUrl.indexOf("?" + key + "=") != "-1") {
                    urlValue = searchUrl.replace('?' + key + '=' + oldValue, '?' + key + '=' + value);
                }
                else {
                    urlValue = searchUrl.replace('&' + key + '=' + oldValue, '&' + key + '=' + value);
                }
            }
            history.pushState({state: 1, rand: Math.random()}, '', urlValue);
            //history.pushState function is used to add history state.
            //It takes three parameters: a state object, a title (which is currently ignored), and (optionally) a URL.
        }
        objQueryString.key = value;
        sendAjaxReq(objQueryString);
    }

//Used to display data in webpage from ajax
    function sendAjaxReq(objQueryString) {
        $.post('test.php', objQueryString, function (data) {
            //alert(data);
        })
    }


//Function used to remove querystring
    function removeQString(key) {
        var urlValue = document.location.href;

        //Get query string value
        var searchUrl = location.search;

        if (key != "") {
            var oldValue = getParameterByName(key);
            var removeVal = key + "=" + oldValue;
            if (searchUrl.indexOf('?' + removeVal + '&') != "-1") {
                urlValue = urlValue.replace('?' + removeVal + '&', '?');
            }
            else if (searchUrl.indexOf('&' + removeVal + '&') != "-1") {
                urlValue = urlValue.replace('&' + removeVal + '&', '&');
            }
            else if (searchUrl.indexOf('?' + removeVal) != "-1") {
                urlValue = urlValue.replace('?' + removeVal, '');
            }
            else if (searchUrl.indexOf('&' + removeVal) != "-1") {
                urlValue = urlValue.replace('&' + removeVal, '');
            }
        }
        else {
            var searchUrl = location.search;
            urlValue = urlValue.replace(searchUrl, '');
        }
        history.pushState({state: 1, rand: Math.random()}, '', urlValue);
        location.reload();
    }


    /*
     *  Functions for urls
    */


    jQuery('.block-filter.first').click(function () {
        var values;
        var value = jQuery(this).data('type');
        if (value == 'price') {
            if (jQuery(this).hasClass('active')) {
                removeQString('SET_PRICE_SORT');
            } else {
                values = 'DESC';
                insertParam('SET_PRICE_SORT', values);
            }

        } else if (value == 'new') {
            if (jQuery(this).hasClass('active')) {
                removeQString('SET_BY_DATE');
            } else {
                values = 'DESC';
                insertParam('SET_BY_DATE', values);
            }

        } else if (value == 'name') {
            if (jQuery(this).hasClass('active')) {
                removeQString('SET_BY_NAME');
            } else {
                values = 'DESC';
                insertParam('SET_BY_NAME', values);
            }
        } else {
            console.log('error get type sort');
        }


        //jQuery('.block-filter.first').removeClass('active');
        jQuery(this).addClass('active');

    });
    //-------------------------------
    //  Actions for right block filters
    //-------------------------------


    jQuery('.second-row .block-filter').click(function () {

        jQuery('.main-block-filters').addClass('open');
        jQuery('.second-row .block-filter').addClass('open');
    });
    // close modal window
    jQuery('.main-block-filters i').click(function () {

        jQuery('.main-block-filters').removeClass('open');
        jQuery('.second-row .block-filter').removeClass('open');
    });

    jQuery('.apply-fliter').click(function () {

        var selectbrend = jQuery(".brend").val();
        var selectrazmer = jQuery(".razmer").val();

        var newUrl = "" + jQuery.query.set("SET_BY_BREND", selectbrend).set("SET_BY_RAZMER", selectrazmer).toString();
        document.location.search = newUrl;
        console.log(newUrl);
        return false;

    });
    jQuery('.clean-fliter').click(function () {


        var newUrl = "" + jQuery.query.REMOVE("SET_BY_BREND").REMOVE("SET_BY_RAZMER");
        document.location.search = newUrl;
        console.log(newUrl);
        return false;

    });
/*
*   Change tab in form page
*/
    jQuery('body').on('click', '.filter-form-row a', function () {
        jQuery(this).parent().parent().removeClass('form-tab kostum-tab').addClass(jQuery(this).attr("class"));
        jQuery(this).parent().parent().find('a').removeClass('active');
        jQuery(this).addClass('active');
        if(jQuery(this).hasClass('form-tab')){

            jQuery('.form-part.kostum').removeClass('active-tab-form-page');
            jQuery('.form-part.form').addClass('active-tab-form-page');

        }else{
            jQuery('.form-part.form').removeClass('active-tab-form-page');
            jQuery('.form-part.kostum').addClass('active-tab-form-page');


        }
        Initslider();


        return false;
    });
    /*
    *   Slider builder form
    */

    jQuery('body').on('click', '.link-form-item', function () {


        jQuery(this).parent().parent().find('.link-form-item').removeClass('active');
        jQuery(this).addClass('active');
        var $thistype = jQuery(this).data('slug');
        var $thistypeslider = jQuery(this).data('type');
        var $idCat = jQuery(this).data('idcat');
        var data = {
            action: 'be_ajax_load_product',
            slug: $thistype,
            id: $idCat,
            type: $thistypeslider,
            query: 'product'
        };
        jQuery.post(beloadmore.url, data, function (res) {

            if (res.success) {
                if (res.data == '') {

                    if ($thistypeslider == 'top') {
                        jQuery('.active-tab-form-page .content-top-slider-center').html(' ').append('<p class="no-more-load-posts opacity-zero">Товаров по данной категории не найдено </p>');
                    }

                    jQuery('.active-tab-form-page .content-top-slider-center').delay(2000).fadeOut();

                } else {
                    var redy = jQuery.parseJSON(res.data);
                    if ($thistypeslider == 'top') {
                        jQuery('.active-tab-form-page .content-top-slider-center').html(' ').append(redy.first);
                        jQuery('.active-tab-form-page .content-top-slider-center-nav').html(' ').append(redy.second);


                    } else if ($thistypeslider == 'center') {
                        jQuery('.active-tab-form-page .content-center-slider-center').html(' ').append(redy.first);
                        jQuery('.active-tab-form-page .content-center-slider-center-nav').html(' ').append(redy.second);

                    } else if ($thistypeslider == 'bottom') {
                        jQuery('.active-tab-form-page .content-bottom-slider-center').html(' ').append(redy.first);
                        jQuery('.active-tab-form-page .content-bottom-slider-center-nav').html(' ').append(redy.second);

                    }
                    Initslider();

                    jQuery('.top-slider, .center-slider, .bottom-slider ').not('.slick-initialized').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        fade: false

                    });
                    afterchable();
                    // console.log( res.data);

                }
            } else {
                console.log(res);
            }
        }).fail(function (xhr, textStatus, e) {
            console.log(xhr.responseText);
        });
        /*
        if($thistypeslider == 'top'){

            jQuery('.content-top-slider-center , .content-top-slider-center-nav').removeClass('autoheight  display no-display').addClass('no-display');

            jQuery('.content-top-slider-center , .content-top-slider-center-nav').parent().find('.'+$thistype).addClass('autoheight no-display');

            jQuery('.top-slider').slick('slickGoTo', '0');

        }else if( $thistypeslider  == 'center'){

            jQuery('.content-center-slider-center , .content-center-slider-center-nav').removeClass('autoheight  display no-display').addClass('no-display');

            jQuery('.content-center-slider-center , .content-center-slider-center-nav').parent().find('.'+$thistype).addClass('autoheight no-display');
            jQuery('.center-slider').slick('slickGoTo', '0');

        }else{
            jQuery('.content-bottom-slider-center , .content-bottom-slider-center-nav').removeClass('autoheight  display no-display').addClass('no-display');

            jQuery('.content-bottom-slider-center , .content-bottom-slider-center-nav').parent().find('.'+$thistype).addClass('autoheight no-display');
            jQuery('.bottom-slider').slick('slickGoTo', '0');
        }

        if($thistypeslider == 'top'){
            var thumb = '.top-slider-nav li';

        }else if($thistypeslider == 'center'){
            var thumb = '.center-slider-nav li';

        }else if($thistypeslider == 'bottom'){
            var thumb = '.bottom-slider-nav li';

        }*/


        // jQuery(thumb).each(function(){
        //     if(jQuery(this).index() == '0') {
        //         jQuery(this).addClass('active');
        //     } else {
        //         jQuery(this).removeClass('active');
        //     }
        // });


        return false;

    });
function Initslider(){
    jQuery('.top-slider, .center-slider, .bottom-slider').on('init', function (event, slick) {

        var $this = jQuery(this).data('slider');
        console.log($this);
        if ($this == 'top-slider') {
            var thumb = '.top-slider-nav li';
            var valuetitle = jQuery('.top-slider .slick-active').data('title');
            jQuery('.top-slider .slick-active').parent().parent().parent().parent().eq(0).addClass('autoheight no-display');
            jQuery(thumb).parent().parent().find('.title-section-sub-section').html(' ').html(valuetitle);

        } else if ($this == 'center-slider') {
            var thumb = '.center-slider-nav li';
            var valuetitle = jQuery('.center-slider .slick-active').data('title');
            jQuery('.center-slider .slick-active').parent().parent().parent().parent().eq(0).addClass('autoheight no-display');
            jQuery(thumb).parent().parent().find('.title-section-sub-section').html(' ').html(valuetitle);

        } else if ($this == 'bottom-slider') {
            var thumb = '.bottom-slider-nav li';
            var valuetitle = jQuery('.bottom-slider .slick-active').data('title');
            jQuery('.bottom-slider .slick-active').parent().parent().parent().parent().eq(0).addClass('autoheight no-display');
            jQuery(thumb).parent().parent().find('.title-section-sub-section').html(' ').html(valuetitle);

        }


    });
}
    Initslider();
    jQuery('.top-slider, .center-slider, .bottom-slider ').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: false

    });
function afterchable(){
    jQuery('.top-slider, .center-slider, .bottom-slider ').on("afterChange", function (event, slick, currentSlide) {

        var $this = jQuery(this).data('slider');
        if ($this == 'top-slider') {
            var thumb = '.top-slider-nav li';
            var valuetitle = jQuery('.autoheight .top-slider .slick-active').data('title');
            jQuery(thumb).parent().parent().find('.title-section-sub-section').html(' ').html(valuetitle);

        } else if ($this == 'center-slider') {
            var thumb = '.center-slider-nav li';
            var valuetitle = jQuery('.autoheight .center-slider .slick-active').data('title');
            jQuery(thumb).parent().parent().find('.title-section-sub-section').html(' ').html(valuetitle);
            console.log(valuetitle);

        } else if ($this == 'bottom-slider') {
            var thumb = '.bottom-slider-nav li';
            var valuetitle = jQuery('.autoheight .bottom-slider .slick-active').data('title');
            jQuery(thumb).parent().parent().find('.title-section-sub-section').html(' ').html(valuetitle);

        }


        var cs = jQuery('.autoheight .' + $this).slick('slickCurrentSlide');


        jQuery(thumb).each(function () {
            if (jQuery(this).index() == cs) {
                jQuery(this).addClass('active');
            } else {
                jQuery(this).removeClass('active');
            }

            console.log(event);
        });

        console.log(currentSlide);
    });
}
    afterchable();
    jQuery('body').on('click', '.top-slider-nav li, .center-slider-nav li, .bottom-slider-nav li',function(){

        var $type = jQuery(this).parent().data('slider');

        jQuery(this).parent().find('li').removeClass('active');
        jQuery(this).addClass('active');

        var currentIndex = jQuery(this).index();
        if($type == 'top-slider' ){

            jQuery('.top-slider').slick('slickGoTo', currentIndex);

        }else if( $type == 'center-slider'){
            jQuery('.center-slider').slick('slickGoTo', currentIndex);
        }else if( $type == 'bottom-slider'){
            jQuery('.bottom-slider').slick('slickGoTo', currentIndex);
        }

    });

 /*   jQuery('.top-slider, .center-slider, .bottom-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){

     var $this =  jQuery(this).data('slider');

        if($this == 'top-slider'){
            var thumb = '.top-slider-nav li';

        }else if($this == 'center-slider'){
            var thumb = '.center-slider-nav li';

        }else if($this == 'bottom-slider'){
            var thumb = '.bottom-slider-nav li';

        }



        jQuery(thumb).each(function(){
            if(jQuery(this).index() == nextSlide) {
                jQuery(this).addClass('active');
            } else {
                jQuery(this).removeClass('active');
            }
           
            console.log(event);
        });

    });*/


    //---
    // Order form builder modal actions
    //---

    jQuery('body').on('click', '.link-order-forms',function(){
            jQuery('.overlay-layer-form-builder').fadeIn();
            jQuery('.modal-block-builder-form').fadeIn();
            var $topvalue = jQuery('.top-slider .slick-active').data('title');
            var $centervalue = jQuery('.center-slider .slick-active').data('title');
            var $bottomvalue = jQuery('.bottom-slider .slick-active').data('title');
            jQuery('.top-field').val(' ').val($topvalue);
            jQuery('.center-field').val(' ').val($centervalue);
            jQuery('.bottom-field').val(' ').val($bottomvalue);
            return false;
    });
    jQuery('body').on('click', '.modal-block-builder-form button', '.overlay-layer-form-builder',function(){
            jQuery('.overlay-layer-form-builder').fadeOut();
            jQuery('.modal-block-builder-form').fadeOut();
        return false;
    });


    /*
    * Input telephone mask
     */
    jQuery('.one-but-phone, #billing_phone').inputmask({"mask": "+7 (999) 999-9999"});


    if(jQuery(window).width() < 780){
        jQuery('.cat-list-sub').each(function(){
                jQuery(this).prev().prev().removeAttr('href');
        });

        jQuery('.cat-list li ul').hide();
        jQuery('.cat-list li').click( function () {
            jQuery(this).find('ul').show();
        })
    }












// end redy funvtion
});