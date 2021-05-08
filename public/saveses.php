<?php

require_once("../vendor/autoload.php");
require_once("../lib/function.php");

use lib\DB\User;

$post = filter_var_array($_POST, FILTER_SANITIZE_STRING);
if ($post['password']!=$post['passwordrep'])
{
	hderr("Пароли не совпали");
}
if (strlen($post['password'])<6)
{
	hderr("Пароль слишком короткий: нужно ввести минимум 6 символов");
}
if (ctype_digit($post['password']))
{
	hderr("Пароль не должен состоять только из цифр");
}
if(!preg_match('/^[а-яё -]++$/ui',$post['name']))
{
	hderr("Имя пользователя введено неверно: допустимы только русские буквы, пробелы и дефисы");
}
$name = $post['name'];
$email = filter_var($post['email'], FILTER_SANITIZE_EMAIL);
$password = $post['password'];

$db = new User();
$error = $db->registrate($name, $email, $password);
if($error) {
	hderr($error);
}

header('Location: index.php');