<?php
// Переменная хранит число сообщений выводимых на станице
$num = 5;
// Извлекаем из URL текущую страницу
$page = $_GET['page'];
// Определяем общее число сообщений в базе данных
$result = mysql_query("SELECT COUNT(*) FROM profiles");
$posts = mysql_result($result, 0);
// Находим общее число страниц
$total = intval(($posts - 1) / $num) + 1;
// Определяем начало сообщений для текущей страницы
$page = intval($page);
// Если значение $page меньше единицы или отрицательно
// переходим на первую страницу
// А если слишком большое, то переходим на последнюю
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
// Вычисляем начиная к какого номера
// следует выводить сообщения
$start = $page * $num - $num;
// Выбираем $num сообщений начиная с номера $start
$result = mysql_query("SELECT * FROM profiles ORDER BY 'Number' ASC LIMIT $start, $num");
if ($_GET["act"] == rate) {
	$result = mysql_query("SELECT * FROM profiles ORDER BY rating DESC LIMIT 10");
}
// В цикле переносим результаты запроса в массив $id
while ($id[] = mysql_fetch_array($result));
$endnum = count($id);
if ($endnum == 5) {
	$a = 4;
}
	else {
		$a = $endnum - 1;
	}
for($i = 0; $i < $a; $i++)
{
echo "
    <tr align=\"center\">
    <td>".$id[$i]['Number']."</td>
    <td>".$id[$i]['NS']."</td>
    <td width=\"200\"><a href=\"profile.php?id=".$id[$i]['Number']."\"><img src=".$id[$i]['Photo']."></img></a></td>
    <td>".$id[$i]['Rating']."</td>";
    if ($online == 1) {echo "<td><a onclick=\"window.open('edit.php?act=edit&num=".$id[$i]['Number']."','Редактировать',' menubar=0, toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, width=450, height=250')\" id=\"href\">Редактировать</a></td>";}
echo "</tr>";
}
?>