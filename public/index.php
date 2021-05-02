<?php
require_once("header.php");
require_once("../vendor/autoload.php");
require_once("../config/admin.php");

use lib\DB\Request;

$request = new Request();

  if ($_SESSION['login'] == $login):
    $array = $request->all();
  else:
    $ref = 'form-add-request.php';
    $array = $request->by_id($_SESSION['id']);
  endif;?>
<html>
<body>
<h2>Главная страница</h2>
<?php if ($_SESSION['id']==null): ?>
  Добро пожаловать! Сайт предназначен для докладчиков конференций. Вы докладчик? Тогда нажмите на кнопку Авторизация вверху страницы. Потребуется ввести почту и пароль. Вы впервые оказались на этом сайте? Перейдите по ссылке с надписью Регистрация и внимательно заполните все приведённые поля.<br>
<?php else: ?>
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
    echo "</tbody>";
  }
echo "<a href='$ref'>Добавить заявку</a><br>";
endif;
 ?>
</body>
</html>
