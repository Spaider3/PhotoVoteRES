<?php
include_once "config.php";
include_once "errorlist.php";
include_once "check.php";
error_reporting(0);
ini_set('display_errors', 0);
if ($online == 1) {
$NS = htmlspecialchars($_POST['NS']);
$rate = htmlspecialchars($_POST['rate']);
$edit = htmlspecialchars($_POST['edit']);
#Убираем лишние пробелы
$FILES['photo']['name'] = str_replace(' ', '', trim($FILES['photo']['name']));
if ($_FILES['photo']['name'] == NULL) {
	if ($edit == NULL) {
		if ($NS != NULL) {
	        $query = "INSERT INTO profiles VALUES ('', '".$NS."', 'images/nophoto.jpg', '0');";
		}
		else {
			$error = $errors[1];
		}
	}
	if ($edit != NULL) {
        if ($NS != NULL) {
	        $query = "UPDATE profiles SET NS = '".$NS."', Rating = '".$rate."' WHERE Number=".$_POST[num].".;";
		}
	    else {
			$query = "UPDATE profiles SET Rating = '".$rate."' WHERE Number=".$_POST[num].".;";
		}
	}
	if ($query != NULL) {
	mysql_query ($query);
	}
    header ("Location: admin.php");
	}
elseif ($_FILES['photo']['name'] != NULL) {
	if ($edit == NULL) {
		if ($NS != NULL) {
            $query = "INSERT INTO profiles VALUES ('', '".$NS."', 'images/upload_profiles/".$_FILES['photo']['name']."', '0');";
		}
		else {
			$error = $errors[1];
		}
	}
	elseif ($edit != NULL) {
		if ($NS != NULL) {
	        $query = "SELECT Photo FROM profiles WHERE Number=".$_POST["num"]."";
	        $delete = mysql_query($query);
	        $deletephoto = mysql_result($delete,0,'Photo');
	        if ($deletephoto != "images/nophoto.jpg") {
	        unlink ($deletephoto);
	        }
	        $query = "UPDATE profiles SET NS = '".$NS."', Photo = 'images/upload_profiles/".$_FILES['photo']['name']."', Rating = '".$rate."' WHERE Number=".$_POST[num].".;";
	    }
		else {
		    $query = "SELECT Photo FROM profiles WHERE Number=".$_POST["num"]."";
	        $delete = mysql_query($query);
	        $deletephoto = mysql_result($delete,0,'Photo');
	        if ($deletephoto != "images/nophoto.jpg") {
	        unlink ($deletephoto);
	        }
		    $query = "UPDATE profiles SET Photo = 'images/upload_profiles/".$_FILES['photo']['name']."', Rating = '".$rate."' WHERE Number=".$_POST[num].".;";
		}
#Определяем размер фотографии — ширину и высоту
$size=GetImageSize ($_FILES['photo']['tmp_name']);
#Создаём новое изображение из «старого»
$src=ImageCreateFromJPEG ($_FILES['photo']['tmp_name']);
#Берём числовое значение ширины фотографии, которое мы получили в первой строке и записываем это число в переменную
$iw=$size[0];
#Проделываем ту же операцию, что и в предыдущей строке, но только уже с высотой.
$ih=$size[1];
#Ширину фотографии делим на 150 т.к. на выходи мы хотим получить фото шириной в 150 пикселей. В результате получаем коэфициент соотношения ширины оригинала с будущей превьюшкой.
$koe=$iw/200;
#Делим высоту изображения на коэфициент, полученный в предыдущей строке, и округляем число до целого в большую сторону — в результате получаем высоту нового изображения.
$new_h=ceil ($ih/$koe);
#Создаём пустой изображени шириной в 150 пикселей и высотой, которую мы вычислили в предыдущей строке.
$dst=ImageCreateTrueColor (200, $new_h);
#Данная функция копирует прямоугольную часть изображения в другое изображение, плавно интерполируя пикселные значения таким образом, что, в частности, уменьшение размера изображения сохранит его чёткость и яркость.
ImageCopyResampled ($dst, $src, 0, 0, 0, 0, 200, $new_h, ImageSX ($src), ImageSY ($src));
#Сохраняем полученное изображение в формате JPG
ImageJPEG ($dst, "images/upload_profiles/".$_FILES['photo']['name']."", 100);
if ($query != NULL) {
mysql_query ($query);
}
header ("Location: admin.php");
}
else {
	$error = $errors[1];
}
}
}
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
<div align="center"><input type="button" value="Назад" onclick="history.go(-1);"></div>
</body>
</html>