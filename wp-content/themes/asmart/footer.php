</div><!-- #content -->

<footer class="site-footer">
    <div class="wrap">
        <div class="container clearfix">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="row">
                        <a href="<?php echo home_url(); ?>"  class="logo-footer"  title="<?php  _e('Перейти на главную страницу', 'light'); ?>" >
                            <img src="<?php echo get_theme_file_uri('/assets/images/logo-footer.png') ?>" alt="<?php  _e('Логотип', 'light'); ?>">
                        </a>
                        <a href="/policy" class="footer-policy-link">Политика обработки персональных данных</a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="row">
                        <?php wp_nav_menu('menu_id=menu-main&menu_class=bottom-main-container clearfix&theme_location=top_menu'); ?>
                        <p class="footer-text-copyright"><a target="_blank" class="bootom-copyright" title="Перейти на сайт разработчика" href="http://asmart-group.ru/">Сайт разработан IT-company <span>Asmart</span></a></p>

                    </div>
                </div>
            </div>
            </div>
        </div>


    </div><!-- .wrap -->
</footer><!-- #colophon -->
</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>
<a id="back_to_top" href="#">
			<img src="<?php echo get_theme_file_uri('/assets/images/arr-up.png') ?>"   alt="Стрелка" />
</a>

<div class="custom-modal">
    <img class="modal-img"   src="<?php echo get_theme_file_uri('/assets/images/modal-img.png') ?>"   alt="иконка" />
    <div class="modal-contents">
        <img class="close-modal" src="<?php echo get_theme_file_uri('/assets/images/close-modal.png') ?>"   alt="иконка" />
        <h3>Оставьте заявку</h3>
        <?= do_shortcode('[contact-form-7 id="158" title="Модальное окно"]'); ?>
    </div>
</div>
<div class="overlya-modal-layer"></div>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(52499815, "init", {
        id:52499815,
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/52499815" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
