<?php
/*
 * Template Name: Products Price
 */

get_header(); ?>

    <div class="wrap">
        <div id="primary" class="content-area  page-prices">
            <div class="bredscrumb">
                <div class="container">
                    <div class="row">
                        <h1 class="page-title">
                            <?php  the_title(); ?>
                        </h1>
                    </div>
                </div>

            </div>
            <div class="container">
                <div class="row">
                    <ul class="price-lists">
                        <?php


                        $arg = array(
                            'posts_per_page' => -1,
                            'post_type' => 'price_cat',
                            'status' => 'publish'
                        );

                        $the_query = new WP_Query($arg);
                        $i = 0;
                        while ($the_query->have_posts()) :
                            $the_query->the_post();
                            $post_id = $the_query->post->ID;
                            $type = get_field('type_product', $post_id);
                            $image = get_field('image', $post_id);
                            $image_hover = get_field('image_hover', $post_id);

                            if(!isset($_REQUEST['id'])){
                                if($i == '0'){
                                    $class= 'active';
                                }else{
                                    $class = '';
                                }
                            }else{
                                if($_REQUEST['id'] ==$type ){
                                    $class= 'active';
                                }else{
                                    $class = '';
                                }

                            }

                            ?>

                            <li class="price-item col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <a href="#" class="price-item-walp  <?= $class;     ?> "  data-type="<?= $type; ?>">
                                  <div class="image-price">
                                      <img  class="price-img" src="<?= $image; ?>" alt="Картинка">
                                      <img  class="price-img-hover" src="<?= $image_hover; ?>" alt="Картинка">
                                  </div> <h3><?= get_the_title($post_id); ?></h3>
                                </a>
                            </li>

                        <?php $i++; endwhile;  ?>


                    </ul>
                    <div class="table-price">
                        <table cellspacing="0">
                            <thead>
                                <tr>
                                    <td>Наимнование</td>
                                    <td>Цена</td>
                                    <td>ГОСТ</td>
                                    <td>Примечание</td>
                                </tr>
                            </thead>
                            <tbody>
                        <?php

//



                        if(isset($_REQUEST['id'])){

                            $filter_id = $_REQUEST['id'];

                        }else{
                            $filter_id = '11';
                        }

                        parseJson($filter_id);
                        ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="price--link-block">

                        <a  target="_blank" href="<?=get_field('file_price', 'option')['url']; ?>" class="link-all-prices">
                            <div class="img"><img src="<?= get_theme_file_uri('/assets/images/download.png') ; ?>"  alt=" картинка ссылка" /></div>
                            <p>
                                Скачать прайс
                            </p>
                        </a>
                    </div>

                    <div class="action-row">
                        <div class="list-actions">
                            <?php
                            $arg = array(
                                'posts_per_page' => -1,
                                'post_type' => 'actions',
                                'status' => 'publish'
                            );

                            $the_query = new WP_Query($arg);

                            while ($the_query->have_posts()) :
                                $the_query->the_post();
                                $post_id = $the_query->post->ID;

                                $val    = get_field('act_value_action');
                                $text   = get_field('act_text');
                                $img    = get_field('act_image');
                             ?>
                                <div class="action-item">
                                    <div class="action-block">
                                        <div class="value-price">
                                            <?= $val; ?>
                                        </div>
                                        <div class="text-value">
                                            <?= $text; ?>
                                        </div>
                                        <div class="img-block" style="background: url(<?= $img; ?>) no-repeat!important;">
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endwhile;
                            ?>



                        </div>
                        <div class="action-arrow">
                            <a href="#" class="nav-link left" >
                                <img src="<?= get_theme_file_uri('/assets/images/arr-action-r.png') ; ?>"  alt="слайд" />
                            </a>
                            <a href="#" class="nav-link right" >
                                <img src="<?= get_theme_file_uri('/assets/images/arr-action-r.png') ; ?>"  alt="слайд" />
                            </a>




                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php get_footer();
