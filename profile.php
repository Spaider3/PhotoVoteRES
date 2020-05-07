<?php
session_start();
include_once "config.php";
include_once "errorlist.php";
include_once "check.php";
require_once "modules/rate.php";
if ($_GET["act"] == delete) {
	if ($online == 1) {
	$query = "DELETE FROM comments WHERE id_comment='".$_GET["del"]."';";
	$delete = mysql_query($query);
	}
}
$x = mysql_query("SELECT * FROM profiles");
$num_rows = mysql_num_rows($x);
if ($_GET[id] == NULL or $_GET[id] > $num_rows or preg_match( '/[^0-9]/', $_GET[id])) {
	$number = 1;
}
else {
	$number = $_GET[id];
}
$z = mysql_query("SELECT * FROM profiles WHERE Number='".$number."' LIMIT 1");
$a = mysql_fetch_assoc($z);
$query = mysql_query("SELECT * FROM comments WHERE id_profile = '".$a[Number]."' ORDER BY 'id_comment' ASC");
if(count($_POST)>0) {
	if(isset($_SESSION['captcha_keystring']) && $_SESSION['captcha_keystring'] == $_POST['keystring']) {
		if ($_POST['Name'] == NULL or $_POST['Text'] == NULL) {
		$error = $errors[5];
		}
		elseif ($_POST['Name'] != NULL and $_POST['Text'] != NULL) {
		$name = htmlspecialchars($_POST['Name']);
		$text = nl2br(htmlspecialchars($_POST['Text']));
		$id = $a[Number];
		mysql_query("INSERT INTO comments VALUES ('', '".$name."', '".$text."', '".$id."');");
		header ("Location: profile.php?id=".$_GET[id]."");
		}
	}
	else {
		$error = $errors[4];
	}
}
unset($_SESSION['captcha_keystring']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PhotoVote | <?=$a[NS]?></title>
<link rel="stylesheet" type="text/css" href="css/style_profile.css"/>
<script type="text/javascript" src="js/function.js"></script>
</head>
<body>
<div id="container">
   <div id="header"><?=$a[NS]?><div id="menu"><?php if ($online == 1) {echo " / <a href=\"admin.php\">В админку</a>";};?> / <a href="index.php">На главную</a><?php if ($online == 1) {echo " / <a href=\"?act=logout\">Выход</a> / ";};?></div></div>
   <div id="content">
   <div id="error_div"><?=$error?></div>
   <div id="comment">
<?php
   while ($comment = mysql_fetch_array($query)) {
$comment[comment] = wordwrap($comment[comment], 60, "<br />", 1);
//Smiles
$comment[comment] = strtr($comment[comment], array(
    ':)'=>'<img src="images/smiles/1.gif" />',
    ':('=>'<img src="images/smiles/2.gif" />',
    ':-D'=>'<img src="images/smiles/3.gif" />',
    '*devil*'=>'<img src="images/smiles/4.gif" />',
    '*yahoo*'=>'<img src="images/smiles/yahoo.gif" />',
	'script'=>'XSS',
    'js'=>'XSS'
));
//Echo
if ($online == 1) {
	$delete = "<div id=\"delete\"><a href=\"?id=".$_GET[id]."&act=delete&del=".$comment[id_comment]."\"><img src=\"images/delete1.gif\" width=\"21\" height=\"21\" onmouseover=\"obj=this; appear(1);\" onmouseout=\"disappear(0.5);\"  style=\"opacity: 0.5; filter: alpha(opacity=0.5);\"/></a></div>";
}
   echo "
   <div id=\"name\">".$comment[name]."".$delete."</div>
   <div id=\"comm\">".$comment[comment]."</div>";
   $hint[hi]=1;
   }
   ?>
</div>
   <?php
   if ($hint[hi] == NULL) {
	  echo $hint[0];
   }
   ?>
<div id="post"> 
  <form name="comment" method="post" action="" onsubmit="return false">
<table align="center" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td>Имя:</td>
    <td><input name="Name" type="text" <?php if($online==1){echo"value=\"Mr.Green\"";} ?>/></td>
  </tr>
  <tr>
    <td>Текст:</td>
    <td><textarea name="Text" cols="30" rows="4"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><img src="kcaptcha/?<?php echo session_name()?>=<?php echo session_id()?>"></td>
  </tr>
  <tr>
    <td>Текст с изображения:</td>
    <td><input type="text" name="keystring"></td>
  </tr>
</table>
<p align="center"><a href="#" id="submit_comment" class="button">Добавить комментарий</a></p>
</form>
</div>
 </div>
   <div id="photo">
   <div id="avatar">
   <img src="<?=$a[Photo]?>" width="200"/>
   </div>
<?php 
$rateObj = new percentage();
$rate = $a[Rating];
$rateObj->rate($rate);
?>
<div align="center" id="rate"><div id="rate_text"><?=$rate?></div><div><div id="rate_left" style="width:<?=$rateObj->rate_left?>%;"></div><div id="rate_right" style="width:<?=$rateObj->rate_right?>%;"></div></div></div></br>
   </div>
   <div id="footer">&copy; Mr.Green</div>
</div>
<script>
document.getElementById('submit_comment').onclick = comment;
</script>
</body>
</html>