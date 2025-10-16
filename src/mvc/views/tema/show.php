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
            'Temas' => '/Tema/list',
            $tema->tema => NULL
        ]) ?>
        <?= $template->messages() ?>
        <main>










            <section>
                <?php 
                    if(!$libros){
                        echo "<div class='warning p2'><p>No hay ejemplares</p></div>";
                    }else{
                ?>
                    <table class="table w100 centred-block">
                        <tr>
                            <th>ID</th><th>Tema</th>
                        </tr>
                        <?php foreach($libros as $libro){ ?>
                            <tr>
                                <td><?= $libro->id ?></td>
                                <td><a href='/Libro/show/<?= $libro->id ?>'><?= $libro->titulo ?></a></td>
                            </tr>
                        <?php } ?>
                    </table>         
                <?php } ?>
            </section>
            








            
        </main>
        <?= $template->footer() ?>
    </body>
</html>