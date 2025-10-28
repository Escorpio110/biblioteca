<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Nuevo Socio de - <?= APP_NAME ?></title> 

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Nuevo Socio de <?= APP_NAME ?>">
        <meta name="author" content="Robert Sallent">

        <link rel="shortcut icon" href="/favicon.ico" type="image/png">
        <!--<link rel="icon" href="https://i.redd.it/cfd2cg8xib4a1.jpg">-->

        <?= $template->css() ?>

    </head>
    <body>
        <?= $template->login() ?>
		<?= $template->menu() ?>
		<?= $template->header('Nuevo Socio') ?>
		<?= $template->messages() ?>
		<?= $template->acceptCookies() ?>
        <?= $template->breadcrumbs([
            'Nuevo socio' => null
        ]) ?>
        <?= $template->messages() ?>
        <main>
            <h1><?= APP_NAME ?></h1>
            <h2>Nuevo Socio</h2>
            <form method="POST" enctype="multipart/form-data" action="/Socio/store">
                <div class="flex2">
                    <label for="dni">DNI:</label>
                    <input type="text" name="dni" value="<?= old('dni') ?>">
                    <br>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?= old('nombre') ?>">
                    <br>
                    <label for="poblacion">Poblacion:</label>
                    <input type="text" name="poblacion" value="<?= old('poblacion') ?>">
                    <br>
                    <label for="telefono">Telefono:</label>
                    <input type="number" name="telefono" value="<?= old('telefono') ?>">
                    <br>
                    <label>Email:</label>
                    <input type="email" name="email" required value="<?= old('email') ?>">
                    <br>
                    <div class="centre mt2">
                        <input type="submit" class="button" name="guardar" value="Giardar">
                        <input type="reset" class="button" value="Reset">
                    </div>
                </div>
            </form>
            <div class="centrado my2">
                <a class="button" onclick="history.back()">Atras</a>
                <a class="button" href="/Libro/list">Lista de libros</a>
            </div>
        </main>
        <?= $template->footer() ?>
    </body>
</html>