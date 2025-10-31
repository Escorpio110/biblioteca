<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Lista de libros - <?= APP_NAME ?></title> 

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Lista de libros en <?= APP_NAME ?>">
        <meta name="author" content="Robert Sallent">
        <script src="/js/Preview.js"></script>
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
            $libro->titulo,
            'Editar libro' => null  
        ]) ?>
        <?= $template->messages() ?>
        <main>
            <h1><?= APP_NAME ?></h1>
            <h2>Editar libro <?= $libro->titulo ?></h2>
            <section class="flex-container gap2">
                <form method="POST" action="/Libro/update/" enctype="multipart/form-data" class="flex2 no-border">
                    <input type="hidden" name="id" value="<?= $libro->id ?>">

                    <label for="isbn">ISBN:</label>
                    <input type="text" name="isbn" value="<?= old('isbn', $libro->isbn) ?>">
                    <br>
                    <label for="titulo">Título:</label>
                    <input type="text" name="titulo" value="<?= old('titulo', $libro->titulo) ?>">
                    <br>
                    <label for="editorial">Editorial:</label>
                    <input type="text" name="editorial" value="<?= old('editorial', $libro->editorial) ?>">
                    <br>
                    <label for="autor">Autor:</label>
                    <input type="text" name="autor" value="<?= old('autor', $libro->autor) ?>">
                    <br>
                    <label>Portada</label>
                    <input type="file" name="portada" accept="images/*" id="file-with-preview">
                    <br>
                    <label for="idioma">Idioma:</label>
                    <input type="text" name="idioma" value="<?= old('idioma', $libro->idioma) ?>">
                    <br>
                    <label for="edicion">Edición:</label>
                    <input type="text" name="edicion" value="<?= old('edicion', $libro->edicion) ?>">
                    <br>
                    <label for="anyo">Año:</label>
                    <input type="number" name="anyo" value="<?= old('anyo', $libro->anyo) ?>">
                    <br>
                    <label for="edadrecomendada">Edad recomendada:</label>
                    <input type="text" name="edadrecomendada" value="<?= old('edadrecomendada', $libro->edadrecomendada) ?>">
                    <br>
                    <label for="paginas">Páginas:</label>
                    <input type="number" name="paginas" value="<?= old('paginas', $libro->paginas) ?>">
                    <br>
                    <label for="caracteristicas">Características:</label>
                    <input type="text" name="caracteristicas" value="<?= old('caracteristicas', $libro->caracteristicas) ?>">
                    <br>
                    <label>Tema</label>
                    <select name="idtema">
                        <?php
                            foreach($listaTemas as $nuevoTema){
                                echo "<option value'$nuevoTema->id'>$nuevoTema->tema</option>";
                            }
                        ?>
                    </select>
                    
                    <br>
                    <label for="sinopsis">Sinopsis:</label>
                    <textarea name="sinopsis" class="w50"><?= old('sinopsis', $libro->sinopsis) ?></textarea>
                    <br>
                    <div class="centrado m1">
                        <input class="button" type="submit" name="Actualizar" value="Actualizar">
                        <input class="button" type="reset" name="reset" value="Reset">
                    </div>
                </form>
                <figure class="flex1 centrado">
                    <img src="<?= BOOK_IMAGE_FOLDER.'/'.($libro->portada ?? DEFAULT_BOOK_IMAGE)?>"
                         class="cover enlarge-image" id="preview-image" alt="Previsualicion de la portada">
                    <figcaption>Portada</figcaption>

                    <?php if ($libro->portada) {?>
                    <form method="POST" action="Libro/dropcover" class="no-border">
                        <input type="hidden" name="id" value="<?=$libro->id?>">
                        <input type="submit" class="button-danger" name="borrar" value="Eliminar portada">
                    </form>
                    <?php }?>
                    
                </figure>
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
                <form class="w50 m0 no-border" method="POST" action="/Libro/addtema">
                    <input type="hidden" name="idlibro" value="<?= $libro->id ?>">
                    <select name="idtema">
                        <?php
                            foreach($listasTemas as $nuevoTema){
                                echo "<option value='$nuevoTema->id'>$nuevoTema->tema</option>\n";
                            }
                        ?>
                    </select>
                    <input class="button-success" type="submit" name="add" value="Añadir tema">
                </form>
            </section>


            <section>
                <script>
                    function confirmar(id) {
                        if (confirm('Seguro que quieres eliminar?')) {
                            location.href= '/Ejemplar/destroy'+id
                        }
                    }
                </script>
                <h2>Ejemplares <?= $libro->titulo ?></h2>
                <a class="button" href="/ejemplar/create/<?= $libro->id ?>">Nuevo Ejemplar</a>
                
                <?php 
                    if(!$ejemplares){
                        echo "<div class='warning p2'><p>No hay ejemplares</p></div>";
                    }else{
                ?>
                    <table class="table w100 centred-block">
                        <tr>
                            <th>ID</th><th>Año</th><th>Precio</th><th>Estado</th><th>Operaciones</th>
                        </tr>
                        <?php foreach($ejemplares as $ejemplar){ ?>
                            <tr>
                                <td><?= $ejemplar->id ?></td>
                                <td><?= $ejemplar->anyo?></td>
                                <td><?= $ejemplar->precio?> €</td>
                                <td><?= $ejemplar->estado?></td>
                                <td class="centred">
                                    <?php if(!$ejemplar->hasAny('Prestamo')) { ?>
                                        <a onclick="confirmar(<?= $ejemplar->id ?>)">Borrar</a>
                                    <?php }?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>         
                <?php } ?>
            </section>
            
            <div class="centrado">
                <a class="button" onclick="history.back()">Atras</a>
                <a class="button" href="/Libro/list">Lista de libros</a>
                <a class="button" href="/Libro/show/<?= $libro->id ?>">Detalles</a>
                <a class="button" href="/Libro/delete/<?= $libro->id ?>">Borrar</a>
                
            </div>
        </main>
        <?= $template->footer() ?>
    </body>
</html>