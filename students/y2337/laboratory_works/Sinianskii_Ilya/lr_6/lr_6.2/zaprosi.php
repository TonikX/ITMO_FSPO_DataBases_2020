<!DOCTYPE html>

<head>
	<title>Запросы</title>
</head>



<?php
        $host = 'host=localhost';
        $dbname= 'dbname=Библиотека';
        $dbuser = 'user=postgres';
        $dbpass = 'password=0000';
        $db = pg_connect("$host $dbname $dbuser $dbpass");



function table($query, $db)
{
		$result = pg_query($db, $query);
		echo '<table border=1>';
		echo '<tr>';
		for ($i=0; $i<pg_num_fields($result); $i++) {
			echo '<td>' . pg_field_name($result, $i) . '</td>';
		}
		echo '</tr>';
		while ($row = pg_fetch_row($result)) {
			echo '<tr>';
			foreach ($row as $field) {
				echo '<td>' . $field . '</td>';
			}
			echo '</tr>';
		}
		echo '</table>';
		echo '<br>';
}
echo " <h3> Запросы: </h3>";

echo "Вывести ФИО читателей, их возраст и дату рождения:<br/>";
$sql = 'select Читатели.ФИО, Читатели.Дата_рождения, age(Читатели.Дата_рождения)
 from Библиотека.Читатели';
table($sql, $db);

echo "Вывести название книги с наибольшем количеством экземпляров:<br/>";
$sql = 'SELECT Книги.Название, Книги.Число_экземпляров  
FROM "Библиотека"."Книги" 
where Книги.Число_экземпляров = (select max(Книги.Число_экземпляров) FROM "Библиотека"."Книги")';
table($sql, $db);

echo "Вывести ФИО посетителей, образование которых заполнено:<br/>";
$sql = 'select Читатели.ФИО, Читатели.Образование 
from Библиотека.Читатели group by Читатели.ФИО, Читатели.Образование 
having Читатели.Образование is not null';
table($sql, $db);

echo "Вывести ФИО читателей, их возраст и дату рождения:<br/>";
$sql = 'select Читатели.ФИО, Читатели.Дата_рождения, age(Читатели.Дата_рождения)
from Библиотека.Читатели';
table($sql, $db);

echo "Вывести название книги с наибольшем количеством экземпляров:<br/>";
$sql = 'SELECT Книги.Название, Книги.Число_экземпляров  
FROM "Библиотека"."Книги" 
where Книги.Число_экземпляров = (select max(Книги.Число_экземпляров) FROM "Библиотека"."Книги")';
table($sql, $db);

pg_close($db);

?>

<body>
	<form action="index.html">
		<button type="submit">Назад</button>
	</form>
</body>