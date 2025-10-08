<?php
    if (empty($_POST["actualizar"])) {
        throw new FormException('Escribe algo en el formulario, SUBNORMAL');

    }
    $libro = Libro::findOrFail(intval($_POST['id']), "No se encuentra el libro que quieres actualizar, SUBNORMAL");

    $libro->isbn            = $_POST['isbn'];
    $libro->titulo          = $_POST['titulo'];
    $libro->editorial       = $_POST['editorial'];
    $libro->autor           = $_POST['autor'];
    $libro->idioma          = $_POST['idioma'];
    $libro->edicion         = intval($_POST['edicion']);
    $libro->edadrecomendada = intval($_POST['edadrecomendada']);
    
    $libro->update();

    $mensaje = "ACTUALIZACIÓN DEL LIBRO $libro->titulo CON ÉXITO";
    require '../views/exito.php';