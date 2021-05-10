<!DOCTYPE html>
<html>
    <head>
        <title>Lab 6</title>
        <meta charset="UTF-8" />
    </head>
    <body>

	<h2>Редактирование</h2>
	<form action="/opbd/edit.php">
		<button name="type" value="Sobaka" type="submit">Собак</button>
		<button name="type" value="Club" type="submit">Клубов</button>
		<button name="type" value="Document_rodoslovnoi" type="submit">Документов родословной</button>
		<button name="type" value="Expert" type="submit">Экспертов</button>
		<button name="type" value="Hozyain" type="submit">Хозяинов</button>
		<button name="type" value="Medosmotr" type="submit">Медосмотров</button>
		<button name="type" value="Ocenka_Experta" type="submit">Оценок эксперта</button>
		<button name="type" value="Oplata" type="submit">Оплат</button>
		<button name="type" value="Poroda" type="submit">Пород</button>
		<button name="type" value="Ring" type="submit">Рингов</button>
		<button name="type" value="Sponsirovanie_vistavki" type="submit">Спонсирований выставок</button>
		<button name="type" value="Sponsor" type="submit">Спонсоров</button>
		<button name="type" value="Vistavka" type="submit">Выставок</button>
		<button name="type" value="Vistuplenie" type="submit">Выступлений</button>
		<button name="type" value="Vistuplenie_porodi_na_ringe" type="submit">Выступлений пород на рингах</button>
	</form>
    <br>

	<h2>Запросы</h2>
    <div>Запрос 1. Вывести ФИО хозяина, кличку и возраст собаки, имя хозяина которой начинается на I, возраст меньше 5 лет и которая хоть раз выступала на ринге с номером 1.</div>
	<?php	
		$host = 'host=localhost';
		$dbname= 'dbname=Sobaki';
		$dbuser = 'user=postgres';
		$dbpass = 'password=postgres';
		$db = pg_connect("$host $dbname $dbuser $dbpass");

		$query = 'SELECT h.familiya, h.imya, h.otchestvo, s.klichka, s.age FROM "Sobaka" s, "Hozyain" h WHERE h.id_hozyain=s.id_hozyain AND h.imya LIKE \'I%\' AND s.age < 5 AND EXISTS(SELECT 1 FROM "Vistuplenie" v WHERE v.id_sobaka=s.id_sobaka AND v.id_ring=1);';
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

		pg_close($db);
    ?>
    <br>

    <div>Вывести кличку и даты прививок и непройденного медосмотра собаки, разница между датой прививки и медосмотра которой минимальна.</div>
	<?php	
		$host = 'host=localhost';
		$dbname= 'dbname=Sobaki';
		$dbuser = 'user=postgres';
		$dbpass = 'password=postgres';
		$db = pg_connect("$host $dbname $dbuser $dbpass");

		$query = 'SELECT s.klichka, s.data_privivki, m.data_medosmotra, m.result FROM "Medosmotr" m, "Sobaka" s WHERE s.id_sobaka = m.id_sobaka AND m.result=\'-\' ORDER BY abs(s.data_privivki-m.data_medosmotra) ASC LIMIT 1;';
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

		pg_close($db);
    ?>
    <br>
    
    <div>Запрос 3. Вывести номер, тип и максимальную сумму оплаты участия в выставке человека, чья собака хоть раз не прошла медосмотр, для каждой выставки.</div>
	<?php	
		$host = 'host=localhost';
		$dbname= 'dbname=Sobaki';
		$dbuser = 'user=postgres';
		$dbpass = 'password=postgres';
		$db = pg_connect("$host $dbname $dbuser $dbpass");

		$query = 'SELECT o.id_vistavka, v.tip_vistavka, MAX(o.summa_oplati) FROM "Oplata" o INNER JOIN "Vistavka" v ON o.id_vistavka=v.id_vistavka WHERE EXISTS(SELECT 1 FROM "Medosmotr" m WHERE m.id_hozyain=o.id_hozyain AND m.result=\'-\') GROUP BY o.id_vistavka, v.tip_vistavka;';
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

		pg_close($db);
    ?>
    <br>

    <div>Запрос 4. Вывести все породы собак, которые принадлежат хотя бы одной собаке, хозяин которой родился в 1995 году или позже.</div>
	<?php	
		$host = 'host=localhost';
		$dbname= 'dbname=Sobaki';
		$dbuser = 'user=postgres';
		$dbpass = 'password=postgres';
		$db = pg_connect("$host $dbname $dbuser $dbpass");

		$query = 'SELECT p.nazvanie_poroda FROM "Poroda" p WHERE EXISTS (SELECT 1 FROM "Sobaka" s WHERE s.id_poroda=p.id_poroda AND (SELECT h.data_rozhdeniya FROM "Hozyain" h WHERE h.id_hozyain=s.id_hozyain)>\'1995-01-01\')';
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

		pg_close($db);
    ?>
    <br>

    <div>Запрос 5. Вывести клички собак и время их выступления на выставках, сумма спонсирования которых превышает 500000 рублей.</div>
	<?php	
		$host = 'host=localhost';
		$dbname= 'dbname=Sobaki';
		$dbuser = 'user=postgres';
		$dbpass = 'password=postgres';
		$db = pg_connect("$host $dbname $dbuser $dbpass");

		$query = 'SELECT s.klichka, t.vremya FROM "Vistuplenie" t, "Sobaka" s WHERE t.id_sobaka=s.id_sobaka AND EXISTS(SELECT 1 FROM "Sponsirovanie_vistavki" sv WHERE sv.id_vistavka = t.id_vistavka GROUP BY sv.id_vistavka HAVING SUM(sv.summa_sponsirovaniya)>500000);';
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

		pg_close($db);
    ?>
    <br>


    </body>
</html> 
