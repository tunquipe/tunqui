<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-lg-2 col-md-6">
                    <div class="logo-footer">
                        <img width="180px" src="<?php echo get_template_directory_uri().'/assets/img/logo.svg'; ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-10 col-md-6 footer-links">
                    <div class="d-lg-flex flex-row mb-3">
                        <div class="p-2"><a href="<?php echo getUrlWhatsapp(); ?>" target="_blank" class="btn-social"><i class='bx bxs-phone-call'></i> <span><?php echo get_theme_mod('cd_phone_contact'); ?></span></a></div>
                        <div class="p-2"><a href="mailto:<?php echo get_theme_mod('cd_mail_contact'); ?>" class="btn-social"><i class='bx bx-envelope' ></i> <span><?php echo get_theme_mod('cd_mail_contact'); ?></span></a></div>
                        <div class="p-2"><a href="<?php echo get_theme_mod('cd_url_book'); ?>" class="btn btn-primary btn-book">Libro de Reclamaciones</a></div>
                        <div class="p-2">
                            <a href="#" class="btn btn-primary btn-quote">
                                <span> Empieza Ahora </span> <i class='bx bx-right-arrow-alt bx-sm'></i>
                            </a>
                        </div>
                    </div>
                    <div class="d-lg-flex flex-row mb-3">
                        <?php if (is_active_sidebar('footer-schedule')) : ?>
                            <?php dynamic_sidebar('footer-schedule'); ?>
                        <?php endif; ?>

                        <?php if (is_active_sidebar('footer-address')) : ?>
                            <?php dynamic_sidebar('footer-address'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom clearfix">

                <div class="row">
                    <div class="col">
                        <?php
                        if (has_nav_menu('primary')) {
                            wp_nav_menu(array(
                                'theme_location' => 'secundary',
                                'container' => false,
                                'menu_class' => '',
                                'fallback_cb' => '__return_false',
                                'items_wrap' => '<ul id="%1$s" class="navbar-footer me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                                'depth' => 2
                            ));
                        }
                        ?>
                    </div>
                    <div class="col">
                        <div class="copyright">
                            &copy; Sitio web elaborado por <strong><span><a href="https://tunqui.pe" target="_blank">Tunqui Digital</a></span></strong>.
                        </div>
                    </div>
                </div>
        </div>
    </div>
</footer><!-- End Footer -->


<a target="_blank" href="<?php echo get_theme_mod('cd_url_brochure'); ?>" class="download-pdf">
    <img width="100px" src="<?php echo get_template_directory_uri().'/assets/img/brochure.png'; ?>" alt="">
</a>
<a target="_blank" href="<?php echo getUrlWhatsapp(); ?>" class="btn-wathsapp">
    <img width="100px" src="<?php echo get_template_directory_uri().'/assets/img/wathsapp.png'; ?>" alt="">
</a>

<!--<div id="preloader">
    <div class="icon-blender">
        <img width="64px" height="64px" src="<?php /*echo get_template_directory_uri().'/assets/img/icon_mecssol.svg'; */?>">
    </div>
</div>-->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Modal -->
<div class="modal fade" id="modal-quote" tabindex="-1" aria-labelledby="modal-quote-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if (is_active_sidebar('modal-home')) : ?>
                    <?php dynamic_sidebar('modal-home'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php
wp_footer();
?>

</body>

</html>