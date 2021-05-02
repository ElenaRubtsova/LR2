<?php

require '../vendor/autoload.php';

$post = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$email = $post['email'];
$password = $post['password'];

use lib\DB\User;

$db = new User();
$db->authorize($email,$password);

header("Location: index.php");
