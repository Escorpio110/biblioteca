<?php
    if (empty($_POST["guardar"])) {
        throw new FormException('Escribe algo en el formulario, SUBNORMAL');

    }
    $libro = new Libro();

    $libro->isbn       = $_POST['isbn'];
    $libro->titulo     = $_POST['titulo'];
    $libro->editorial  = $_POST['editorial'];
    $libro->autor      = $_POST['autor'];
    $libro->idioma     = $_POST['idioma'];
    $libro->edicion    = $_POST['edicion'];
    $libro->edadrecomendada = $_POST['edadrecomendada'];

    $libro->save();

    $mensaje = "GUARDADO DEL LIBRO $libro->titulo CON ÉXITO";
    require '../views/exito.php';