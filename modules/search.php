<?php
include_once "config.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Поиск</title>
<script type="text/javascript" src="js/search.js"> </script>
</head>
<body>
<?php
$searchq = $_GET['name'];
$getName = mysql_query('SELECT * FROM profiles WHERE NS LIKE "%'.addslashes($searchq).'%"');
while ($row = mysql_fetch_array($getName))
    echo $row['name']. '<br/>';
?>
<div align="center">
<h2>Ajax Search Engine</h2>
<form id="searchForm" name="searchForm" method="post" action="javascript:insertTask();">
<div class="searchInput">
<input name="searchq" type="text" id="searchq" size="30" onkeyup="javascript:searchNameq()"/>
<input type="button" name="submitSearch" id="submitSearch" value="Search" onclick="javascript:searchNameq()"/>
</div>
</form>
<h3>Search Results</h3>
<div id="msg">Type something into the input field</div>
<div id="search-result"></div>
</div>
</body>
</html>