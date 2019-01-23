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
add_image_size('cert_image', 360, 230, false);
add_image_size('partner_image', 300, 75, false);

/**
 * Enqueue scripts and styles.
 */
function th_scripts()
{
    // Theme stylesheet.
    wp_enqueue_style('bootstrapcdn', get_theme_file_uri('/assets/css/bootstrap.min.css'), array(), '');
    wp_enqueue_style('th-style', get_stylesheet_uri());


    wp_enqueue_style('lg-transitions', get_theme_file_uri('/assets/css/lg-transitions.css'), array(), '');
    wp_enqueue_style('lightgallery', get_theme_file_uri('/assets/css/lightgallery.css'), array(), '');
    wp_enqueue_style('fontawesome-all', get_theme_file_uri('/assets/css/fontawesome-all.css'), array(), '');
    wp_enqueue_style('normalize', get_theme_file_uri('/assets/css/normalize.css'), array(), '');
    wp_enqueue_style('slick', get_theme_file_uri('/assets/css/slick.css'), array(), '');
    wp_enqueue_style('slick-theme', get_theme_file_uri('/assets/css/slick-theme.css'), array(), '');
    wp_enqueue_style('main-style', get_theme_file_uri('/assets/css/style.css'), array(), '');

    wp_enqueue_script('jquery', get_theme_file_uri('/assets/js/jquery-3.2.1.min.js'), array(), '');
    wp_enqueue_script('slick.min', get_theme_file_uri('/assets/js/slick.min.js'), array(), '');
    wp_enqueue_script('jquery.matchHeight', get_theme_file_uri('/assets/js/jquery.matchHeight.js'), array(), '');
    wp_enqueue_script('jquery.inputmask', get_theme_file_uri('/assets/js/jquery.inputmask.js'), array(), '');
    wp_enqueue_script('lightgallery.min', get_theme_file_uri('/assets/js/lightgallery.min.js'), array(), '');
    wp_enqueue_script('lg-fullscreen.min', get_theme_file_uri('/assets/js/lg-fullscreen.min.js'), array(), '');
    wp_enqueue_script('lg-thumbnail.min', get_theme_file_uri('/assets/js/lg-thumbnail.min.js'), array(), '');
    wp_enqueue_script('lg-hash.min', get_theme_file_uri('/assets/js/lg-hash.min.js'), array(), '');
    wp_enqueue_script('lg-zoom.min', get_theme_file_uri('/assets/js/lg-zoom.min.js'), array(), '');
    wp_enqueue_script('jquery.nav', get_theme_file_uri('/assets/js/jquery.nav.js'), array(), '');

    if (is_front_page() || is_page_template('page-contact.php')) {

        wp_enqueue_script('yandex-maps', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU', array(), '');

    }


    wp_enqueue_script('default', get_theme_file_uri('/assets/js/default.js'), array(), '');


}

add_action('wp_enqueue_scripts', 'th_scripts');

/*
*  Rgister Post Type Price Cat
*/

add_action('init', 'post_type_price_cat');

function post_type_price_cat()
{
    $labels = array(
        'name' => 'Цены',
        'singular_name' => 'Цены',
        'all_items' => 'Цены',
        'menu_name' => 'Цены' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_position' => 5,
        'has_archive' => true,
        'query_var' => "price_cat",
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        )
    );
    register_post_type('price_cat', $args);
}


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
*  Rgister Post Type Certs
*/

add_action('init', 'post_type_certs');

function post_type_certs()
{
    $labels = array(
        'name' => 'Сертификаты',
        'singular_name' => 'Сертификаты',
        'all_items' => 'Сертификаты',
        'menu_name' => 'Сертификаты' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_position' => 5,
        'has_archive' => true,
        'query_var' => "certs",
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        )
    );
    register_post_type('certs', $args);
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

add_action('init', 'create_products_taxonomy', 0);

function create_products_taxonomy()
{

// Labels part for the GUI

    $labels = array(
        'name' => _x('Категории', 'light'),
        'singular_name' => _x('Категории', 'light'),
        'search_items' => __('Поиск Категории'),
        'popular_items' => __('Популярные Категории'),
        'all_items' => __('Все Категории'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Редактировать Категорию'),
        'update_item' => __('Обновить Категорию'),
        'add_new_item' => __('Добавить новую Категорию'),
        'new_item_name' => __('Категория'),
        'menu_name' => __('Категории'),
    );

// Now register the non-hierarchical taxonomy like tag

    register_taxonomy('product_cats', 'products', array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => 'product_cat'),
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


/**
 * AJAX Load More
 */

function be_ajax_load_price()
{
    $arg = array(
        'posts_per_page' => 1,
        'post_type' => 'price_cat',
        'meta_key' => 'type_product',
        'meta_value' => $_POST['term'],
        'meta_compare' => '==',
        'status' => 'publish'
    );
    ob_start();
    $loop = new WP_Query($arg);
    if ($loop->have_posts()): while ($loop->have_posts()): $loop->the_post();
        be_post_summary();
    endwhile; endif;
    wp_reset_postdata();
    $data = ob_get_clean();
    wp_send_json_success($data);
    wp_die();
}

add_action('wp_ajax_be_ajax_load_price', 'be_ajax_load_price');
add_action('wp_ajax_nopriv_be_ajax_load_price', 'be_ajax_load_price');


function be_post_summary()
{
    $prices = get_field('prices',  get_the_ID());

    foreach ($prices as $price){  ?>
        <tr>
            <th><?=$price['block_price']['name_price']; ?></th>
            <th><?=$price['block_price']['value_price']; ?></th>
            <th><?=$price['block_price']['gost_price']; ?></th>
            <th><?=$price['block_price']['note_price']; ?></th>
        </tr>
    <?php  }

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
/*
 *  Slider
 */

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


        $html .= '<div class="item-home-slider" style="background:  url(' . wp_get_attachment_url(get_post_thumbnail_id($post_id_slider), 'full') . '); ">
                        <div class="content-home-slider">
                            <div class="container relative clearfix">
                                <div class="slider-block-content-walpaper ">
                                     <h2>
                                        ' . get_the_title($post_id_slider) . '
                                    </h2>
                                </div>
                            </div>
					    </div>
                    </div>';


    endwhile;


    $html .= ' </div> 
                <img class="img-overlay" src="' . get_theme_file_uri('/assets/images/overlay-slider.png') . '" alt="фон слайдера" />
                 <div class="arrow-slder">
                <div class="container relative clearfix">
                    <a href="#" class="nav-link left">
                        <img src="' . get_theme_file_uri('/assets/images/arr.png') . '">
                    </a>
                    <a href="#" class="nav-link right">
                        <img src="' . get_theme_file_uri('/assets/images/arr.png') . '">
                    </a>
                </div>
            </div>
               </div> 
 
 ';

    return $html;
}

/*
 * *  Products
 */
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
        'taxonomy' => 'product_cats',
        'hide_empty' => false
    ]);


    $html = ' <ul class="products-cats">';

    foreach ($terms as $term) {

        $url = get_field('thumbnails', $term);

        $image = $url["sizes"]["category_products"];
        $html .= '<li   class="product-cat-item col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="row">
                    <div class="product-cat-item-walp">
                        <a  href="' . get_term_link($term->term_id, 'product_cats') . '" class="product-cat-item-holder">
                                <div class="img-block"><img src="' . $image . '"  alt="изображение категории"/></div>
                                
                                <h3>
                                    ' . $term->name . '
                                </h3>
                           
                        </a>
                    </div>
                    </div>
                 </li>';
    }


    $html .= ' </ul>';
    $html .= '<div class="price--link-block">

                <a  target="_blank" href="' . get_field('file_price', 'option')['url'] . '" class="link-all-prices">
                    <div class="img"><img src="' . get_theme_file_uri('/assets/images/icon-pdf.png') . '"  alt=" картинка ссылка" /></div>
                    <p>
                        Цены на все товары
                    </p>
                </a>
              </div>';


    return $html;
}

/*
 *  Certs
 */
vc_map(array(
    "name" => __("Сертификаты", "js_composer"),
    "base" => "certs_row",
    "params" => array()
));
add_shortcode('certs_row', 'vc_certs_row_function');
function vc_certs_row_function($atts, $content)
{
    extract(shortcode_atts(array(), $atts));

    $arg = array(
        'posts_per_page' => -1,
        'post_type' => 'certs',
        'status' => 'publish'
    );

    $the_query = new WP_Query($arg);


    $html = ' <ul class="certs-list">';


    while ($the_query->have_posts()) :
        $the_query->the_post();
        $post_id = $the_query->post->ID;


        $html .= '<div class="item-cert-slider">
                        <div class="item-cert-slider-walp">
                            <a href="' . wp_get_attachment_url(get_post_thumbnail_id($post_id), 'full') . '"  data-lightbox="roadtrip">
                                <div class="img-overlay-sert">
                                    <img src=" ' . get_theme_file_uri('/assets/images/zoom-in.png') . '" alt="Иконка увеличения"  />
                                </div>
                                <img class="main-img-cert" src=" ' . wp_get_attachment_url(get_post_thumbnail_id($post_id), 'cert_image') . '" alt="Сертификат"  />
                            </a>
					    </div>
                    </div>';


    endwhile;

    $html .= ' </ul>';


    return $html;
}/*
 *  Map
 */
vc_map(array(
    "name" => __("Карта Кастомная", "js_composer"),
    "base" => "mapyandex",
    "params" => array()
));
add_shortcode('mapyandex', 'vc_mapyandex_function');
function vc_mapyandex_function($atts, $content)
{
    extract(shortcode_atts(array(), $atts));


    $html = '<div class="map-holder">
                <div id="map"></div>
                <div class="map-content">
                    <div class="container">
                        <div class="row">
                            <div class="relative col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <div class="map-content-firstblock">
                                    <img class="image-contact" src="' . get_theme_file_uri('/assets/images/contact-form.png') . '" alt="изображение формы" />
                                            <h3>
                                                Оставьте свои контактные данные
                                            </h3>
                                    '.do_shortcode('[contact-form-7 id="68" title="Contact form 1"]').'
                                
                                </div>';

    $html .= '     
                                <div class="map-content-secondblock">
                                             <h3>
                                                Контакты
                                            </h3>
                                    <div class="contacts-block">
                                        <ul class="lists-contacts-information">
                                            <li>
                                                <span>адрес:</span>
                                                <p>'.get_field('adress', 'option').'</p>
                                            </li>
                                             <li>
                                                <span>Телефон:</span>
                                                <p>
                                                <a href="tel:'.str_replace(['(',')', '-', '(моб.)' , 'моб.' , ' ' ], ['','','', '', '', ''], get_field('phone_one', 'option')).'">'.get_field('phone_one', 'option').'</a>
                                                <a href="tel:'.str_replace(['(',')', '-', '(моб.)' , 'моб.' , ' '], ['','','', '', '', ''], get_field('phone_two', 'option')).'">'.get_field('phone_two', 'option').'</a>
                                                <a href="tel:'.str_replace(['(',')', '-', '(моб.)' , 'моб.' , ' '], ['','','', '', '', ''], get_field('phone_tree', 'option')).'">'.get_field('phone_tree', 'option').'</a>
                                                </p>
                                            </li>
                                            <li>
                                                <span>EMAIL:</span>
                                                <p>
                                                <a href="mailto:'.get_field('email', 'option').'">'.get_field('email', 'option').'</a> 
                                                </p>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                
                                </div>
    
    ';
    $html .= '                                      
                            </div>
                        </div>           
                    </div>
                </div>
            </div>';


    return $html;
}