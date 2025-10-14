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
            'Socios' => null
        ]) ?>
        <?= $template->messages() ?>
        <main>
            <h1><?= APP_NAME ?></h1>
            <h2>Lista de Usuarios</h2>
            <?php if($socios){ ?>
                <table class="table w100">
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Poblacion</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th class="centrado">Operaciones</th>
                    </tr>
                <?php foreach($socios as $socio){ ?>
                    <tr>
                        <td><?= $socio->dni ?></td>
                        <td><?= $socio->nombre ?></a></td>
                        <td><?= $socio->poblacion ?></td>
                        <td><?= $socio->telefono ?></td>
                        <td><?= $socio->email ?></td>
                        <td class="centrado">
                            <a href='/Socio/show/<?= $libro->id ?>'>Ver</a> -
                            <a href='/Libro/edit/<?= $libro->id ?>'>Editar</a> -         
                            <a href='/Libro/delete/<?= $libro->id ?>'>Borrar</a> 
                        </td>
                    </tr>
                <?php } ?>
                </table>
            <?php } else { ?>
                <div class="danger p2">
                    <p>No hay libros que mostrar.</p>
                </div>
            <?php } ?>
            <div class="centred">
                <a class="button" onclick="history.back()">Atras</a>
            </div>
        </main>
        <?= $template->footer() ?>
    </body>
</html>