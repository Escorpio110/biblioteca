<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Lista de libros - <?= APP_NAME ?></title> 

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Lista de libros en <?= APP_NAME ?>">
        <meta name="author" content="Robert Sallent">
       
        <script src="/js/BigPicture.js"></script>

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
            'Libros' => '/Libro/list',
            $libro->titulo => NULL
        ]) ?>
        <?= $template->messages() ?>
        
        <main>

            <h1><?= APP_NAME ?></h1>


            <section id="detalles " class="flex-container gap2">
                <div class="flex2">
                    <h2><?= $libro->titulo ?></h2>
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
                </div>

                <figure class="flex1 centrado p2">
                    <img src="<?=BOOK_IMAGE_FOLDER.'/'.($libro->portada ?? DEFAULT_BOOK_IMAGE)?>"
                         class="cover enlarge-image" alt="Portada de <?= $libro->titulo ?>" 
                         title="Portada de <?= $libro->titulo ?>">
                         <figcaption>Portada de <?= "$libro->titulo, de $libro->autor" ?></figcaption>
                </figure>     
            </section>

            <section>
                <h2>Sinopsis</h2>
                <p><?= $libro->sinopsis ? paragraph($libro->sinopsis) : 'SIN DETALLES' ?></p>
            </section>
            
            <section>
                <h2>Ejemplares <?= $libro->titulo ?></h2>
                <?php 
                    if(!$ejemplares){
                        echo "<div class='warning p2'><p>No hay ejemplares</p></div>";
                    }else{
                ?>
                    <table class="table w100 centred-block">
                        <tr>
                            <th>ID</th><th>Año</th><th>Precio</th><th>Estado</th>
                        </tr>
                        <?php foreach($ejemplares as $ejemplar){ ?>
                            <tr>
                                <td><?= $ejemplar->id ?></td>
                                <td><?= $ejemplar->anyo?></td>
                                <td><?= $ejemplar->precio?> €</td>
                                <td><?= $ejemplar->estado?></td>
                            </tr>
                        <?php } ?>
                    </table>         
                <?php } ?>
            </section>

            <section id="temas">
                <h2>Temas en <?= $libro->titulo ?></h2>
                <?php 
                    if(!$temas){
                        echo "<div class='warning p2'><p>No hay ejemplares</p></div>";
                    }else{
                ?>
                    <table class="table w100 centred-block">
                        <tr>
                            <th>ID</th><th>Tema</th>
                        </tr>
                        <?php foreach($temas as $tema){ ?>
                            <tr>
                                <td><?= $tema->id ?></td>
                                <td><a href='/Tema/show/<?= $tema->id ?>'><?= $tema->tema ?></a></td>
                            </tr>
                        <?php } ?>
                    </table>         
                <?php } ?>
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