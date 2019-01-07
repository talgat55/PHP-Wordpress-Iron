<?php


get_header(); ?>

    <div id="primary" class="content-area">
        <h1 class="hide-title">Главная страница</h1>
        <?php
        $bg_slider = get_field('back_slider', 'option');

        $bg_slider_redy = wp_get_attachment_url($bg_slider, 'full');

        ?>
        <section class="slider-home" style="background: url(<?php echo $bg_slider_redy; ?>)">


            <div class="slider-home-walp">
                <?php

                $argsslideer = array(
                    'posts_per_page' => -1,
                    'post_type' => 'slider'
                );

                $the_query_slider = new WP_Query($argsslideer);

                while ($the_query_slider->have_posts()) :
                    $the_query_slider->the_post();
                    $post_id_slider = $the_query_slider->post->ID;
                    $firstTitle = get_field('first_title');
                    $secondTitle = get_field('second_title');
                    $text = get_field('text_slider');
                    $link = get_field('link_slider');


                    //$image   = aq_resize( $img_url, 1200, 800, true ); // Resize & crop img
                    echo '
                <div class="slider-item-walpaper" >
                        <div class="content-home-slider">
                            <div class="container relative clearfix">
                                <div class="slider-block-content-walpaper ">
                                    <div class="first-title-slider">' . $firstTitle . '</div>
                                    <div class="second-title-slider">' . $secondTitle . '</div>
                                    <div class="text-slider">' . $text . '</div>
                                    <a class="link-slider" href="' . $link . '">К магазину</a>
                                </div>
                            </div>
					    </div>
				 </div>';


                endwhile;
                ?>

            </div>
            <div class="arrow-slder">
                <div class="container relative clearfix">
                    <a href="#" class="nav-link left">
                        <img src="<?php echo get_theme_file_uri('/assets/images/angle-left.png'); ?>">
                    </a>
                    <a href="#" class="nav-link right">
                        <img src="<?php echo get_theme_file_uri('/assets/images/angle-right.png'); ?>">
                    </a>
                </div>
            </div>
        </section>
     <?php /*   <section class="brends-row">
            <h2 class="title-section">бренды</h2>
            <div class="container">
                <div class="brends-carousel">
                    <div class="brend-item">
                        <img src="<?php echo get_theme_file_uri('/assets/images/brend1.png'); ?>"/>
                    </div>
                    <div class="brend-item">
                        <img src="<?php echo get_theme_file_uri('/assets/images/brend2.png'); ?>"/>
                    </div>
                    <div class="brend-item">
                        <img src="<?php echo get_theme_file_uri('/assets/images/brend3.png'); ?>"/>
                    </div>
                    <div class="brend-item">
                        <img src="<?php echo get_theme_file_uri('/assets/images/brend4.png'); ?>"/>
                    </div>
                    <div class="brend-item">
                        <img src="<?php echo get_theme_file_uri('/assets/images/brend5.png'); ?>"/>
                    </div>
                    <div class="brend-item">
                        <img src="<?php echo get_theme_file_uri('/assets/images/brend6.png'); ?>"/>
                    </div>
                    <div class="brend-item">
                        <img src="<?php echo get_theme_file_uri('/assets/images/brend6.png'); ?>"/>
                    </div>


                </div>
            </div>


        </section> */ ?>
        <section class="service-row"
                 style="background: url(<?php echo get_theme_file_uri('/assets/images/bg-service.jpg'); ?>);">
            <h2 class="padding-top-60 title-section white" style="margin-top: 0;">наши услуги</h2>
            <div class="container">
                <div class="service-row-walp clearfix">
                    <?php

                    $argsservice = array(
                        'posts_per_page' => 4,
                        'post_type' => 'service'
                    );

                    $the_query_service = new WP_Query($argsservice);

                    if($the_query_service->post_count == '4'){
                        $colmn = '3';
                    }elseif($the_query_service->post_count == '3'){
                        $colmn = '4';
                    }

                    $i=0;

                    while ($the_query_service->have_posts()) :
                        $the_query_service->the_post();
                        $post_id_service = $the_query_service->post->ID;

                        $img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id_service), 'full');
                        $image = aq_resize($img_url, 190, 160, true);
                        echo '
                            <div class="col-md-'.$colmn.'">
                        ';
                        if($i == '1'  || $i == '3'){

                                $links = get_the_permalink($post_id_service);
                        }else{
                                    $links = 'http://xn--80ablmatscnacsedop0q.xn--p1ai/razdel-v-razrabotke/';

                        }

                        echo '
                                <a href="'.$links.'" class="service-block">
                                    <div><h3>'.get_the_title($post_id_service).'</h3></div>
                                    <img src="'.$image.'"/>
        
                                </a>

                            </div>
                                
                                ';

                                $i++;

                    endwhile;
                    ?>



                </div>
            </div>

        </section>
        <section class="review-row">
            <h2 class=" title-section">отзывы</h2>
            <div class="container">
                <div class="review-carousel">
                    <?php

                    $argsreview = array(
                        'posts_per_page' => -1,
                        'post_type' => 'review'
                    );

                    $the_query_review = new WP_Query($argsreview);

                    while ($the_query_review->have_posts()) :
                        $the_query_review->the_post();
                        $post_id_review = $the_query_review->post->ID;

                        $img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id_review), 'full');
                        $image = aq_resize($img_url, 253, 358, true);
                        echo '

                        <div>
                            <a href="' . $img_url . '" class="review-item">
                                <div class="overlay-review"><i class="fas fa-search-plus"></i></div>
                                <img src="' . $image . '"/>
                            </a>
                        </div>
                        
                        ';

                    endwhile;
                    ?>
                </div>


            </div>
        </section>
       <?php /* <section class="partners-row"
                 style="background: url(<?php echo get_theme_file_uri('/assets/images/bg-part-compressor.jpg'); ?>);">
            <h2 class=" padding-top-60  title-section">наши партнеры</h2>
            <div class="container">
                <div class="parthers-carousel">
                    <?php

                    $argspartners = array(
                        'posts_per_page' => -1,
                        'post_type' => 'partners'
                    );

                    $the_query_partners = new WP_Query($argspartners);

                    while ($the_query_partners->have_posts()) :

                        $the_query_partners->the_post();
                        $post_id_partners = $the_query_partners->post->ID;

                        $img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id_partners), 'full');
                        $image = aq_resize($img_url, 253, 358, true);
                        echo ' 
                            <div class="partner-item">
                                <img src="' . $image . '"/>
                            </div> 
                        ';

                    endwhile;
                    ?>

                </div>
            </div>
        </section> */ ?>
        <section class="social-row">
            <h2 class="  title-section">мы вконтакте</h2>
            <div class="container">
                <div id="vk_groups"></div>
            </div>
        </section>


    </div><!-- #primary -->

<?php get_footer();
