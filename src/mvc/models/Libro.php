<?php
    #[\AllowDynamicProperties]
    class Libro extends Model{
        protected static $fillable = [
            'isbn' ,'titulo' ,'editorial','idioma',
            'autor','edicion','anyo','edadrecomenndada',
            'portada','caracteristicas','sinopsis','paginas'
        ];
    }
