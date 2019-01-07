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
