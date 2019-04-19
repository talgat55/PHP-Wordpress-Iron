<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title>
        <?php wp_title(''); ?><?php if (wp_title('', false)) {
            echo ' | ';
        } ?><?php bloginfo('name'); ?>

    </title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="shortcut icon" href="<?php echo get_theme_file_uri('/assets/images/favicon.png') ?>"  type="image/x-icon"/>

    <meta name="keywords" content="Металл, Металл в Омске,  резка металла, резка металла в Омске,  продажа металла,  резка металла в Омске, доставка металла, доставка металла в Омске">
    <meta name="yandex-verification" content="04266aae0c236502" />



    <?php wp_head(); ?>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var myajax = {"url":"<?=admin_url('admin-ajax.php'); ?>"};
        /* ]]> */
    </script>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "address": {
                "@type": "PostalAddress",
                "addressRegion": "г. Омск",
                "streetAddress": " ул. Нефтезаводская, 47"
            },
            "description": "Металл+ описание",
            "name": "Металл+",
            "telephone": " +7 (3812) 62-78-16"
        }
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-138231609-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-138231609-1');
    </script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

    <header id="masthead" class="site-header">
        <div class="top-header">
            <div class="container">
            <div class="row">
                <div class="row-top-header">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="row">
                            <a href="<?php echo home_url(); ?>"  class="logo"  title="<?php  _e('Перейти на главную страницу', 'light'); ?>" >
                                <img src="<?php echo get_theme_file_uri('/assets/images/logo.png') ?>" alt="<?php  _e('Логотип', 'light'); ?>">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="row text-center">
                                    <a href="tel:+73812627816"  class="link-phone">
                                        +7 (3812) <span>62-78-16</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="row text-center">
                                    <a href="tel:+79045872710"  class="link-phone">
                                        +7 (904) <span>587-27-10</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="row text-right">
                            <a href="#"  class="btn-link call-button">
                                <?php  _e('Заказать звонок', 'light'); ?>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
            </div>
        </div>
        <div class="bottom-header" >
            <div class="container">
                <div class="row">
                    <?php wp_nav_menu('menu_id=menu-main&menu_class=top-main-container clearfix&theme_location=top_menu'); ?>
                 </div>
            </div>
        </div>


    </header><!-- #masthead -->


    <div class="site-content-contain">
        <div id="content" class="site-content">
