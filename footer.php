<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <?php if ( is_active_sidebar('footer-description') ) : ?>
                        <?php dynamic_sidebar('footer-description'); ?>
                    <?php endif; ?>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <?php if ( is_active_sidebar('footer-left') ) : ?>
                        <?php dynamic_sidebar('footer-left'); ?>
                    <?php endif; ?>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <?php if ( is_active_sidebar('footer-center') ) : ?>
                        <?php dynamic_sidebar('footer-center'); ?>
                    <?php endif; ?>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <?php if ( is_active_sidebar('footer-right') ) : ?>
                        <?php dynamic_sidebar('footer-right'); ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom clearfix">
        <div class="container">
            <div class="copyright">
                &copy; <strong>Tunqui Agencia Creativa EIRL</strong>. Todos los derechos reservados
            </div>
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader">
    <div class="character">
        <img width="64px" height="64px" src="<?php echo get_template_directory_uri().'/assets/img/claquetin.svg'; ?>">
    </div>
</div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script type="text/javascript">
    jQuery(document).ready(function() {
        let windowWidth = window.innerWidth;
        /*console.log(windowWidth);*/
        /*jQuery('[data-vbg]').youtube_background();*/
        if(windowWidth<550){
            /*jQuery("#videotv").height('50vh');*/
            jQuery(".bg-image-page").height('150px');
            jQuery("#hero-page").height('100px');
        } else if(windowWidth>1400){
            jQuery("#videotv").height('75vh');
        } else {
            jQuery("#videotv").height('85vh');
        }

        jQuery("#videotv iframe").css('top','23%');
        //let altura = jQuery("#videotv").height();
        //console.log(altura);
        });
</script>
<?php wp_footer(); ?>
</body>

</html>