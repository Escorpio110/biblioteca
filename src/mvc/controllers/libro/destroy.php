<?php
    if (empty($_POST["confirmarborrado"])) {
        throw new FormException('No se ha recibido confirmacion, SUBNORMAL');

    }
    $libro = Libro::findOrFail(intval($_POST['id']), "No se encuentra el libro que quieres borrar, SUBNORMAL");

    if($libro->hasAny('Ejemplar')) {
        throw new Exception("No se puede borrar el libro porque tiene ejemplares, SUBNORMAL");
    }

    $libro->deleteObject();
    $mensaje = "BORRADO DEL LIBRO $libro->titulo, de $libro->autor CON ÉXITO";
    require '../views/exito.php';
    