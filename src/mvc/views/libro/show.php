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
            <section>
                <p><b>ISBN:</b>         <?= $libro->isbn?></p>
                <p><b>Titulo:</b>       <?= $libro->titulo?></p>
                <p><b>Autor:</b>        <?= $libro->autor?></p>
                <p><b>Idioma</b>        <?= $libro->idioma?></p>
                <p><b>Editorial:</b>    <?= $libro->editorial?></p>
                <p><b>Edición:</b>      <?= $libro->edicion?></p>

                <p><b>Edad recomendada:</b>
                <?= $libro->edadrecomendada ?? 'TP' ?></p>
                
                <p><b>Año</b><?= $libro->anyo ?? ' -- ' ?></p>
                <p><b>Paginas</b><?= $libro->paginas ?? ' -- ' ?></p>
                <p><b>Características</b> <?= $libro->caracteristicas ?? ' -- ' ?></p>
            </section>
            <section>
                <h2>Sinopsis</h2>
                <p><?= $libro->sinopsis ? paragraph($libro->sinopsis) : 'SIN DETALLES' ?></p>
            </section>
            
            <div class="centrado">
                <a class="button" onclick="history.back()">Atras</a>
                <a class="button" href="/Libro/list">Lista de libros</a>
                <a class="button" href="/Libro/edit/<?= $libro->id ?>">Editar</a>
                <a class="button" href="/Libro/delete/<?= $libro->id ?>">Borrar</a>
            </div>
        </main>
        <?= $template->footer() ?>
    </body>
</html>