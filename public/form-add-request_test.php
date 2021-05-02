<?php

require_once("../config/const.php");
require_once("../vendor/autoload.php");
require_once("function.php");

use lib\DB\One;
use lib\DB\Two;
use lib\DB\Request;

$path_1 = filetest('file', $maxsize1, $filetypes1);
$path_2 = filetest('file1', $maxsize2, $filetypes2);

$post = filter_var_array($_POST, FILTER_SANITIZE_STRING);
$name = $_POST['name'];
$subject = $_POST['list'];
$description = $_POST['description'];
$info = $_POST['info'];

$one = new One($name, $description, $info);
$two = new Two($subject, $path_1, $path_2);
$request = new Request();
$request->insert($one, $two, $_SESSION['id']);

header("Location: view-request.php");
