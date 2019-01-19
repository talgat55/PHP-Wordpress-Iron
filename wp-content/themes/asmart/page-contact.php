<?php
/*
 * Template Name: Page Contacts
 */

get_header(); ?>

    <div class="wrap">
        <div id="primary" class="content-area  page-contacts">
            <div class="bredscrumb">
                <div class="container">
                    <div class="row">
                        <h1 class="page-title">
                            <?php  the_title(); ?>
                        </h1>
                    </div>
                </div>

            </div>
            <div class="main-row-contact">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="contact-page-first-block">
                                    <div class="map-content">
                                    <div class="map-content-secondblock">
                                        <h3>
                                            Контакты
                                        </h3>
                                        <div class="contacts-block">
                                            <ul class="lists-contacts-information">
                                                <li>
                                                    <span>адрес:</span>
                                                    <p><?= get_field('adress', 'option'); ?></p>
                                                </li>
                                                <li>
                                                    <span>Телефон:</span>
                                                    <p>
                                                        <a href="tel:<?= str_replace(['(',')', '-', '(моб.)' , 'моб.' , ' ' ], ['','','', '', '', ''], get_field('phone_one', 'option')); ?>"><?= get_field('phone_one', 'option'); ?></a>
                                                        <a href="tel:<?= str_replace(['(',')', '-', '(моб.)' , 'моб.' , ' '], ['','','', '', '', ''], get_field('phone_two', 'option')); ?>"><?= get_field('phone_two', 'option'); ?></a>
                                                        <a href="tel:<?= str_replace(['(',')', '-', '(моб.)' , 'моб.' , ' '], ['','','', '', '', ''], get_field('phone_tree', 'option')); ?>"><?= get_field('phone_tree', 'option'); ?></a>
                                                    </p>
                                                </li>
                                                <li>
                                                    <span>EMAIL:</span>
                                                    <p>
                                                        <a href="mailto:'.get_field('email', 'option').'"><?= get_field('email', 'option'); ?></a>
                                                    </p>
                                                </li>
                                            </ul>

                                        </div>

                                    </div>
                                    <div class="map-content-firstblock">
                                        <h3>
                                            Оставьте свои контактные данные
                                        </h3>
                                        <?= do_shortcode('[contact-form-7 id="68" title="Contact form 1"]'); ?>

                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="row">
                                <div id="map"></div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer();
