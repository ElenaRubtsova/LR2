<?php

require_once("header.php");

$post = filter_var_array($_POST, FILTER_SANITIZE_STRING);
if ($post['password']!=$post['passwordrep'])
{
	exit("<p>Пароли не совпали</p>");
}
if (strlen($post['password'])<6)
{
	exit("<p>Пароль слишком короткий: нужно ввести минимум 6 символов</p>");
}
if (ctype_digit($post['password']))
{
	exit("<p>Пароль не должен состоять только из цифр</p>");
}
if(!preg_match('/^[а-яё -]++$/ui',$post['name']))
{
	exit ("<p>Имя пользователя введено неверно: допустимы только русские буквы, пробелы и дефисы</p>");
}
$name = $post['name'];
$email = filter_var($post['email'], FILTER_SANITIZE_EMAIL);
$password = $post['password'];

require_once("../vendor/autoload.php");

use lib\DB\User;

$db = new User();
$db->registrate($name, $email, $password);
header('Location: index.php');
