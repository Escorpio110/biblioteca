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
            'Libros' => null
        ]) ?>
        <?= $template->messages() ?>
        <main>
            <h1><?= APP_NAME ?></h1>
            <h2>Borrar Libro</h2>

            <form method="POST" class="p2 m2" action="/Libro/destroy/">
                <p>¿Está seguro que desea borrar el libro <b><?= $libro->titulo ?></b>?</p>

                <input type="hidden" name="id" value="<?= $libro->id ?>">
                <input class="button-danger" type="submit" name="borrar" value="Borrar">
                
            </form>
            
            <div class="centrado">
                <a class="button" onclick="history.back()">Atras</a>
                <a class="button" href="/Libro/list">Lista de libros</a>
                <a class="button" href="/Libro/show/<?= $libro->id ?>">Detalles</a>
                <a class="button" href="/Libro/edit/<?= $libro->id ?>">Editar</a>
            </div>
        </main>
        <?= $template->footer() ?>
    </body>
</html>