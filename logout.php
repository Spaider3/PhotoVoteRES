<?php
if ($_GET["act"] == logout){
      setcookie ("admin_name");
	  setcookie ("admin_pass");
      header ("Location: admin.php");
    }
?>