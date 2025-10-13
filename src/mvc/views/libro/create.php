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
            <h2>Nuevo libro</h2>
            <form method="POST" enctype="multipart/form-data" action="/Libro/store">
                <div class="flex2">
                    <label for="isbn">ISBN:</label>
                    <input type="text" name="isbn" value="<?= old('isbn') ?>">
                    <br>
                    <label for="titulo">Título:</label>
                    <input type="text" name="titulo" value="<?= old('titulo') ?>">
                    <br>
                    <label for="editorial">Editorial:</label>
                    <input type="text" name="editorial" value="<?= old('editorial') ?>">
                    <br>
                    <label for="autor">Autor:</label>
                    <input type="text" name="autor" value="<?= old('autor') ?>">
                    <br>
                    <label for="idioma">Idioma:</label>
                    <select name="idioma">
                        <option value="Español" <?= oldSelected('idioma', 'Castellano') ?>>Castellano</option>
                        <option value="Catalán" <?= oldSelected('idioma', 'Catalán') ?>>Catalán</option>                        
                        <option value="Otros" <?= oldSelected('idioma', 'Otros') ?>>Otros</option>
                    </select>
                    <br>
                    <label for="edicion">Edición:</label>
                    <input type="text" name="edicion" value="<?= old('edicion') ?>">
                    <br>
                    <label for="anyo">Año:</label>
                    <input type="number" name="anyo" value="<?= old('anyo') ?>">
                    <br>
                    <label for="edadrecomendada">Edad recomendada:</label>
                    <input type="text" name="edadrecomendada" value="<?= old('edadrecomendada') ?>">
                    <br>
                    <label for="paginas">Páginas:</label>
                    <input type="number" name="paginas" value="<?= old('paginas') ?>">
                    <br>
                    <label for="caracteristicas">Características:</label>
                    <input type="text" name="caracteristicas" value="<?= old('caracteristicas') ?>">
                    <br>
                    <label for="sinopsis">Sinopsis:</label>
                    <textarea name="sinopsis" class="w50"><?= old('sinopsis') ?></textarea>
                    <div class="centre mt2">
                        <input type="submit" class="button" name="guardar" value="Giardar">
                        <input type="reset" class="button" value="Reset">
                    </div>
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