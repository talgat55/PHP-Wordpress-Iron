<?php
/*
* Require Image resize
*/

include_once('inc/aq_resizer.php');
/*
* Register nav menu
*/
if (function_exists('register_nav_menus')) {

    $menu_arr = array(
        'top_menu' => 'Топ Меню',
        'footer_one_menu' => 'Футер  Меню 1',
        'footer_two_menu' => 'Футер Меню 2'
    );


    register_nav_menus($menu_arr);


}


/*
* Add Feature Imagee
**/
add_theme_support('post-thumbnails');
add_image_size('product-item', 244, 300, true);
add_image_size('product-item-thumb', 50, 62, true);
add_image_size('product', 260, 200, false);
add_image_size('woocommerce_single', 260, 200, false);
add_image_size('category_products', 260, 155, false);

/**
 * Enqueue scripts and styles.
 */
function th_scripts()
{
    // Theme stylesheet.
    wp_enqueue_style('bootstrapcdn', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), '');
    wp_enqueue_style('th-style', get_stylesheet_uri());

    //wp_enqueue_style( 'normalize', get_theme_file_uri(  '/assets/css/normalize.css'),array(), '' );
    //wp_enqueue_style( 'light-style-main', get_theme_file_uri(  '/assets/css/index.css'),array(), '' );
    //wp_enqueue_style( 'font-awesome', get_theme_file_uri(  '/assets/css/font-awesome.min.css'),array(), '' );


    wp_enqueue_style('fontawesome-all', get_theme_file_uri('/assets/css/fontawesome-all.css'), array(), '');
    wp_enqueue_style('normalize', get_theme_file_uri('/assets/css/normalize.css'), array(), '');
    wp_enqueue_style('slick', get_theme_file_uri('/assets/css/slick.css'), array(), '');
    wp_enqueue_style('lg-transitions', get_theme_file_uri('/assets/css/lg-transitions.css'), array(), '');
    wp_enqueue_style('lightgallery', get_theme_file_uri('/assets/css/lightgallery.css'), array(), '');
    wp_enqueue_style('slick-theme', get_theme_file_uri('/assets/css/slick-theme.css'), array(), '');
    wp_enqueue_style('main-style', get_theme_file_uri('/assets/css/style.css'), array(), '');
    // wp_enqueue_style( 'owl.theme.default.min', get_theme_file_uri(  '/assets/css/owl.theme.default.min.css'),array(), '' );
    // wp_enqueue_style( 'slick-theme', get_theme_file_uri(  '/assets/css/slick-theme.css'),array(), '' );
    // wp_enqueue_style( 'slick', get_theme_file_uri(  '/assets/css/slick.css'),array(), '' );
//	wp_enqueue_style( 'datepicker.min', get_theme_file_uri(  '/assets/css/datepicker.min.css'),array(), '' );
    //  wp_enqueue_style( 'jquery.fancybox.min', get_theme_file_uri(  '/assets/css/jquery.fancybox.min.css'),array(), '' );
    //  wp_enqueue_style( 'jquery-ui.min', get_theme_file_uri(  '/assets/css/jquery-ui.min.css'),array(), '' );

    wp_enqueue_script('jquery', get_theme_file_uri('/assets/js/jquery-3.2.1.min.js'), array(), '');
    wp_enqueue_script('slick.min', get_theme_file_uri('/assets/js/slick.min.js'), array(), '');
    wp_enqueue_script('jquery.matchHeight', get_theme_file_uri('/assets/js/jquery.matchHeight.js'), array(), '');

    wp_enqueue_style('select2.min.css', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css', array(), '');
    wp_enqueue_script('select2.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js', array(), '');


    wp_enqueue_script('jquery.query-object', get_theme_file_uri('/assets/js/jquery.query-object.js'), array(), '');
    wp_enqueue_script('lightgallery.min', get_theme_file_uri('/assets/js/lightgallery.min.js'), array(), '');
    wp_enqueue_script('lg-fullscreen.min', get_theme_file_uri('/assets/js/lg-fullscreen.min.js'), array(), '');
    wp_enqueue_script('lg-hash.min', get_theme_file_uri('/assets/js/lg-hash.min.js'), array(), '');
    wp_enqueue_script('jquery.inputmask', get_theme_file_uri('/assets/js/jquery.inputmask.js'), array(), '');
    wp_enqueue_script('lg-thumbnail.min', get_theme_file_uri('/assets/js/lg-thumbnail.min.js'), array(), '');
    wp_enqueue_script('default', get_theme_file_uri('/assets/js/default.js'), array(), '');
    if (is_page_template('page-contact.php')) {

        wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDkewQZi7iY6eOtlXajXXHFWHECGYWqfMs', array(), '2');

        wp_enqueue_script('maps', get_theme_file_uri('/assets/js/maps.js'), array(), '2');
    }
    if (is_front_page() OR is_home()) {
        wp_enqueue_script('vk', 'https://vk.com/js/api/openapi.js?151', array(), '');
    }


    global $wp_query;
    $args = array(
        'url' => admin_url('admin-ajax.php'),
        'query' => $wp_query->query,
    );
    wp_enqueue_script('be-load-more', get_theme_file_uri('/assets/js/load-more.js'), array(), '');
    wp_localize_script('be-load-more', 'beloadmore', $args);


}

add_action('wp_enqueue_scripts', 'th_scripts');


/*
*  Rgister Post Type Slider
*/

add_action('init', 'post_type_slider');

function post_type_slider()
{
    $labels = array(
        'name' => 'Слайдер',
        'singular_name' => 'Слайдер',
        'all_items' => 'Слайдер',
        'menu_name' => 'Слайдер' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_position' => 5,
        'has_archive' => true,
        'query_var' => "slider",
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        )
    );
    register_post_type('slider', $args);
}


/*
*  Rgister Post Type Partners
*/

add_action('init', 'post_type_partners');

function post_type_partners()
{
    $labels = array(
        'name' => 'Партнеры',
        'singular_name' => 'Партнеры',
        'all_items' => 'Партнеры',
        'menu_name' => 'Партнеры' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_position' => 5,
        'has_archive' => true,
        'query_var' => "partners",
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        )
    );
    register_post_type('partners', $args);
}

/*
*  Rgister Post Type Products
*/

add_action('init', 'post_type_products');

function post_type_products()
{
    $labels = array(
        'name' => 'Товары',
        'singular_name' => 'Товары',
        'all_items' => 'Товары',
        'menu_name' => 'Товары' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_position' => 5,
        'has_archive' => true,
        'query_var' => "products",
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        )
    );
    register_post_type('products', $args);
}
add_action( 'init', 'create_products_taxonomy', 0 );

function create_products_taxonomy() {

// Labels part for the GUI

    $labels = array(
        'name' => _x( 'Категории', 'light' ),
        'singular_name' => _x( 'Категории', 'light' ),
        'search_items' =>  __( 'Поиск Категории' ),
        'popular_items' => __( 'Популярные Категории' ),
        'all_items' => __( 'Все Категории' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Редактировать Категорию' ),
        'update_item' => __( 'Обновить Категорию' ),
        'add_new_item' => __( 'Добавить новую Категорию' ),
        'new_item_name' => __( 'Категория' ),
        'menu_name' => __( 'Категории' ),
    );

// Now register the non-hierarchical taxonomy like tag

    register_taxonomy('product_cats','products',array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'product_cat' ),
    ));
}

/*
*  Rgister Post Type Settings
*/
if (function_exists('acf_add_options_page')) {

    // Let's add our Options Page
    acf_add_options_page(array(
        'page_title' => 'Настройки Темы',
        'menu_title' => 'Настройки Темы',
        'menu_slug' => 'theme-options',
        'capability' => 'edit_posts'
    ));


}
add_filter('woocommerce_dropdown_variation_attribute_options_args', 'custom_woocommerce_product_add_to_cart_text', 10, 2);
/*
 *   Edit text add cart
 */

function custom_woocommerce_product_add_to_cart_text($args)
{
    $args['show_option_none'] = __('В корзину', 'woocommerce');
    return $args;
}

/*
 *  Pagination
 */
function paginate_links_custom($args = '')
{
    global $wp_query, $wp_rewrite;

    // Setting up default values based on the current URL.
    $pagenum_link = html_entity_decode(get_pagenum_link());
    $url_parts = explode('?', $pagenum_link);

    // Get max pages and current page out of the current query, if available.
    $total = isset($wp_query->max_num_pages) ? $wp_query->max_num_pages : 1;
    $current = get_query_var('paged') ? intval(get_query_var('paged')) : 1;

    // Append the format placeholder to the base URL.
    $pagenum_link = trailingslashit($url_parts[0]) . '%_%';

    // URL base depends on permalink settings.
    $format = $wp_rewrite->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
    $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit($wp_rewrite->pagination_base . '/%#%', 'paged') : '?paged=%#%';

    $defaults = array(
        'base' => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
        'format' => $format, // ?page=%#% : %#% is replaced by the page number
        'total' => $total,
        'current' => $current,
        'aria_current' => 'page',
        'show_all' => false,
        'prev_next' => true,
        'prev_text' => __('&laquo; Previous'),
        'next_text' => __('Next &raquo;'),
        'end_size' => 1,
        'mid_size' => 2,
        'type' => 'plain',
        'add_args' => array(), // array of query args to add
        'add_fragment' => '',
        'before_page_number' => '',
        'after_page_number' => '',
    );

    $args = wp_parse_args($args, $defaults);

    if (!is_array($args['add_args'])) {
        $args['add_args'] = array();
    }

    // Merge additional query vars found in the original URL into 'add_args' array.
    if (isset($url_parts[1])) {
        // Find the format argument.
        $format = explode('?', str_replace('%_%', $args['format'], $args['base']));
        $format_query = isset($format[1]) ? $format[1] : '';
        wp_parse_str($format_query, $format_args);

        // Find the query args of the requested URL.
        wp_parse_str($url_parts[1], $url_query_args);

        // Remove the format argument from the array of query arguments, to avoid overwriting custom format.
        foreach ($format_args as $format_arg => $format_arg_value) {
            unset($url_query_args[$format_arg]);
        }

        $args['add_args'] = array_merge($args['add_args'], urlencode_deep($url_query_args));
    }

    // Who knows what else people pass in $args
    $total = (int)$args['total'];
    if ($total < 2) {
        return;
    }
    $current = (int)$args['current'];
    $end_size = (int)$args['end_size']; // Out of bounds?  Make it the default.
    if ($end_size < 1) {
        $end_size = 1;
    }
    $mid_size = (int)$args['mid_size'];
    if ($mid_size < 0) {
        $mid_size = 2;
    }
    $add_args = $args['add_args'];
    $r = '';
    $page_links = array();
    $dots = false;

    if ($args['prev_next'] && $current && 1 < $current) :
        $link = str_replace('%_%', 2 == $current ? '' : $args['format'], $args['base']);
        $link = str_replace('%#%', $current - 1, $link);
        if ($add_args)
            $link = add_query_arg($add_args, $link);
        $link .= $args['add_fragment'];

        /**
         * Filters the paginated links for the given archive pages.
         *
         * @since 3.0.0
         *
         * @param string $link The paginated link URL.
         */
        $page_links[] = '<a class="link-prev" href="' . esc_url(apply_filters('paginate_links', $link)) . '">' . $args['prev_text'] . '</a>';
    endif;
    $page_links[] = '<div class="center-pagination">';
    for ($n = 1; $n <= $total; $n++) :
        if ($n == $current) :
            $page_links[] = "<span aria-current='" . esc_attr($args['aria_current']) . "' class='link-top-pag current'>" . $args['before_page_number'] . number_format_i18n($n) . $args['after_page_number'] . "</span>";
            $dots = true;
        else :
            if ($args['show_all'] || ($n <= $end_size || ($current && $n >= $current - $mid_size && $n <= $current + $mid_size) || $n > $total - $end_size)) :
                $link = str_replace('%_%', 1 == $n ? '' : $args['format'], $args['base']);
                $link = str_replace('%#%', $n, $link);
                if ($add_args)
                    $link = add_query_arg($add_args, $link);
                $link .= $args['add_fragment'];

                /** This filter is documented in wp-includes/general-template.php */
                $page_links[] = "<a class='link-top-pag' href='" . esc_url(apply_filters('paginate_links', $link)) . "'>" . $args['before_page_number'] . number_format_i18n($n) . $args['after_page_number'] . "</a>";
                $dots = true;
            elseif ($dots && !$args['show_all']) :
                $page_links[] = '<span class="page-numbers dots">' . __('&hellip;') . '</span>';
                $dots = false;
            endif;
        endif;
    endfor;
    $page_links[] = '</div>';
    if ($args['prev_next'] && $current && $current < $total) :
        $link = str_replace('%_%', $args['format'], $args['base']);
        $link = str_replace('%#%', $current + 1, $link);
        if ($add_args)
            $link = add_query_arg($add_args, $link);
        $link .= $args['add_fragment'];

        /** This filter is documented in wp-includes/general-template.php */
        $page_links[] = '<a class="link-next" href="' . esc_url(apply_filters('paginate_links', $link)) . '">' . $args['next_text'] . '</a>';
    endif;
    switch ($args['type']) {
        case 'array' :
            return $page_links;

        case 'list' :
            $r .= "<ul class='page-numbers'>\n\t<li>";
            $r .= join("</li>\n\t<li>", $page_links);
            $r .= "</li>\n</ul>\n";
            break;

        default :
            $r = join("\n", $page_links);
            break;
    }
    return $r;
}


/**
 * AJAX Load More
 */

function be_ajax_load_more()
{
    $args = isset($_POST['query']) ? array_map('esc_attr', $_POST['query']) : array();
    //$args['post_type'] = isset( $args['post_type'] ) ? esc_attr( $args['post_type'] ) : 'post';
    $args['post_type'] = $_POST['query'];
    $args['paged'] = esc_attr($_POST['page']);
    $args['post_status'] = 'publish';
    ob_start();
    $loop = new WP_Query($args);
    if ($loop->have_posts()): while ($loop->have_posts()): $loop->the_post();
        be_post_summary();
    endwhile; endif;
    wp_reset_postdata();
    $data = ob_get_clean();
    wp_send_json_success($data);
    wp_die();
}

add_action('wp_ajax_be_ajax_load_more', 'be_ajax_load_more');
add_action('wp_ajax_nopriv_be_ajax_load_more', 'be_ajax_load_more');


function be_post_summary()
{

    $img_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');


    echo '
                       <li class="news-item" style="background: url(' . $img_url . ');">

                        <div class="content-news-item">
                                <div class="date">' . get_the_date('d.m.Y') . '</div>
                                <div class="title">' . get_the_title(get_the_ID()) . '</div>
                                <a href="' . get_the_permalink(get_the_ID()) . '" class="link-to-news">Читать новость</a>
                        </div>
                        <div class="overlay-news"></div>

                    </li>
    ';

}


/**
 * AJAX Load prodcut
 */

function be_ajax_load_product()
{

    //$args['post_type'] = isset( $args['post_type'] ) ? esc_attr( $args['post_type'] ) : 'post';

    $args = [
        'post_type' => $_POST['query'],
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $_POST['slug']
            )
        ),
        'posts_per_page' => -1,
    ];
    $args['post_status'] = 'publish';
    ob_start();
    $loop = new WP_Query($args);


    $slider_content = $slider_right_content = '';
    $i = 0;
    if ($loop->have_posts()): while ($loop->have_posts()): $loop->the_post();
        $slider_content .= be_post_product($i);
        $slider_right_content .= be_post_product_right($i);

        $i++;
    endwhile; endif;
    $slider_before = '<ul class="' . $_POST['type'] . '-slider" data-slider="' . $_POST['type'] . '-slider">';
    $slider_after = '  </ul>';
    $slider_right_before = '
                                                 <div class="title-section-sub-section"> 
                                                </div> 
                                                <ul class="' . $_POST['type'] . '-slider-nav clearfix" data-slider="' . $_POST['type'] . '-slider">';
    $slider_right_after = '  </ul> ';


    $slider = $slider_before . $slider_content . $slider_after;

    $slider_right = $slider_right_before . $slider_right_content . $slider_right_after;
    echo json_encode(['first' => $slider, 'second' => $slider_right]);

    wp_reset_postdata();
    $data = ob_get_clean();
    wp_send_json_success($data);
    wp_die();
}

add_action('wp_ajax_be_ajax_load_product', 'be_ajax_load_product');
add_action('wp_ajax_nopriv_be_ajax_load_product', 'be_ajax_load_product');

function be_post_product($i)
{

    $img_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
    $img_url = aq_resize($img_url, 200, 250, true);

    return ' 
          <li data-title="' . get_the_title(get_the_ID()) . '" data-url="' . get_the_permalink(get_the_ID()) . '">
                <img src="' . $img_url . '" alt="' . get_the_title(get_the_ID()) . '"/>
          </li> 
         ';

}

function be_post_product_right($i)
{

    $img_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'full');
    $img_url = aq_resize($img_url, 50, 62, true);

    if ($i == 0) {
        $active_class = 'class="active"';
    } else {
        $active_class = '';
    }
    return ' 
            <li ' . $active_class . '>
                 <img src="' . $img_url . '" alt="' . get_the_title(get_the_ID()) . '"/>
           </li> 
         ';

}


/*
*  Rgister Post Type Settings
*/
if (function_exists('acf_add_options_page')) {

    // Let's add our Options Page
    acf_add_options_page(array(
        'page_title' => 'Настройки Темы',
        'menu_title' => 'Настройки Темы',
        'menu_slug' => 'theme-options',
        'capability' => 'edit_posts'
    ));


}


/*
 * *  Composer options
*/
vc_add_param("vc_row", array(
    "type" => "dropdown",
    "group" => "Light",
    "class" => "",
    "heading" => "Вид строки",
    "param_name" => "type_row",
    "value" => array(
        "Во всю ширину" => "full_width",
        "Использовать контейнер" => "in_container",

    )
));


vc_map(array(
    "name" => __("Слайдер", "js_composer"),
    "base" => "main_slider",
    "params" => array()
));

add_shortcode('main_slider', 'vc_main_slider_function');
function vc_main_slider_function($atts, $content)
{
    extract(shortcode_atts(array(), $atts));
    $argsslideer = array(
        'posts_per_page' => -1,
        'post_type' => 'slider',
        'status' => 'publish'
    );

    $the_query_slider = new WP_Query($argsslideer);



    $html = ' <div class="home-slider-walpaper"><div class="home-slider">';
    while ($the_query_slider->have_posts()) :
        $the_query_slider->the_post();
        $post_id_slider = $the_query_slider->post->ID;


        $html .= '<div class="item-home-slider" style="background:  url('.wp_get_attachment_url(get_post_thumbnail_id($post_id_slider), 'full').'); ">
                        <div class="content-home-slider">
                            <div class="container relative clearfix">
                                <div class="slider-block-content-walpaper ">
                                     <h2>
                                        '.get_the_title($post_id_slider).'
                                    </h2>
                                </div>
                            </div>
					    </div>
                    </div>';



    endwhile;


    $html .= ' </div> 
                <img class="img-overlay" src="'.get_theme_file_uri('/assets/images/overlay-slider.png').'" alt="фон слайдера" />
                 <div class="arrow-slder">
                <div class="container relative clearfix">
                    <a href="#" class="nav-link left">
                        <img src="'.get_theme_file_uri('/assets/images/arr.png').'">
                    </a>
                    <a href="#" class="nav-link right">
                        <img src="'.get_theme_file_uri('/assets/images/arr.png').'">
                    </a>
                </div>
            </div>
               </div> 
 
 ';

    return $html;
}

vc_map(array(
    "name" => __("Товары", "js_composer"),
    "base" => "products",
    "params" => array()
));
add_shortcode('products', 'vc_products_function');
function vc_products_function($atts, $content)
{
    extract(shortcode_atts(array(), $atts));

    $terms = get_terms([
        'taxonomy'=> 'product_cats',
        'hide_empty' => false
    ]);



    $html = ' <ul class="products-cats">';

    foreach ($terms as $term){

        $url = get_field('thumbnails', $term);

        $image = $url["sizes"]["category_products"];
        $html .= '<li   class="product-cat-item col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="row">
                    <div class="product-cat-item-walp">
                        <a  href="'.get_the_permalink().'" class="product-cat-item-holder">
                                <div class="img-block"><img src="'.$image.'"  alt="изображение категории"/></div>
                                
                                <h3>
                                    '.$term->name.'
                                </h3>
                           
                        </a>
                    </div>
                    </div>
                 </li>';
    }


    $html .= ' </ul>';
    $html .= '<div class="price--link-block">

                <a href="'.get_field('file_price', 'option')['url'].'" class="link-all-prices">
                    <div class="img"><img src="'.get_theme_file_uri('/assets/images/icon-pdf.png').'"  alt=" картинка ссылка" /></div>
                    <p>
                        Цены на товары
                    </p>
                </a>
              </div>';


    return $html;
}