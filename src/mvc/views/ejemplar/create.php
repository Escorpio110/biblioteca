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
            'Nuevo libro' => null
        ]) ?>
        <?= $template->messages() ?>
        <main>
            <h1><?= APP_NAME ?></h1>
            <h2>Nuevo Ejemplar</h2>
            <p>
                Estas apunto de crear un ejemplar de <b><?= $libro ->$id ?></b>
            </p>
            <form method="POST" action="/Ejemplar/store">
                <input type="hidden" name="idlibro" value="<?= $libro -> $id?>">
                
                
                    <label>Año:</label>
                    <input type="number" name="anyo" value="<?= old('anyo') ?>">
                    <br>
                    
                    <label>Precio:</label>
                    <input type="number" name="precio" step="0.01" value="<?= old('precio') ?>">
                    <br>
                    <label>Características:</label>
                    <input type="text" name="estado" value="<?= old('estado') ?>">
                    <br>
                    <input type="submit" class="button" name="guardar" value="Guardar">
    
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