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
                        <?php if(!empty(get_theme_mod('cd_whatsapp_contact'))) : ?>
                            <div class="p-2">
                                <a href="<?php echo getUrlWhatsapp(); ?>" target="_blank" class="btn-social">
                                    <i class='bx bxs-phone-call'></i> <span><?php echo get_theme_mod('cd_phone_contact'); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty(get_theme_mod('cd_mail_contact'))) : ?>
                            <div class="p-2">
                                <a href="mailto:<?php echo get_theme_mod('cd_mail_contact'); ?>" class="btn-social">
                                    <i class='bx bx-envelope' ></i> <span><?php echo get_theme_mod('cd_mail_contact'); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty(get_theme_mod('cd_url_book'))) : ?>
                            <div class="p-2">
                                <a href="<?php echo get_theme_mod('cd_url_book'); ?>" class="btn btn-primary btn-book">Libro de Reclamaciones</a>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty(get_theme_mod('cd_popup_elementor'))) : ?>
                        <div class="p-2">
                            <a href="<?php echo get_theme_mod('cd_popup_elementor'); ?>" class="btn btn-primary btn-quote">
                                <span> Empieza Ahora </span> <i class='bx bx-right-arrow-alt bx-sm'></i>
                            </a>
                        </div>
                        <?php endif; ?>
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

<?php if(!empty(get_theme_mod('cd_url_brochure'))) : ?>
<a target="_blank" href="<?php echo get_theme_mod('cd_url_brochure'); ?>" class="download-pdf">
    <img width="100px" src="<?php echo get_template_directory_uri().'/assets/img/brochure.png'; ?>" alt="">
</a>
<?php endif; ?>
<?php if(!empty(get_theme_mod('cd_whatsapp_contact'))) : ?>
<a target="_blank" href="<?php echo getUrlWhatsapp(); ?>" class="btn-wathsapp">
    <img width="100px" src="<?php echo get_template_directory_uri().'/assets/img/wathsapp.png'; ?>" alt="">
</a>
<?php endif; ?>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<?php
wp_footer();
?>

</body>

</html>