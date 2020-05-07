<?php
if(isset($_POST['submit'])) 
{
	$username = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
//Сравниваем пароли 
    if($admin_name == $username and $admin_pass == $password) { 
//Ставим куки
			setcookie("admin_name", "$admin_name");
			setcookie("admin_pass", "$admin_pass");
			header ("Location: admin.php");
    } 
    else 
    { 
        $error = $errors[0];
    } 
}
unset ($login,$password);
?>