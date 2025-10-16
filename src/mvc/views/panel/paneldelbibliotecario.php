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
            <h1>Panel del bibliotecario</h1>
            <div class="flex-container gap2">
                <section class="flex2">
                    <h2>Operaciones de Libros</h2>
                    <br>
                    <ul>
                        <li><a href='/Libro'>Libros</a></li>
                        <li><a href='/Libro/create'>Nuevo libro</a></li>
                        <li><a href='../Ejemplar/prestamo'>Prestamos</a></li>
                    </ul>

                   
                </section>
                <section class="flex2">
                    <h2>Operaciones de Temas</h2>
                    <br>
                    <ul>
                        <li><a href='/Tema'>Tema</a></li>
                        <li><a href='/Tema/create'>Nuevo Tema</a></li>
                    </ul>
                </section>
                <section class="flex2">
                    <h2>Operaciones de Socios</h2>
                    <br>
                    <ul>
                        <li><a href='/Socio'>Socios</a></li>
                        <li><a href='/Socio/create'>Nuevo Socio</a></li>
                    </ul>
                </section>
            </div>
            
        </main>
        <?= $template->footer() ?>
    </body>
</html>