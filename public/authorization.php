<?php
if (isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}
require_once("header.php");
if ($error) {
  echo "<script type='text/javascript'>alert('$message');</script>";
}?>
<div class="row">
  <div class="col-xs-3 col-sm-4 col-md-5 col-lg-5"></div>
  <div class="col-xs-3 col-sm-4 col-md-5 col-lg-5"><h2>Авторизация</h2><br></div>
</div>
<form class="form-horizontal needs-validation" action="test.php" method="post" novalidate>
  <div class="form-group">
    <label for="email" class="col-xs-3 control-label">Ваш email:</label>
    <div class="col-xs-8 col-sm-7">
      <input type="email" name="email" class="form-control" placeholder="Введите email" required="required">
      <div class="valid-feedback">
        Это поле заполнено</div>
      <div class="invalid-feedback">
        Введите верно данные здесь</div></div></div>

  <div class="form-group">
    <label for="password" class="col-xs-3 control-label">Ваш пароль:</label>
    <div class="col-xs-8 col-sm-7">
      <input type="password" name="password" class="form-control" placeholder="Введите пароль" required="required">
      <div class="valid-feedback">
        Это поле заполнено</div>
      <div class="invalid-feedback">
        Введите верно данные здесь</div></div></div>

  <div class="form-group">
    <div class="col-xs-offset-3 col-xs-9">
      <button type="submit" class="btn btn-default" name='submit'>Отправить</button></div></div>
</form>

    <script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<? require_once("body.php") ?>