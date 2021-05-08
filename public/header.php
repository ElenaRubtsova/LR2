<?php
header("Content-Type: text/html; charset=UTF-8");
?>
<!DOCTYPE html>
<html lang="ru">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha512-Dop/vW3iOtayerlYAqCgkVr2aTr2ErwwTYOvRFUpzl2VhCMJyjQF0Q9TjUXIo6JhuM/3i0vVEt2e/7QQmnHQqw==" crossorigin="anonymous">
	<!-- Дополнительные стили (не обязательно) -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha512-iy8EXLW01a00b26BaqJWaCmk9fJ4PsMdgNRqV96KwMPSH+blO82OHzisF/zQbRIIi8m0PiO10dpS0QxrcXsisw==" crossorigin="anonymous">


	<nav class="navbar navbar-dark bg-dark">
		<?php if ($_SESSION['id'] == null): ?>
			<ul class="nav nav-pills justify-content-center">
				<li <?if ($_SERVER[REQUEST_URI]=="/index.php") {echo "class='active'";}?>><a href="index.php">Главная</a></li>
				<li <?if($_SERVER[REQUEST_URI]=="/registration.php") {echo "class='active'";}?>><a href="registration.php">Регистрация</a></li>
				<li <?if($_SERVER[REQUEST_URI]=="/authorization.php") {echo "class='active'";}?>><a href="authorization.php">Авторизация</a></li></ul>
				<?php else: ?>
						<span class="navbar-text">
						Здравствуйте, <?= htmlspecialchars($_SESSION['login']) ?></span>
					<ul class="nav nav-pills">
						<li><a href="exit.php">Выйти</a></li></ul>
					<?php endif; ?></nav>

	<title>Сайт для докладчиков конференций</title>
	<main class="col-12" role="main">
</head>
<body>