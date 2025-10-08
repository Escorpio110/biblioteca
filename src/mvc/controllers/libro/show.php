<?php
    if (empty($_GET['id'])) {
        throw new NothingToFindException("Flta el libro, pedazo de SUBNORMAL");
    
        
    }
    $id = intval($_GET['id']);

    if (empty($libro = Libro::find($id))) {
        throw new NotFoundException("Para que buscas un libro que no existe. SUBNORMAL");
        
    }
    require '../views/libro/detalles.php';

    #$libros = Libro::findOrFail(intval($_GET['id']), "Ups que pena no se ha encontrado tu librito :P");
    #require '../views/libro/detalles.php';