<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Lista de libros - <?= APP_NAME ?></title> 

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Lista de libros en <?= APP_NAME ?>">
        <meta name="author" content="Robert Sallent">

        <link rel="shortcut icon" href="/favicon.ico" type="image/png">
        <!--<link rel="icon" href="https://i.redd.it/cfd2cg8xib4a1.jpg">-->

        <?= $template->css() ?>

    </head>
    <body>
        <?= $template->login() ?>
		<?= $template->menu() ?>
		<?= $template->header('Lista de libros') ?>
		<?= $template->messages() ?>
		<?= $template->acceptCookies() ?>
        <?= $template->breadcrumbs([
            'Contacto' => null
        ]) ?>
        <?= $template->messages() ?>
        <main>
            <div class="flex-container gap2">
                <section class="flex1">
                    <h1>Contacto</h1>
                    <p>Utiliza el formulario para contactar al administrador de <?= APP_NAME ?>.</p>

                    <form method="POST" action="/Contacto/send">
                        <label>Email:</label>
                        <input type="email" name="email" required value="<?= old('email') ?>">
                        <br>
                        <label>Nombre:</label>
                        <input type="text" name="nombre" required value="<?= old('nombre') ?>">
                        <br>
                        <label>Asunto:</label>
                        <input type="text" name="asunto" required value="<?= old('asunto') ?>">
                        <br>
                        <label>Mensaje:</label>
                        <textarea name="mensaje" required><?= old('mensaje') ?></textarea>
                        <br>
                        
                        
                        <div class="centrado mt2">
                            <input class="button" type="submit" name="enviar" value="Enviar">
                        </div>
                    </form>
                </section>
                <section class="flex1">
                    <h2>Ubicacion Mapa</h2>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2985.6399246620495!2d2.0555456109981334!3d41.55539298543857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4952ef0b8c6e9%3A0xb6f080d2f180b111!2sCIFO%20Valles!5e0!3m2!1ses!2ses!4v1760076675325!5m2!1ses!2ses" 
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <h3>Datos</h3>
                    <p><b>Cifo Sabadell</b>- Carretera Nacional 150 km.15, 08227 Terrassa<br>
                        Telefono: 93 736 29 10<br>
                        cifo_valles.soc@gencat.cat</p>
                </section>
            </div>
            
        </main>
        <?= $template->footer() ?>
    </body>
</html>