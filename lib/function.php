<?php
function err($error) { ?>
    <div class="alert alert-warning" role="alert"><? echo $error;?></div>
    <? exit();
}

function hderr($error) {
    require_once("header.php");
    err($error);
}

function filetest ($filename, $maxsize, $filetypes, $mimetypes)
{
    $file = $_FILES[$filename];
    $mime = $file['type'];
    if (!in_array($mime, $mimetypes)) {
        hderr("Данный тип файлов не поддерживается ".$mime);
    }

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    if (!in_array($ext, $filetypes)) {
        hderr("Данный формат файлов не поддерживается ".$ext);
    }

    $uploaddir = "../upload/";
    $name = basename($file['name']);
    $filenew = $uploaddir.$name;
    $filesize = filesize($file['tmp_name']);
    if ($filesize > $maxsize) {
        hderr('Слишком большой '.$filesize.">".$maxsize);
    }
    if(!is_uploaded_file($file["tmp_name"])) {
        hderr("Ошибка загрузки файла");
    }
    if (!move_uploaded_file ($file['tmp_name'], $filenew)) {
        hderr("Ошибка загрузки файла ".$name);
    }

    return $name;
}