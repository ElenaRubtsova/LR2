<?php
if (!isset($_SESSION['id'])) {
   header("Location: index.php");
}
require_once("../config/const.php");
require_once("../vendor/autoload.php");
require_once("../lib/function.php");

use lib\DB\Request;

$path_1 = filetest('file', $maxsize1, $filetypes1, $mimetypes1);
$path_2 = filetest('file1', $maxsize2, $filetypes2, $mimetypes2);

$id = $_GET['id'];
$post = filter_var_array($_POST, FILTER_SANITIZE_STRING);
$name = $_POST['name'];
$subject = $_POST['list'];
$description = $_POST['description'];
$info = $_POST['info'];

$request = new Request();
$id = $request->insert($name, $description, $info, $subject, $path_1, $path_2, $_SESSION['id']);

header("Location: view-request.php?id=$id");
