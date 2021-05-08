<?php
  require_once("header.php");
  if ($_SESSION['id']!=null) {
    exit("<p>Вы авторизованы, для регистрации нужно сначала выйти из профиля</p>");
}
?>
<div class="row">
  <div class="col-xs-3 col-sm-4 col-md-5 col-lg-5"></div>
  <div class="col-xs-3 col-sm-4 col-md-5 col-lg-5"><h2>Регистрация</h2><br></div>
</div>

<form class="form-horizontal" action="saveses.php" method="post">

  <div class="form-group">
    <label for="inputName" class="col-xs-3 control-label">Ваше имя:</label>
    <div class="col-xs-8 col-sm-7">
      <input type="text" name="name" class="form-control" id="inputName" placeholder="Введите полное имя" required="required"></div></div>

  <div class="form-group">
    <label for="email" class="col-xs-3 control-label">Ваш email:</label>
    <div class="col-xs-8 col-sm-7">
      <input type="email" name="email" class="form-control" placeholder="Введите email" required="required"></div></div>

  <div class="form-group">
    <label for="password" class="col-xs-3 control-label">Ваш пароль:</label>
    <div class="col-xs-8 col-sm-7">
      <input type="text" name="password" class="form-control" placeholder="Введите пароль" required="required"></div></div>

  <div class="form-group">
    <label for="passwordrep" class="col-xs-3 control-label">Повторите пароль:</label>
    <div class="col-xs-8 col-sm-7">
      <input type="text" class="form-control" name="passwordrep" placeholder="Введите пароль ещё раз" required="required"></div></div>

  <div class="form-group">
    <div class="col-xs-offset-3 col-xs-9">
      <div class="checkbox">
        <label><input type="checkbox" required="required">Даю своё согласие на обработку персональных данных</label>
      </div></div></div>

  <div class="form-group">
    <div class="col-xs-offset-3 col-xs-9">
      <button type="submit" class="btn btn-default">Отправить</button></div></div></form>
</body>
</html>
