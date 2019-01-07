<?php
/*
 * Template Name: Main template
 */

get_header(); ?>

    <div class="wrap">
        <div id="primary" class="content-area  ">
            <?php

            if(is_front_page()){
                echo '<h1 class="hide-title">Главная cтраница</h1>';
            }
            while (have_posts()) : the_post();

                the_content();

            endwhile; // End of the loop.
            ?>
        </div>
    </div>

<?php get_footer();
