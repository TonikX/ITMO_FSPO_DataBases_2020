<!DOCTYPE html>
<head>
	<title>Запросы</title>
</head>
<body>
	<form action="1.html">
	<button type = "submit">Назад</button>
	</form>
</body>
<?php
$host='localhost';
$dbname='postgres';
$dbuser='postgres';
$dbpass='1234';

$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser,$dbpass);

function table($sql, $pdo) {
	$book = $pdo->query($sql);
	$result = $book->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $line) {
		echo "<tr>";
		foreach($line as $col_value) {
			echo "<td>$col_value</td>";
		}
		echo "</tr>";
		}
	echo "</table><br>";
}

echo '1. Вывести наименование компании и имя сотрудника, который в ней работает';
$sql = 'select "Company"."Name", "Company_worker"."Full_name" from public."Company", public."Company_worker" where "Company"."ID_company"="Company_worker"."ID_Company" order by "Company_worker"."Full_name"';
echo "<table><tr><td>Company name</td><td>Employee name</td>";
table($sql,$pdo);

echo '2. Вывести все данные из таблицы Company_worker, где id_работника>1 и id_компании<2';
$sql = 'select * from public."Company_worker" where ("ID_Company_worker">1 and "ID_Company"<3)';
echo "<table><tr><td>ID_Company_worker</td><td>ID_company</td><td>Full_name</td><td>Passport_data</td>";
table($sql,$pdo);

echo '3. Вывести разницу в днях происшествия';
$sql = 'select current_date - "Incident_date" as "Разница_в_днях",current_date,"Incident_date" from public."Insurance_case"';
echo "<table><tr><td>Interval</td><td>Today's date</td><td>Date of issue</td>";
table($sql,$pdo);

?>