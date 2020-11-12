<!DOCTYPE html>

<head>
	<title>Удаление</title>
</head>

<body>
	<form action="index.html">
		<button type="submit">Назад</button>
	</form>
	
	<h3>Введите id ученика, информацию о котором хотите удалить:</h3>
	<form name="insert" action="delete.php" method="POST">
		<input type="text" name="id_ученика"/><br>
		<button type = "submit">Удалить</button>
    </form>
    <br>
</body>

<?php

        $host = 'host=localhost';
        $dbname= 'dbname=school';
        $dbuser = 'user=admin';
        $dbpass = 'password=root';
        $db = pg_connect("$host $dbname $dbuser $dbpass");
		
		if($_POST != NULL)
        {
            if($result = pg_delete($db, "Ученик", $_POST))
                echo 'Запись удалена';
            else
                echo 'Ошибка!';
            $_POST = NULL;
        }
		$query = 'select * from public."Ученик" order by "Фамилия" asc';
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