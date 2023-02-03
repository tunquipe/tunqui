<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-contact">
                    <?php if ( is_active_sidebar('footer-left') ) : ?>
                        <?php dynamic_sidebar('footer-left'); ?>
                    <?php endif; ?>
                </div>
                <div class="col-lg-9 col-md-6 footer-links">
                    <?php if ( is_active_sidebar('footer-description') ) : ?>
                        <?php dynamic_sidebar('footer-description'); ?>
                    <?php endif; ?>
                </div>
<!--                <div class="col-lg-3 col-md-6 footer-links">
                    <?php /*if ( is_active_sidebar('footer-right') ) : */?>
                        <?php /*dynamic_sidebar('footer-right'); */?>
                    <?php /*endif; */?>
                </div>-->
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <a class="footer-links-text" href="#">Preguntas frecuentes</a>
                </div>
                <div class="col-lg-4 col-md-12">
                    <a class="footer-links-text" href="#">Portal de transparencia</a>
                </div>
                <div class="col-lg-4 col-md-12">
                    <h4 class="title-social">Siguenos</h4>
                    <div class="social-links">
                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="terms">
                    *Las imágenes, planos, medidas y áreas contenidas en esta página son referenciales y pueden presentar modificaciones en el
                    transcurso del proyecto. Asimismo, el contenido gráfico es referencial, por lo que puede presentar elementos de apreciación estética
                    que son interpretación del artista gráfico y que no comprometen a la promotora
            </div>
        </div>
    </div>

    <div class="footer-bottom clearfix">
        <div class="container">
            <div class="copyright">
                <ul class="links-terms">
                    <li><a href="#">Derechos arco</a></li>
                    <li><a href="#">Políticas de cookies</a></li>
                    <li><a href="#">Políticas de privacidad</a></li>
                    <li><a href="#">Términos y condiciones</a></li>
                </ul>
            </div>
            <div class="credits">
                &copy; <strong><span>Redisencial Santa Patricia</span></strong>. Todos los derechos reservados /
                Elaborado por <a href="#">Tunqui Agencia</a> .
            </div>
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<?php wp_footer(); ?>
</body>

</html>