<?php

require_once("header.php");
require '../vendor/autoload.php';
require '../lib/function.php';

use lib\DB\Request;

if(!isset($_GET["id"])){
	err("Данные не получены");
}
$id = $_GET["id"];

$req = new Request();
$stm = $req->view($id);

function out($param) {
	return "<p>" . htmlentities($param, ENT_QUOTES, 'UTF-8'). "</p>";
}
while($row = $stm->fetch()) {
	if ($_SESSION['id'] != $row->id_user) {
		err("Запись пользователю не принадлежит");
	}
	echo out($row->name).out($row->id_user)
	. out($row->info)
	. out($row->subject)
	. out($row->description);

	echo "<p><a href='.'/upload/'.$row->path_f1'>Файл с докладом</a></p>";
	echo "<p><a href='$row->path_f2'>Файл с презентацией</a></p>";
}