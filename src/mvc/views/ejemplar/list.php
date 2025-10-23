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
            <table class="table w100">
                    <tr>
                        <th>Portada</th>
                        <th>ISBN</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Limite</th>
                        <th>Devolucion</th>
                        <th class="centrado">Operaciones</th>
                    </tr>
                <?php foreach($prestamos as $prestamo){ ?>
                    <tr>
                        <td class="centrado"><?= $prestamo->id ?></td>
                        <td><a href='/Socio/show/<?= $socio->id ?>'><?= $prestamo->nombre ?></a></td>
                        <td><?= $prestamo->idejemplar ?></td>
                        <td><?= $prestamo->titulo ?></td>
                        <td><?= $prestamo->limite ?></td>
                        <td><?= $prestamo->devolucion ?></td>
                        <td class="centrado">
                            <a href='/Libro/show/<?= $libro->id ?>'>Ver</a> -
                            <a href='/Libro/edit/<?= $libro->id ?>'>Editar</a> -         
                            <a href='/Libro/delete/<?= $libro->id ?>'>Borrar</a> 
                        </td>
                    </tr>
                <?php } ?>
                </table>
            <div class="centrado my2">
                <a class="button" onclick="history.back()">Atras</a>
                <a class="button" href="/Libro/list">Lista de libros</a>
            </div>
        </main>
        <?= $template->footer() ?>
    </body>