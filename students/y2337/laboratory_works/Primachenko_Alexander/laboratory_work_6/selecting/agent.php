<!DOCTYPE html>
<html>
    <head>
        <title>BDBD Lab 6</title>
        <meta http-equiv="Content Type" content="text/html;charset=UNICODE" />
    </head>
    <body>

	<h2>Вывод всех Агентов Биржы</h2>
	<form action="../index.html">
		<button type = "submit"><-- Назад на главную</button>
	</form>
	<br>

	<?php	
		$host = 'host=localhost';
		$dbname= 'dbname=Birzha';
		$dbuser = 'user=postgres';
		$dbpass = 'password=123456';
		$db = pg_connect("$host $dbname $dbuser $dbpass");

		//Вывод всех значений
		$query = 'select * from public."ExchangesAgent" order by id asc';
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
    </body>
</html>