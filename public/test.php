<?php

require '../vendor/autoload.php';
require_once("../lib/function.php");

use lib\DB\User;

$post = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$email = $post['email'];
$password = $post['password'];

$db = new User();
$error = $db->authorize($email, $password);

if($error) {
	hderr($error);
}
header("Location: index.php");
