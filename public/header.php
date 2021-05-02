<?php
header("Content-Type: text/html; charset=UTF-8");
?>
<head>
  <title>Сайт для докладчиков конференций</title>
  <?php if ($_SESSION['id'] == null): ?>
	<a href="registration.php">Регистрация</a>
	<a href="authorization.php">Авторизация</a>
  <?php else: ?>
    <strong>Здравствуйте, <?= htmlspecialchars($_SESSION['login']) ?></strong>
    <a href="exit.php">Выйти</a>
  <?php endif; ?>
</head>