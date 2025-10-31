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
            <h2>Lista de libros</h2>
            <?php if($places){?>
                
                
                <script src="/js/Modal.js"></script>  
                <?php foreach($places as $place){ ?>
                    
                            <figure class="centrado">
                                <a href='/Place/show/<?= $place->id ?>'>
                                    <img src="<?=BOOK_IMAGE_FOLDER.'/'.($place->mainpicture ?? DEFAULT_BOOK_IMAGE)?>"
                                         class="table-image" alt="Portada de <?= $place->name ?>" 
                                         title="Portada de <?= $place->name ?>">
                                </a>
                            </figure>
                            
                        
                    
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