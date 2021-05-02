<?php
if (isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}
require_once("header.php");
 ?>
<form action="test.php" method="post">
  <p>
    <label>Ваш email:<br></label>
    <input name="email" type="text" size="30" maxlength="50" required="required">
  </p>
  <p>
    <label>Ваш пароль:<br></label>
    <input name="password" type="text" size="30" maxlength="50" required="required">
  </p>
<p>
<input type="submit" name="submit" value="Войти">
<br>
</p></form>