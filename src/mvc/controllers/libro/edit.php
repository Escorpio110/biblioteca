<?php
    $libro = Libro::findOrFail(intval($_GET['id']), "No se encuentra el libro que quieres editar, SUBNORMAL");

    require '../views/libro/actualizar.php';