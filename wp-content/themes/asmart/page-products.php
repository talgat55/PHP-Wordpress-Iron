<?php
/*
 * Template Name: Products
 */

get_header(); ?>

    <div class="wrap">
        <div id="primary" class="content-area  page-products">
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
                      <ul class="products-cats">
                          <?php

                          $terms = get_terms([
                              'taxonomy' => 'product_cats',
                              'hide_empty' => false
                          ]);

                          foreach ($terms as $term) {

                         $url = get_field('thumbnails', $term);

                         $image = $url["sizes"]["category_products"];
                         ?>
                          <li class="product-cat-item col-lg-4 col-md-4 col-sm-12 col-xs-12">
                             <div class="row">
                                 <div class="product-cat-item-walp">
                                     <div class="product-cat-item-holder">
                                         <div class="img-block">
                                             <div class="overlay-img-product">
                                                 <a   href="/prices?id=<?=$term->term_id; ?>" class="link-price">Узнать цены</a>
                                             </div>
                                             <img src="<?=  $image; ?>"  alt="изображение категории"/>
                                         </div>

                                         <h3>
                                             <?= $term->name; ?>
                                         </h3>

                                     </div>
                                 </div>
                             </div>
                         </li>
                         <?php }  ?>


                       </ul>
                      <div class="price--link-block">

                         <a  target="_blank" href="<?=get_field('file_price', 'option')['url']; ?>" class="link-all-prices">
                             <div class="img"><img src="<?= get_theme_file_uri('/assets/images/icon-pdf.png') ; ?>"  alt=" картинка ссылка" /></div>
                             <p>
                                 Цены на все товары
                             </p>
                         </a>
                     </div>
                 </div>
             </div>
        </div>
    </div>

<?php get_footer();
