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
    wp_enqueue_script('jquery.inputmask', 'https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js', array(), '');
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

add_action('init', 'post_type_action');

function post_type_action()
{
    $labels = array(
        'name' => 'Акции',
        'singular_name' => 'Акции',
        'all_items' => 'Акции',
        'menu_name' => 'Акции' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_position' => 5,
        'has_archive' => true,
        'query_var' => "actions",
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        )
    );
    register_post_type('actions', $args);
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

    ob_start();
    parseJson($_POST['term']);
    wp_reset_postdata();
    $data = ob_get_clean();
    wp_send_json_success($data);
    wp_die();
}

add_action('wp_ajax_be_ajax_load_price', 'be_ajax_load_price');
add_action('wp_ajax_nopriv_be_ajax_load_price', 'be_ajax_load_price');





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
                        <a  href="/prices?id='.$term->term_id.'" class="product-cat-item-holder">
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
}
/*
 *  Partners
 */
vc_map(array(
    "name" => __("Партнеры", "js_composer"),
    "base" => "partners_row",
    "params" => array()
));
add_shortcode('partners_row', 'vc_partners_row_function');
function vc_partners_row_function($atts, $content)
{
    extract(shortcode_atts(array(), $atts));

    $arg = array(
        'posts_per_page' => -1,
        'post_type' => 'partners',
        'status' => 'publish'
    );

    $the_query = new WP_Query($arg);


    $html = ' <ul class="parnters-list">';


    while ($the_query->have_posts()) :
        $the_query->the_post();
        $post_id = $the_query->post->ID;


        $html .= '<div class="item-parnters-slider">
                        <div class="item-parnters-slider-walp"> 
                               
                                <img  src=" ' . wp_get_attachment_url(get_post_thumbnail_id($post_id), 'partner_image') . '" alt="Логотип Партнера"  />
                         
					    </div>
                    </div>';


    endwhile;

    $html .= ' </ul>';


    return $html;
}




/*
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


/**
 *   Create page for  upload file
 */
add_action('admin_menu', function(){
    add_menu_page( 'Загрузить цены', 'Загрузить цены', 'manage_options', 'site-options', 'add_my_setting', '', 10 );
} );

// подробнее смотрите API Настроек: http://wp-kama.ru/id_3773/api-optsiy-nastroek.html
function add_my_setting(){
    ?>
    <div class="wrap">
        <h2>Загрузить файл цен</h2>

        <?php
        // settings_errors() не срабатывает автоматом на страницах отличных от опций
        if( get_current_screen()->parent_base !== 'options-general' )
            settings_errors('название_опции');
        ?>

        <form  enctype="multipart/form-data"    method="POST">

            <input type="file" name="file_json"  />
            <input type="submit" value="Загрузить файл">
        </form>
    </div>
    <?php

}

// if isset
if(isset($_FILES['file_json'])){

            $tmp_name = $_FILES["file_json"]["tmp_name"];
            $fp = fopen(ABSPATH."/xml/price.xlsx", 'w');
            $data = file_get_contents($tmp_name);
            fwrite($fp, $data);
            fclose($fp);

    function author_admin_notice(){

        echo '<div class="notice notice-info is-dismissible">
          <p>Файл успешно загружен</p>
         </div>';
    }
    add_action('admin_notices', 'author_admin_notice');


    require_once dirname(__FILE__) . '/PHPExcel-1.8/Classes/PHPExcel.php';
    $File = $_SERVER['DOCUMENT_ROOT'] .'/xml/price.xlsx';

    $excel = PHPExcel_IOFactory::load($File);
    $Start = 8;
    $Res = array();

    $table_name = $wpdb->prefix . "prices";
    global $wpdb;
    $delete = $wpdb->query("TRUNCATE TABLE `".$table_name."`");
    for ($i = $Start; $i <= 1000; $i++) {

        if ($excel->getActiveSheet()->getCell('B' . $i)->getValue() == null) continue;
        $Row = new stdClass();
        if($Start == $i){
            $GLOBALS['type']  = '3';
        }
        $Row->id = $i;


        //var_dump($excel->getActiveSheet()->getCell('B' . $i)->getValue());

        if($excel->getActiveSheet()->getCell('B' . $i)->getValue() != null  && $excel->getActiveSheet()->getCell('C' . $i)->getValue() == null){

             if(trim($excel->getActiveSheet()->getCell('B' . $i)->getValue()) == 'Трубы круглые (чёрные)' ){
                 $GLOBALS['type'] = '4';
            }else if(trim($excel->getActiveSheet()->getCell('B' . $i)->getValue()) == 'ЛИСТОВОЙ ПРОКАТ' ){
                 $GLOBALS['type'] = '5';
            }else if(trim($excel->getActiveSheet()->getCell('B' . $i)->getValue()) == 'УГОЛОК' ){
                 $GLOBALS['type'] = '6';
            }else if(trim($excel->getActiveSheet()->getCell('B' . $i)->getValue()) == 'ШВЕЛЛЕР' ){
                 $GLOBALS['type'] = '7';
            }else if(trim($excel->getActiveSheet()->getCell('B' . $i)->getValue()) == 'КВАДРАТ' ){
                 $GLOBALS['type'] = '8';
            }else if(trim($excel->getActiveSheet()->getCell('B' . $i)->getValue()) == 'ПОЛОСА' ){
                 $GLOBALS['type'] = '9';
            }else if(trim($excel->getActiveSheet()->getCell('B' . $i)->getValue()) == 'АРМАТУРА (ПЕРИОД)' ){
                 $GLOBALS['type'] = '10';
            }else if(trim($excel->getActiveSheet()->getCell('B' . $i)->getValue()) == 'Круг' ){
                 $GLOBALS['type'] = '11';
            }




        }
        $Row->type = $GLOBALS['type'];
        $Row->name = $excel->getActiveSheet()->getCell('B' . $i)->getValue();
        $Row->price = $excel->getActiveSheet()->getCell('C' . $i)->getValue();
        $Row->gost = $excel->getActiveSheet()->getCell('D' . $i)->getValue();
        $Row->primechanie = $excel->getActiveSheet()->getCell('E' . $i)->getValue();
        $Row->addfield_1 = $excel->getActiveSheet()->getCell('F' . $i)->getValue();
        $Row->addfield_2 = $excel->getActiveSheet()->getCell('G' . $i)->getValue();
        $Row->addfield_3 = $excel->getActiveSheet()->getCell('H' . $i)->getValue();



        $Res[] = $Row;
    }


    $fp = fopen(ABSPATH."/xml/json/price.json", 'w');
    fwrite($fp, json_encode($Res));
    fclose($fp);

}


/**
 * Return properly html  by id
 * @param $filter_id
 */
function  parseJson($filter_id){
    $json_file = file_get_contents(ABSPATH."/xml/json/price.json");
    $objects = json_decode($json_file, true);

    foreach ($objects as $object) {
        if($object['type'] == $filter_id && !empty($object['price']) ) {
            ?>


            <tr>
                <th><?= $object['name']; ?></th>
                <th><?= $object['price']; ?></th>
                <th><?= $object['gost']; ?></th>
                <th><?= $object['primechanie'];
                    $object['addfield_1'];
                    $object['addfield_2'];
                    $object['addfield_3']; ?></th>
            </tr>

            <?php
        }
    }
}
