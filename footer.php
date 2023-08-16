<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="logo-footer">
                        <img width="220px" src="<?php echo get_template_directory_uri().'/assets/img/logo_white.svg'; ?>" alt="">
                    </div>

                </div>
                <div class="col-lg-3 col-md-6">
                    sdsds
                </div>
                <div class="col-lg-3 col-md-6">
                    sdsd
                </div>
                <div class="col-lg-3 col-md-6">

                        <div class="p-2"><a href="<?php echo getUrlWhatsapp(); ?>" target="_blank" class=""><i class='bx bxs-phone-call'></i> <?php echo get_theme_mod('cd_phone_contact'); ?></a></div>
                        <div class="p-2"><a href="mailto:<?php echo get_theme_mod('cd_mail_contact'); ?>" class=""><i class='bx bx-envelope' ></i> <?php echo get_theme_mod('cd_mail_contact'); ?></a></div>

                    <div class="d-lg-flex flex-row mb-3">

                        <?php if (is_active_sidebar('footer-schedule')) : ?>
                            <?php dynamic_sidebar('footer-schedule'); ?>
                        <?php endif; ?>

                        <?php if (is_active_sidebar('footer-address')) : ?>
                            <?php dynamic_sidebar('footer-address'); ?>
                        <?php endif; ?>

                        <div class="p-2"><a href="<?php echo get_theme_mod('cd_url_book'); ?>" class="btn btn-primary btn-book">Libro de Reclamaciones</a></div>
                    </div>

                    <ul class="social">
                        <li><a href="<?php echo get_theme_mod('cd_instagram_contact'); ?>" target="_blank" class="btn-social"><i class='bx bxl-instagram'></i></a></li>
                        <li><a href="<?php echo get_theme_mod('cd_facebook_contact'); ?>" target="_blank" class="btn-social"><i class='bx bxl-facebook-circle'></i></a></li>
                    </ul>

                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom clearfix">
        <div class="container">
            <div class="copyright">
                &copy; Sitio web elaborado por <strong><span>Tunqui Agencia Creativa EIRL</span></strong>.
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