<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content Type" content="text/html;charset=UNICODE" />
    </head>
    <body>

	<h2>Запросы</h2>
	<form action="index.html">
		<button type="submit">Назад</button>
	</form>
	</form>
    <br>
    

    <div>Запрос 1. Сортировка учеников c сортировкой по фамилии:</div>
	<?php	
		$host = 'host=localhost';
       		$dbname= 'dbname=school';
        	$dbuser = 'user=postgres';
        	$dbpass = 'password=root';
        	$db = pg_connect("$host $dbname $dbuser $dbpass");

		//Вывод всех значений
		$query = 'SELECT "№класса", "Фамилия", "Имя", "Отчество" FROM "Ученик" order by "Фамилия" ';
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
		//Конец вывода всех значений

		pg_close($db);
    ?>
    <br>

    <div>Запрос 2. Кол-во преподователей по каждой дисцеплине:</div>
	<?php	
		$host = 'host=localhost';
       		$dbname= 'dbname=school';
        	$dbuser = 'user=postgres';
        	$dbpass = 'password=root';
        	$db = pg_connect("$host $dbname $dbuser $dbpass");

		//Вывод всех значений
		$query = '(select count(*), "предмет" from public."учитель" group by "предмет")';
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
		//Конец вывода всех значений

		pg_close($db);
    ?>
    <br>
     <div>Запрос 3. Количество мальчиков и девочек в каждом классе:</div>
	<?php	
		$host = 'host=localhost';
       		$dbname= 'dbname=school';
        	$dbuser = 'user=postgres';
        	$dbpass = 'password=root';
        	$db = pg_connect("$host $dbname $dbuser $dbpass");

		//Вывод всех значений
		$query = 'select "№класса", "пол", count("пол") from public."Ученик" group by "пол", "№класса"';
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
		//Конец вывода всех значений

		pg_close($db);
    ?>
    <br>

    <div>Запрос 4.Количество профильных и базовых дисцеплин:</div>
	<?php	
		$host = 'host=localhost';
       		$dbname= 'dbname=school';
        	$dbuser = 'user=postgres';
        	$dbpass = 'password=root';
        	$db = pg_connect("$host $dbname $dbuser $dbpass");

		//Вывод всех значений
		$query = 'select "вид", count(*) from public."предмет" group by "вид"';
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
		//Конец вывода всех значений

		pg_close($db);
    ?>
    <br>

    <div>Запрос 5. Список учитилей:</div>
	<?php	
		$host = 'host=localhost';
       		$dbname= 'dbname=school';
        	$dbuser = 'user=postgres';
        	$dbpass = 'password=root';
        	$db = pg_connect("$host $dbname $dbuser $dbpass");

		//Вывод всех значений
		$query = 'SELECT "id_учителя", "ФИО", "предмет", "классное_руководство", "id_предмета"
	FROM public."учитель"';
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
		//Конец вывода всех значений

		pg_close($db);
    ?>
    <br>


    </body>
</html>