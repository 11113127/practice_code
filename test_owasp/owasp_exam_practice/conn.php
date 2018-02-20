<?php
$conn = mysql_connect('127.0.0.1', 'root', '') or die('Error with MySQL connection');
mysql_query("SET NAMES 'utf8'");
mysql_select_db('owasp');

date_default_timezone_set("Asia/Taipei");
?>
