<?php
if (!isset($_COOKIE['admin_name'])) 
{
	$online = 0;
}
elseif ($_COOKIE['admin_name'] == $admin_name) {
   if ($_COOKIE['admin_pass'] == $admin_pass) {
   $online = 1;
   }
}
else {
$online = 0;
}
if	($online == 1) {
	include_once "logout.php";
}
else {
	include_once "login.php";
}
?>