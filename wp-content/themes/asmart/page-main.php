<?php
/*
 * Template Name: Main template
 */

get_header(); ?>

    <div class="wrap">
        <div id="primary" class="content-area  ">
            <?php
            while (have_posts()) : the_post();

                the_content();

            endwhile; // End of the loop.
            ?>
        </div>
    </div>

<?php get_footer();
