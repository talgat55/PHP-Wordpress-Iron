<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title>
        <?php
        if (is_home()) {
            bloginfo('name');
        } else {
            wp_title('');
        }
        ?>
    </title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="shortcut icon" href="<?php echo get_theme_file_uri('/assets/images/favicon.ico') ?>"
          type="image/x-icon"/>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

    <header id="masthead" class="site-header">
        <div class="top-header">
            <div class="container">
                <div class="row-top-header">
                    <div class="top-header-left-block">
                        <a href="<?php echo home_url(); ?>" class="logo-header-white">
                            <img src="<?php echo get_theme_file_uri('/assets/images/footer-logo.png') ?>" alt="Logo">
                        </a>
                    </div>
                    <div class="top-header-center-block">
                        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <label  >
                                <span class="screen-reader-text"><?php echo _x( 'Поиск:', 'label', 'light' ); ?></span>
                            </label>
                            <input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Поиск ', 'placeholder', 'light' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                            <button type="submit" class="search-submit"> <i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="top-header-right-block">
                        <a class="basket-top" href="<?php echo wc_get_cart_url(); ?>"
                           title="<?php _e('Перейти в корзину'); ?>"><i class="fas fa-shopping-cart"></i> корзина
                            (<?php echo WC()->cart->get_cart_contents_count(); ?>) </a>
                    </div>
                </div>
                <div class="bottom-hedaer" >
                    <?php wp_nav_menu('menu_id=menu-main&menu_class=top-main-container clearfix&theme_location=top_menu'); ?>
                </div>
            </div>
        </div>
        <div class="center-header">
            <div class="container">
                <div class="center-header-row clearfix">
                    <div class="center-header-left-block">
                        <a href="<?php echo home_url(); ?>" class="logo">
                            <img src="<?php echo get_theme_file_uri('/assets/images/logo.png') ?>" alt="Logo">
                        </a>
                    </div>
                    <div class="center-header-right-block">
                        <div class="center-sub-block">
                            <div class="center-sub-block-walp fisrt">
                                <div class="icon-block-header">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="text-block-header">
                                    ТК "Казачья Слобода", 1 этаж
                                    ул. Пушкина 59.
                                </div>

                            </div>
                        </div>
                        <div class="center-sub-block">
                            <div class="center-sub-block-walp">
                                <div class="icon-block-header">
                                    <i class="far fa-clock"></i>
                                </div>
                                <div class="text-block-header">
                                    Ежедневно<br>
                                    10:00 — 18:00
                                </div>

                            </div>
                        </div>

                        <div class="center-sub-block">
                            <div class="center-sub-block-walp">
                                <div class="icon-block-header">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="text-block-header">
                                    <a href="tel:8 (923) 676-33-89">8 (923) 676-33-89</a>
                                </div>

                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>

    </header><!-- #masthead -->


    <div class="site-content-contain">
        <div id="content" class="site-content">
