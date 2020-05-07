<?php
include_once "config.php";
include_once "errorlist.php";
require_once "modules/rate.php";
session_start();
/*if ($_SESSION['security']==1){
	echo $_SESSION['security'];
	session_destroy();
}*/
$x = mysql_query("SELECT * FROM profiles");
$num_rows = mysql_num_rows($x);
if ($num_rows < 4) {
	echo "<link rel=\"stylesheet\" href=\"css\style.css\">";
	echo $errors[2];
	echo "<p align=\"center\"><a href=\"admin.php\">Смотреть рейтинги</a></p>";
	exit;
}
/*
if ($_POST[Number] = $ddd) {
	$security = 1;
	$error = $errors[6];
}
*/
$y = rand(1,$num_rows);
$y1 = rand(1,$num_rows);
/*while ($y = $_POST['Number'] and $y = $_POST['Number2']) {
	    $y = rand(1,$num_rows);
}
while ($y1 = $_POST['Number'] and $y1 = $_POST['Number2']) {
	    $y1 = rand(1,$num_rows);
}*/
while ($y == $y1) {
		$y1 = rand(1,$num_rows);
	}
$z = mysql_query("SELECT * FROM profiles WHERE Number='".$y."' LIMIT 1");
$q = mysql_query("SELECT * FROM profiles WHERE Number='".$y1."' LIMIT 1");
$a = mysql_fetch_assoc($z);
$b = mysql_fetch_assoc($q);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PhotoVote</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div id="logotype">
<h1>PhotoVote</h1>
</div>
<div id="error_div"><?=$error?></div>
</br>
<div id="content" align="center">
<div id="menu">
  <ul id="hmenu">
    <li><a href="admin.php">Смотреть рейтинги</a></li>
    <li><a href="admin.php?act=rate">10 самых</a></li>
	<li><a href="help.php">Помощь</a></li>
  </ul>
</div>
<table width="600" border="0" cellspacing="5" cellpadding="0" align="center">
  <tr id="name" align="center">
    <td>
    <?php echo "<b>".$a['NS']."</b>" ?>
    </td> 
    <td>
    <?php echo "<b>".$b['NS']."</b>" ?>
    </td>
   </tr>
  <tr align="center">
    <td width="300"><a href="profile.php?id=<?=$a[Number]?>"><img src="<?=$a[Photo]?>" /></a></td>
    <td width="300"><a href="profile.php?id=<?=$b[Number]?>"><img src="<?=$b[Photo]?>" /></a></td>
  </tr>
   <tr align="center">
    <td align="center">
<?php 
$rateObj = new percentage();
$rate = $a[Rating];
$rateObj->rate($rate);
?>
<div align="center" id="rate"><div id="rate_text"><?=$rate?></div><div><div id="rate_left" style="width:<?=$rateObj->rate_left?>%;"></div><div id="rate_right" style="width:<?=$rateObj->rate_right?>%;"></div></div></div></br>
    </td>
    <td align="center">
<?php
$rateObj = new percentage();
$rate = $b[Rating];
$rateObj->rate($rate);
?>
<div align="center" id="rate"><div id="rate_text"><?=$rate?></div><div><div id="rate_left" style="width:<?=$rateObj->rate_left?>%;"></div><div id="rate_right" style="width:<?=$rateObj->rate_right?>%;"></div></div></div></br>
    </td>
   </tr>
    <tr align="center">
    <td>
    <form method="post">
        <input type="submit" name="v1a" id="button" value="Голосовать +1" />
        <input type="hidden" name="Number" value="<?= $a[Number] ?>" />
        <input type="hidden" name="Number2" value="<?= $b[Number] ?>" />
     </form>
     <form method="post">
        <input type="submit" name="v5a" id="button" value="Голосовать +5" />
        <input type="hidden" name="Number" value="<?= $a[Number] ?>" />
        <input type="hidden" name="Number2" value="<?= $b[Number] ?>" />
    </form>
    <td> 
    <form method="post" >
        <input type="submit" name="v1b" id="button" value="Голосовать +1" />
        <input type="hidden" name="Number" value="<?= $b[Number] ?>" />
        <input type="hidden" name="Number2" value="<?= $a[Number] ?>" />
     </form>
     <form method="post">
        <input type="submit" name="v5b" id="button" value="Голосовать +5" />
        <input type="hidden" name="Number" value="<?= $b[Number] ?>" />
        <input type="hidden" name="Number2" value="<?= $a[Number] ?>" />
    </form>
    </td>
   </tr>
</table>
<form>
<input type="button" value="Перезагрузить" onclick="ReloadButton()">
<script>
function ReloadButton(){location.href="index.php";}
</script>
</form>
<div id="comment">
<?php
$query = mysql_query("SELECT * FROM comments ORDER BY id_comment DESC LIMIT 10");
echo "<table width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";
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
	echo "
  <tr onmouseover=\"this.bgColor='#e4ffff';\" onmouseout=\"this.bgColor='#ECFFFF';\" onclick=\"location.href='\profile.php?id=".$comment[id_profile]."'\";\">
    <td>".$comment[name]."</td>
    <td>".$comment[comment]."</td>
  </tr>
";
}
echo "</table>";
?>
</div>
<br  />
<!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t44.6;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet' "+
"border='0' width='31' height='31'><\/a>")
//--></script><!--/LiveInternet-->
</div>
</body>
</html>
<?php
if ($_POST['v1a'] != NULL or $_POST['v5a'] != NULL or $_POST['v1b'] != NULL or $_POST['v5b'] != NULL){
$i = mysql_query("SELECT Rating FROM profiles WHERE Number='".$_POST['Number']."'");
$result = mysql_result($i,0);
$rate = array();
$rate[a] = $result + 1;
$rate[b] = $result + 5;
}
    if(isset($_POST['v1a']) and $_SESSION['security'] !== $_POST['Number'] and $_SESSION['security'] !== $_POST['Number2']) {
		mysql_query("UPDATE profiles SET Rating = ".$rate[a]." WHERE Number=".$_POST[Number]."");
		$_SESSION['security'] = $_POST['Number'];
		$_SESSION['security2'] = $_POST['Number2'];
	}
	if(isset($_POST['v5a']) and $_SESSION['security'] !== $_POST['Number'] and $_SESSION['security'] !== $_POST['Number2']) {
		mysql_query("UPDATE profiles SET Rating = ".$rate[b]." WHERE Number=".$_POST[Number]."");
		$_SESSION['security'] = $_POST['Number'];
		$_SESSION['security2'] = $_POST['Number2'];
	}
	if(isset($_POST['v1b']) and $_SESSION['security'] !== $_POST['Number'] and $_SESSION['security'] !== $_POST['Number2']) {
		mysql_query("UPDATE profiles SET Rating = ".$rate[a]." WHERE Number=".$_POST[Number]."");
		$_SESSION['security'] = $_POST['Number'];
		$_SESSION['security2'] = $_POST['Number2'];
	}
	if(isset($_POST['v5b']) and $_SESSION['security'] !== $_POST['Number'] and $_SESSION['security'] !== $_POST['Number2']) {
		mysql_query("UPDATE profiles SET Rating = ".$rate[b]." WHERE Number=".$_POST[Number]."");
		$_SESSION['security'] = $_POST['Number'];
		$_SESSION['security2'] = $_POST['Number2'];
		/*mysql_query("INSERT INTO ip VALUES ('".$_SERVER['REMOTE_ADDR']."', '".$_POST[Number]."')");*/
	}
?>