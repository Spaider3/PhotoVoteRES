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
<script type="text/javascript" src="js/function.js"></script>
</head>
<body>
<?php 
	if ($online == 1) {
		include_once "auth2.html";	
	}
	else {
		include_once "auth1.html";
	}
?>
<?php
if ($online == 1) {
echo "<div id=\"hint\" align=\"center\">Не загрузайте изображения с одинаковыми именами. Изображения должны быть в формате jpg.</div>";
}
?>
<div id="error_div"><?=$error?></div>
<?php
if ($online == 1) {
echo "
<div id=\"load\" align=\"center\">
<form method=\"post\" action=\"editor.php\" enctype=\"multipart/form-data\"> 
<table width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
  <tr>
    <td>Ф.И.<input name=\"NS\" type=\"text\"></td>
    <td>Фото<input name=\"photo\" type=\"file\"></td>
    <td><input name=\"send\" type=\"submit\" value=\"Добавить\"></td>
  </tr>
</table>
</form>
</div> ";
}
?>
<div id="content" align="center">
<div id="menu_2">
  <ul id="hmenu">
    <li><a href="index.php">На главную</a></li>
    <li><a href="admin.php">Смотреть рейтинги</a></li>
    <li><a href="admin.php?act=rate">10 самых</a></li>
	<li><a href="help.php">Помощь</a></li>
  </ul>
</div>
<table width="800" id="admin_cp" border="0" cellspacing="2" cellpadding="0">
  <tr align="center">
    <th>№</th>
    <th>Ф.И.</th>
    <th>Фото</th>
    <th>Суммарный рейтинг</th>
<?php if ($online == 1) {
    echo "<th>Редактировать</th>";
}
?>
</tr>
<?php
include_once "modules/pagination.php";
?>
</table>
<div id="pagination">
<?php
if ($_GET["act"] != rate) {
// Проверяем нужны ли стрелки назад  
if ($page != 1) $pervpage = '<a href=?page=1><<</a>  
                               <a href=?page='. ($page - 1) .'><</a> ';  
// Проверяем нужны ли стрелки вперед  
if ($page != $total) $nextpage = ' <a href=?page='. ($page + 1) .'>></a>  
                                   <a href=?page=' .$total. '>>></a>';  

// Находим две ближайшие станицы с обоих краев, если они есть  
if($page - 2 > 0) $page2left = ' <a href=?page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';  
if($page - 1 > 0) $page1left = '<a href=?page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';  
if($page + 2 <= $total) $page2right = ' | <a href=?page='. ($page + 2) .'>'. ($page + 2) .'</a>';  
if($page + 1 <= $total) $page1right = ' | <a href=?page='. ($page + 1) .'>'. ($page + 1) .'</a>'; 

// Вывод меню  
echo $pervpage.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$nextpage;
}
?>
</div>
</div>
</body>
</html>