<?php
//Функция подключения к бд PostgreSQL
function connectToDB($dbuser1, $dbpass1, $host1, $dbname1) {
	$pdo = new PDO("pgsql:host=$host1;dbname=$dbname1", $dbuser1, $dbpass1);
	return $pdo;
}
// Функция отрисовки таблицы по sql запросу
function selecting($pdo, $sql) {
	$result = $pdo->query($sql);
	$result_mass = $result->fetchAll(pdo::FETCH_ASSOC);
	$keys = array_keys($result_mass[0]);
	echo "<table>";
	foreach($keys as $title) {
		echo "<th>$title</th>";
	}
	echo "</tr>";
	foreach($result_mass as $line) {
		echo "<tr>";
		foreach($line as $col_value) {
			echo "<td>$col_value</td>";
		}
		echo "</tr>";
	}
	echo "</table><br>";
}
?>