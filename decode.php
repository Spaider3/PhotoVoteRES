<?php
$data = "%D1%82%D0%B5%D1%81%D1%82";
$data = mb_convert_encoding(urldecode($data), 'cp-1251', 'utf-8');
echo $data;
?>