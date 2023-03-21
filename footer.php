<!-- ======= Footer ======= -->
<footer id="footer">
    <?php if (is_front_page()) : ?>
<!--        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h4>Suscríbase a nuestro boletín</h4>
                        <p>Entérate de todas las novedades de nuestros servicios de educación, negocios y tecnología</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Suscríbete">
                        </form>
                    </div>
                </div>
            </div>
        </div>-->
    <?php endif; ?>
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-2 col-md-6">
                    <div class="logo-footer">
                        <img width="120px" src="<?php echo get_template_directory_uri().'/assets/img/mecssol.svg'; ?>" alt="">
                    </div>
                    <ul class="social">
                        <li><a href="<?php echo get_theme_mod('cd_instagram_contact'); ?>" target="_blank" class="btn-social"><i class='bx bxl-instagram'></i></a></li>
                        <li><a href="<?php echo get_theme_mod('cd_facebook_contact'); ?>" target="_blank" class="btn-social"><i class='bx bxl-facebook-circle'></i></a></li>
                    </ul>
                </div>

                <div class="col-lg-10 col-md-6 footer-links">
                    <div class="d-lg-flex flex-row mb-3">
                        <div class="p-2"><a href="<?php echo getUrlWhatsapp(); ?>" target="_blank" class="btn btn-primary btn-border"><i class='bx bxs-phone-call'></i> <?php echo get_theme_mod('cd_phone_contact'); ?></a></div>
                        <div class="p-2"><a href="mailto:<?php echo get_theme_mod('cd_mail_contact'); ?>" class="btn btn-primary btn-border"><i class='bx bx-envelope' ></i> <?php echo get_theme_mod('cd_mail_contact'); ?></a></div>
                        <div class="p-2"><a target="_blank" href="<?php echo get_theme_mod('cd_url_webmail'); ?>" class="btn btn-primary btn-border"><i class='bx bx-mail-send' ></i>Webmail</a></div>
                        <div class="p-2"><a href="#" class="btn btn-primary btn-quote">Cotizar aqui <i class='bx bxs-arrow-from-left'></i></a></div>

                    </div>
                    <div class="d-lg-flex flex-row mb-3">

                        <?php if (is_active_sidebar('footer-schedule')) : ?>
                            <?php dynamic_sidebar('footer-schedule'); ?>
                        <?php endif; ?>

                        <?php if (is_active_sidebar('footer-address')) : ?>
                            <?php dynamic_sidebar('footer-address'); ?>
                        <?php endif; ?>

                        <div class="p-2"><a href="<?php echo get_theme_mod('cd_url_book'); ?>" class="btn btn-primary btn-book">Libro de Reclamaciones</a></div>
                    </div>
                    <div class="d-flex flex-row mb-3">

                    </div>
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

<div id="preloader">
    <div class="icon-blender">
        <img width="64px" height="64px" src="<?php echo get_template_directory_uri().'/assets/img/icon_mecssol.svg'; ?>">
    </div>
</div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script type="text/javascript">
    jQuery('#login-modal').on("click", function(e) {
        e.preventDefault();
        jQuery(".tutor-modal").addClass('tutor-is-active');
    });
    jQuery('.tutor-modal-overlay').on("click", function(e) {
        e.preventDefault();
        jQuery(".tutor-modal").removeClass('tutor-is-active');
    });
    jQuery(document).ready(function() {
        //let altura = jQuery("#videotv").height();
        //console.log(altura);
        jQuery(".list-courses").owlCarousel({
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });
    });
</script>
<?php
wp_footer();
?>

</body>

</html>