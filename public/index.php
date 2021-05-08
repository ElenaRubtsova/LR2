<?php
require_once("header.php");
require_once("../vendor/autoload.php");
require_once("../config/admin.php");

use lib\DB\Request;

if ($_SESSION['id'] == null): ?>
  <h2>Главная страница</h2><br>
  <p class="bd-lead">
Добро пожаловать!<br>Сайт предназначен для докладчиков конференций.</p><p> Вы докладчик? Тогда нажмите на кнопку Авторизация вверху страницы. Потребуется ввести почту и пароль.</p><p>Вы впервые оказались на этом сайте? Перейдите по ссылке с надписью Регистрация и внимательно заполните все приведённые поля.</p>
<?php else:
  $request = new Request();
  if ($_SESSION['login'] == $login):
    $array = $request->all();
  else:
    ?><button type="button" class="btn btn-default"><a href='form-add-request.php'>Добавить заявку</a></button><?
    $array = $request->by_id($_SESSION['id']);
  endif;
 ?>
  <h2>Список заявок</h2>
  <table id="requestTable" class="table table-striped" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">№
      </th>
      <th class="th-sm">Название
      </th>
      <th class="th-sm">Информация
      </th>
      <th class="th-sm">Тематика
      </th>
      <th class="th-sm">Описание
      </th>
    </tr>
  </thead>
  <tbody>
<?php
  foreach ($array as $k => $v) {
    echo "<tr><td>" .htmlentities($v['id'], ENT_QUOTES, 'UTF-8')
    . "</td><td>" .htmlentities($v['name'], ENT_QUOTES, 'UTF-8')
    . "</td><td>" .htmlentities($v['info'], ENT_QUOTES, 'UTF-8')
    . "</td><td>" .htmlentities($v['subject'], ENT_QUOTES, 'UTF-8')
    . "</td><td>" .htmlentities($v['description'], ENT_QUOTES, 'UTF-8')
    . "</td></tr>";
  }?>
  </tbody>
<? endif;
require_once("body.php");
?>

