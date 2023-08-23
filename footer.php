<!-- ======= Footer ======= -->
<?php

$linkedin_url = get_theme_mod('cd_linkedin_url', '');
$facebook_url = get_theme_mod('cd_facebook_contact', '');
$instagram_url = get_theme_mod('cd_instagram_contact', '');

$email_contact = get_theme_mod('cd_mail_contact', '');
$phone_contact = get_theme_mod('cd_phone_contact', '');
$address_contact = get_theme_mod('cd_address', '');
$show_copyright = get_theme_mod('show_copyright', true);
$text_copyright= get_theme_mod('cd_copyright', '');
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
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <?php if (is_active_sidebar('footer-04')) : ?>
                        <?php dynamic_sidebar('footer-04'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php if($show_copyright): ?>
    <div class="footer-bottom clearfix">
        <div class="container">
            <div class="copyright">
                <?php echo $text_copyright; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
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


<?php
wp_footer();
?>

</body>

</html>