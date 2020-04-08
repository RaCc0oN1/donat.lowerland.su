<?php
$dbhost = "localhost"; // Имя хоста для подключения к БД
$dbusername = "iluksa_mybb1"; // Пользователь базы данных
$dbpass = "BH&fY5c&"; // Пароль к базе данных
$dbname = "iluksa_mybb1"; // Имя базы данных

$dbconnect = mysql_connect ($dbhost, $dbusername, $dbpass);
if (!$dbconnect) { echo ("Wrong connection!"); }
 
if(@mysql_select_db($dbname)) { echo "Sucsessful connection $dbname !"; }
else die ("Can't connection to $dbname!");
 
?>