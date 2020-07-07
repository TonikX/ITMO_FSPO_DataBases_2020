<!DOCTYPE html>
<html>
    <head>
        <title>BDBD Lab 6</title>
        <meta http-equiv="Content Type" content="text/html;charset=UNICODE" />
    </head>
    <body>

	<h2>Запросы</h2>
	<form action="../index.html">
		<button type = "submit"><-- Назад на главную</button>
	</form>
    <br>
    

    <div>Запрос 1. Вывести имена брокеров, их процент и бюро, в которых они состоят. Отсортировать результат по проценту в порядке возрастания.</div>
	<?php	
		$host = 'host=localhost';
		$dbname= 'dbname=Birzha';
		$dbuser = 'user=postgres';
		$dbpass = 'password=123456';
		$db = pg_connect("$host $dbname $dbuser $dbpass");

		//Вывод всех значений
		$query = 'select "Broker".name, "BrokersBureu".name, "Broker".percent from public."Broker", public."BrokersBureu" where "Broker".bureu_id = "BrokersBureu".id order by "Broker".percent asc';
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

    <div>Запрос 2. Вывести названия всех продуктов, доставленных до истечения срока годности.</div>
	<?php	
		$host = 'host=localhost';
		$dbname= 'dbname=Birzha';
		$dbuser = 'user=postgres';
		$dbpass = 'password=123456';
		$db = pg_connect("$host $dbname $dbuser $dbpass");

		//Вывод всех значений
		$query = 'select "Product".name, "Product".production_date, "Product".best_before_date, "Product".shipment_date from public."Product" where "Product".shipment_date is not null and "Product".shipment_date < "Product".best_before_date';
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
    
    <div>Запрос 3. Вывести имена всех представителей биржи в верхнем регистре.</div>
	<?php	
		$host = 'host=localhost';
		$dbname= 'dbname=Birzha';
		$dbuser = 'user=postgres';
		$dbpass = 'password=123456';
		$db = pg_connect("$host $dbname $dbuser $dbpass");

		//Вывод всех значений
		$query = 'select upper("ExchangesAgent".name) as "Name" FROM public."ExchangesAgent"';
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

    <div>Запрос 4. Вывести брокеров чей процент, что они отдают бюро, ниже среднего.</div>
	<?php	
		$host = 'host=localhost';
		$dbname= 'dbname=Birzha';
		$dbuser = 'user=postgres';
		$dbpass = 'password=123456';
		$db = pg_connect("$host $dbname $dbuser $dbpass");

		//Вывод всех значений
		$query = 'SELECT "Broker".name as "Name", "Broker".percent as "%" FROM public."Broker" WHERE "Broker".percent < (SELECT AVG("Broker".percent) FROM public."Broker" );';
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

    <div>Запрос 5. Вывести Представителей Биржи, у которых полностью совпадает имя с каким-либо из Брокеров, и, соответственно, наоборот.</div>
	<?php	
		$host = 'host=localhost';
		$dbname= 'dbname=Birzha';
		$dbuser = 'user=postgres';
		$dbpass = 'password=123456';
		$db = pg_connect("$host $dbname $dbuser $dbpass");

		//Вывод всех значений
		$query = 'SELECT "ExchangesAgent".name as "Name" FROM public."ExchangesAgent" WHERE "ExchangesAgent".name = ANY(SELECT "Broker".name FROM public."Broker")';
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