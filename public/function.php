<?php

function filetest ($filename, $maxsize, $filetypes)
{
    $file = $_FILES[$filename];
    $name = basename($file['name']);
    $uploaddir = "../upload/";
    $ext = pathinfo($name, PATHINFO_EXTENSION);
    $filenew = $uploaddir.$name;
    $filesize = filesize($file['tmp_name']);

    if ($filesize > $maxsize) {
        exit('Слишком большой '.$filesize.">".$maxsize);
    }
    if (!in_array($ext, $filetypes)) {
        exit("<p>Данный формат файлов не поддерживается</p>");
    }
    if(!is_uploaded_file($file["tmp_name"])) {
        exit("<p>Ошибка загрузки файла</p>");
    }

    if (!move_uploaded_file ($file['tmp_name'], $filenew)) {
        exit("<p>Ошибка загрузки файла $filenew</p>");
    }
    return $name;
}