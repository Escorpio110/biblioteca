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
            'Socios' => '/Socio/list',
            $libro->titulo => NULL
        ]) ?>
        <?= $template->messages() ?>
        <main>
            <h1><?= APP_NAME ?></h1>
            <section>
                <p><b>DNI:</b>          <?= $socio->dni?></p>
                <p><b>Nombre:</b>       <?= $libro->nombre?></p>
                <p><b>Poblacion:</b>    <?= $libro->poblacion?></p>
                <p><b>Telefono</b>      <?= $libro->telefono?></p>
                <p><b>Email:</b>        <?= $libro->email?></p>
                
            </section>
            
            
        </main>
        <?= $template->footer() ?>
    </body>
</html>