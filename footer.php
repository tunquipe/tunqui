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

                <div class="col-lg-3 col-md-6">
                    <div class="logo-footer">
                        <img width="250px" src="<?php echo get_template_directory_uri().'/assets/img/logo.svg'; ?>" alt="">
                    </div>

                </div>

                <div class="col-lg-9 col-md-6 footer-links">
                    <div class="d-lg-flex flex-row mb-3">
                        <div class="p-2"><a href="<?php echo getUrlWhatsapp(); ?>" target="_blank" class="btn btn-primary btn-border"><i class='bx bxs-phone-call'></i> <?php echo get_theme_mod('cd_phone_contact'); ?></a></div>
                        <div class="p-2"><a href="mailto:<?php echo get_theme_mod('cd_mail_contact'); ?>" class="btn btn-primary btn-border"><i class='bx bx-envelope' ></i> <?php echo get_theme_mod('cd_mail_contact'); ?></a></div>
                        <div class="p-2"><a target="_blank" href="<?php echo get_theme_mod('cd_url_webmail'); ?>" class="btn btn-primary btn-border"><i class='bx bx-mail-send' ></i>Webmail</a></div>
                        <div class="p-2"><a href="<?php echo get_theme_mod('cd_url_book'); ?>" class="btn btn-primary btn-book">Libro de Reclamaciones</a></div>
                    </div>
                    <div class="d-lg-flex flex-row mb-3">

                        <?php if (is_active_sidebar('footer-schedule')) : ?>
                            <?php dynamic_sidebar('footer-schedule'); ?>
                        <?php endif; ?>

                        <?php if (is_active_sidebar('footer-address')) : ?>
                            <?php dynamic_sidebar('footer-address'); ?>
                        <?php endif; ?>


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