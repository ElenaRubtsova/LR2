<?php
  require_once("header.php");
  if ($_SESSION['id']!=null) {
    exit("<p>Вы авторизованы, для регистрации нужно сначала выйти из профиля</p>");
}
?>
<html>
<body>
<h2>Регистрация</h2>
<?php if ($submitted && !$authenticated): ?>
    <div class="alert">
        Invalid credentials.
    </div>
<?php endif; ?>
<form action="saveses.php" method="post">
  <p>
    <label>Ваше имя:<br></label>
    <input name="name" type="text" size="30" maxlength="50"
    required="required">
  </p>
  <p>
    <label>Ваш email:<br></label>
    <input name="email" type="email" size="30" maxlength="50" required="required">
  </p>
  <p>
    <label>Ваш пароль:<br></label>
    <input name="password" type="text" size="30" maxlength="50" required="required">
  </p>
  <p>
    <label>Повторите пароль:<br></label>
    <input name="passwordrep" type="text" size="30" maxlength="50" required="required">
  </p>
  <p>
    <input name="checkbox" type="checkbox" required="required">
    <label>Даю своё согласие на обработку персональных данных<br></label>
  </p>
<p>
<input type="submit" name="submit" value="Отправить">
</p></form>
<br>
</body>
</html>
