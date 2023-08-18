<!-- ======= Footer ======= -->
<?php

$linkedin_url = get_theme_mod('cd_linkedin_url', '');
$facebook_url = get_theme_mod('cd_facebook_contact', '');
$instagram_url = get_theme_mod('cd_instagram_contact', '');

$email_contact = get_theme_mod('cd_mail_contact', '');
$phone_contact = get_theme_mod('cd_phone_contact', '');
$address_contact = get_theme_mod('cd_address', '');

?>
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="logo-footer">
                        <img width="220px" src="<?php echo get_template_directory_uri().'/assets/img/logo_white.svg'; ?>" alt="">
                    </div>
                    <?php if (is_active_sidebar('footer-01')) : ?>
                        <?php dynamic_sidebar('footer-01'); ?>
                    <?php endif; ?>
                </div>
                <div class="col-lg-3 col-md-6">
                    <?php if (is_active_sidebar('footer-02')) : ?>
                        <?php dynamic_sidebar('footer-02'); ?>
                    <?php endif; ?>
                </div>
                <div class="col-lg-3 col-md-6">
                    <?php if (is_active_sidebar('footer-03')) : ?>
                        <?php dynamic_sidebar('footer-03'); ?>
                    <?php endif; ?>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-row">
                        <?php if (!empty($instagram_url)): ?>
                            <div class="p-2"><a target="_blank" href="<?php echo esc_url($instagram_url); ?>" class="btn-social"><i class='bx bxl-instagram' ></i></a></div>
                        <?php endif; ?>
                        <?php if (!empty($facebook_url)): ?>
                            <div class="p-2"><a target="_blank" href="<?php echo esc_url($facebook_url); ?>" class="btn-social"><i class='bx bxl-facebook-circle' ></i></a></div>
                        <?php endif; ?>
                        <?php if (!empty($linkedin_url)): ?>
                            <div class="p-2"><a target="_blank" href="<?php echo esc_url($linkedin_url); ?>" class="btn-social"><i class='bx bxl-linkedin' ></i></a></div>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($phone_contact)): ?>
                        <div class="p-2"><a href="<?php echo esc_html($phone_contact); ?>" class=""><i class='bx bxs-phone-call'></i> <?php echo esc_html($phone_contact); ?></a></div>
                    <?php endif; ?>
                    <?php if (!empty($email_contact)): ?>
                        <div class="p-2"><a href="mailto:<?php echo esc_html($email_contact); ?>" class=""><i class='bx bx-envelope' ></i> <?php echo esc_html($email_contact); ?></a></div>
                    <?php endif; ?>
                    <?php if (!empty($address_contact)): ?>
                        <div class="p-2"><i class='bx bxs-map' ></i> <?php echo esc_html($address_contact); ?></div>
                    <?php endif; ?>
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