<?php

require_once("header.php");
require '../vendor/autoload.php';

use lib\DB\Request;

$req = new Request();
$stm = $req->view();

function out($param) {
	return "<p>" . htmlentities($param, ENT_QUOTES, 'UTF-8'). "</p>";
}

while($row = $stm->fetch()) {
	echo out($row->name)
	. out($row->info)
	. out($row->subject)
	. out($row->description);

	echo "<p><a href='.'/upload/'.$row->path_f1'>Файл с докладом</a></p>";
	echo "<p><a href='$row->path_f2'>Файл с презентацией</a></p>";
}