<?php
include_once "config.php";
include_once "errorlist.php";
include_once "check.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PhotoVote</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div id="error_div"><?=$error?></div>
<div id="content">
<h3 align="center">Вы редактируете id:<?=$_GET[num]?></h3>
<!--<p align="center">Поля со звёздочкой обязательны для заполнения.</p>-->
<form action="editor.php" method="post" enctype="multipart/form-data">
<table width="400" border="0" cellspacing="0" cellpadding="5" align="center">
  <tr>
    <td>Имя/Фамилия</td>
    <td><input name="NS" type="text" /></td>
  </tr>
    <tr>
    <td>Фото</td>
    <td><input name="photo" type="file" /></td>
  </tr>
    <tr>
    <td>Рейтинг</td>
    <td><input name="rate" type="text" /></td>
  </tr>
</table>
<?php
if ($online == 1) {
	echo "
	<input name=\"num\" type=\"hidden\" value='".$_GET[num]."' />
	<input name=\"edit\" type=\"hidden\" value=\"1\" />";
}
?>
<p align="center"><input type="submit" value="Изменить" /></p>
</form>
</div>
</body>
</html>