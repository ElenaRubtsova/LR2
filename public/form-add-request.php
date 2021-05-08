<?php
if ($_SESSION['id']==null) {
  header('Location: index.php');
  die();
}
require_once("header.php");?>

<form action="form-add-request_test.php" method="post" enctype="multipart/form-data">
  <p>
    <label>Название доклада:<br></label>
    <input class="form-control" name="name" type="text" size="30" maxlength="50"
    required="required">
  </p>
  <p>
    <label>Краткая информация о докладчике:<br>(место работы/учебы, дожность, достижения)<br></label>
    <textarea class="form-control" name="info" cols="40" rows="10" required="required"/></textarea>
  </p>
  <?php
  require_once("../config/const.php");
  $items = include('../config/config.php');
   ?>
  <p>
    <label>Тематика:</label>
    <select class="form-control" name='list'>
      <?php foreach ($items as $n => $opt) {
        printf('<option value="%s">%s</option>', $opt, $opt);
      } ?>
    </select>
  </p>
  <p>
    <label>Краткое описание доклада:<br></label>
    <textarea class="form-control" name="description" cols="40" rows="10" required="required"/></textarea>
  </p>
  <p>
    <label>Файл с текстом выступления:<br>
      (doc, docx, pdf, размер не более 10 Мб)<br> </label>
    <input type="hidden" name="MAX_FILE_SIZE" value=<?$maxsize1?> />
    <input name="file" type="file" required="required"/>
  </p>
  <p>
    <label>Файл с презентацией:<br>
      (ppt, ppx, pdf, размер не более 30 Мб)<br></label>
    <input class="form-control" type="hidden" name="MAX_FILE_SIZE" value=<?$maxsize2?> />
    <input class="form-control-file" name="file1" type="file" required="required"/>
  </p>
<p>
<input class="form-control" type="submit" name="submit" value="Отправить"/>
</p></form>
</body>