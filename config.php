<?php
//URL
class url {
	var $BASE_URL = "http://localhost/social";
	var $IMAGES = "images";
}
$url = new url();
//Database setting
    $DB_HOST = "localhost"; //Адрес сервера MySQL
    $DB_USER = "Grigory"; //Имя пользователя базы данных
    $DB_PASS = "pass"; //Пароль пользователя БД
    $DB_NAME = "123"; //База данных
//Data
    $date = mktime(0,0,0,date("m"),date("d"),date("Y")+5);
//Admin setting
    $admin_name = "admin";
	$admin_pass = "pass";
//Database connect
	$dbcnx = @mysql_connect ($DB_HOST, $DB_USER, $DB_PASS);
	if (!$dbcnx)
	{
		exit ("<p>В настоящий момент сервер базы данных не доступен, поэтому корректное отображение страницы невозможно.</p>");
	}
	if (!@mysql_select_db($DB_NAME,$dbcnx)) 
	{
	    exit ("<p>В настоящий момент база данных не доступна, поэтому корректное отображение страницы невозможно.</p>");
	}
?>