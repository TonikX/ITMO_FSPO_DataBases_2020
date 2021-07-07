<?php
require "dbfunctions.php";
$database = connectToDB('postgres', '1234', 'localhost', 'Hotel');
$sql1 = 'select a."ФИО_уборщика", b."Id_номера", a."Время" from public."Уборка" a inner join "Номер" b using ("Id_номера") where (select extract(year from "Время")) > 2019 and (select extract(hour from "Время")) > 1';
$sql2 = 'select a."Наименование", b."Время", b."Id_номера" from public."Продукты" a inner join "Заказ" b using ("Id_продукта") where b."Id_номера" = 3 and (select extract (month from b."Время")) = 3 and (select extract (year from b."Время")) = 2020';
$sql3 = 'select a."ФИО_человека", c."Id_номера", c."Этаж" from public."Заселение" b inner join "Человек" a using ("Номер_паспорта") inner join "Номер" c using ("Id_номера") where c."Этаж" = 2 and c."Тип" = \'Люкс\'';
$sql4 = 'select distinct a."ФИО_администратора", b."Id_номера" from public."Заселение" inner join "Администратор" a using ("ФИО_администратора") inner join "Номер" b using ("Id_номера") where b."Id_номера" = 1 and a."Пол" = \'Мужской\'';
$sql5 = 'select a."Наименование", b."Время", b."Id_номера" from public."Продукты" a inner join "Заказ" b using ("Id_продукта") where b."Id_номера" = 2 and (select extract (month from b."Время")) = 4 and (select extract (year from b."Время")) = 2019';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Queries</title>
</head>
<body>
	<a href="index.php">Menu</a>
<p>Запрос 1: Вывести ФИО уборщиков, id номеров и время уборки в тех случаях, когда уборка проходила раньше часа дня любого дня 2019 года</p>
<p><?=selecting($database, $sql1)?></p>
<p>Запрос 2: Вывести все заказы, сделанные в марте 2020 года в 3 номер</p>
<p><?=selecting($database, $sql2)?></p>
<p>Запрос 3: Вывести список человек, заселившихся в люкс на втором этаже</p>
<p><?=selecting($database, $sql3)?></p>
<p>Запрос 4: Вывести всех администраторов мужского пола, которые заселяли постояльцев в первый номер</p>
<p><?=selecting($database, $sql4)?></p>
<p>Запрос 5: Вывести все продукты, которые были заказаны в номер с ID = 2 в апреле 2019 года</p>
<p><?=selecting($database, $sql5)?></p>
</body>
</html>