<?php

get_header();

?>

    <main id="main">
        <div class="container">
            <section id="page-single" class="page-single">
                <div class="container">
                    <h1 class="page-title-404">Página <strong>no encontrada</strong></h1>
                    <h5 class="page-subtitle-404">Parece que el recurso a buscar ya no se encuentra</h5>
                    <p>El error 404, que también se muestra como 404 Not Found, indica que la página solicitada por el usuario no se encontró en
                        el servidor. Por lo general, sucede cuando el visitante intenta acceder a una dirección incorrecta o cuando el administrador
                        del sitio transfiere o elimina la URL de la página.</p>
                    <img class="img-fluid" src="<?php echo get_template_directory_uri().'/assets/img/error_404.png'; ?>" alt="">
                </div>
            </section>
        </div>
    </main><!-- End #main -->

<?php
get_footer();
