<a href="/">Назад</a>
<?php 

require_once('funcs.php');

$host = 'host=localhost';
$dbname= 'dbname=Hotel';
$dbuser = 'user=postgres';
$dbpass = 'password=password';
$db = pg_connect("$host $dbname $dbuser $dbpass");


echo "<h3>Запросы</h3>";

echo "Вывести все о продуктах с самым большим количеством.";
echo "<table border=1>
<tr><th>id продукта</th><th>Наименование</th><th>Категория</th><th>Стоимость</th><th>Количество</th></tr>";

$sql = 'SELECT * FROM "Продукты" WHERE "Количество" = (SELECT max("Количество") FROM "Продукты")';

table($sql, $db);

echo "</table><br>";

echo "Вывести всю информацию об уборщиках у которых заполнена национальность.";
echo "<table border=1>
<tr><th>ФИО_уборщика</th><th>ФИО_Администратора</th><th>Нацио-нальность</th><th>Возраст</th></tr>";

$sql = 'SELECT "ФИО_уборщика", "ФИО_Администратора", "Национальность", "Возраст" FROM public."Уборщик" GROUP BY "ФИО_уборщика", "Национальность" having "Национальность" is not null';

table($sql, $db);

echo "</table><br>";

echo "Вывести всю информацию о номерах, если id номера совпадает с этажем.";
echo "<table border=1>
<tr><th>Id_номера</th><th>Этаж</th><th>Цена</th><th>Тип</th></tr>";

$sql = 'SELECT "Id_номера", "Этаж", "Цена", "Тип" FROM public."Номер" WHERE "Id_номера" = ANY (SELECT "Этаж" FROM public."Номер")';

table($sql, $db);

echo "</table><br>";

echo "Вывод ФИО администратора, даты и кол-ва дней из таблицы засе-ление, исключая дубликаты.";
echo "<table border=1>
<tr><th>ФИО_администратора</th><th>Дата</th><th>Кол-во_дней</th></tr>";

$sql = 'SELECT DISTINCT "ФИО_администратора", "Дата", "Кол-во_дней" FROM public."Заселение"';

table($sql, $db);

echo "</table><br>";

echo "Вывод всех номеров паспортов без повторений из таблиц Заселе-ние и Человек";
echo "<table border=1>
<tr><th>Номер_паспорта</th></tr>";

$sql = 'SELECT "Номер_паспорта" FROM public."Заселение" UNION SELECT "Номер_паспорта" FROM public."Человек"';

table($sql, $db);

echo "</table><br>";

?>