<!-- ======= Footer ======= -->
<footer id="footer">
    <?php if (is_front_page()) : ?>
        <div class="footer-newsletter">
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
        </div>
    <?php endif; ?>
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <?php if (is_active_sidebar('footer-description')) : ?>
                        <?php dynamic_sidebar('footer-description'); ?>
                    <?php endif; ?>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <?php if (is_active_sidebar('footer-left')) : ?>
                        <?php dynamic_sidebar('footer-left'); ?>
                    <?php endif; ?>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <?php if (is_active_sidebar('footer-right')) : ?>
                        <?php dynamic_sidebar('footer-right'); ?>
                    <?php endif; ?>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Siguenos en nuestras redes</h4>
                    <p>Nos encanta trabajar con clientes apasionados y atrevidos.</p>
                    <div class="social-links mt-3">
                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom clearfix">
        <div class="container">
            <div class="copyright">
                &copy; <strong><span>Tunqui Agencia Creativa EIRL</span></strong>. Todos los derechos reservados
            </div>
            <div class="credits">
            </div>
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader">
    <div class="icon-blender">
        <img width="64px" height="64px" src="<?php echo get_template_directory_uri().'/assets/img/icon_blenderperu.svg'; ?>">
    </div>
</div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('[data-vbg]').youtube_background();
        jQuery("#videotv").height('620px');
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
<?php wp_footer(); ?>
</body>

</html>