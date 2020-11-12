<!DOCTYPE html>

<head>
	<title>Добавление</title>
</head>

<body>
	<form action="index.html">
		<button type="submit">Назад</button>
	</form>
	
		<h2>Введите информацию о ученике:</h2>
		
		    <form name="insert" action="add.php" method="POST">
				Введите пол(Ж/М):<br>
				<input type="text" name="пол"/><br>
				Введите № класса:<br>
				<input type="text" name="№класса"/><br>
				Введите фамилию:<br>
				<input type="text" name="Фамилия"/><br>
				Введите имя:<br>
				<input type="text" name="Имя"/><br>
				Введите отчество:<br>
				<input type="text" name="Отчество"/><br>
				<button type = "submit">Добавить запись</button>
			</form>
    <br>

		
		


<?php

        $host = 'host=localhost';
        $dbname= 'dbname=school';
        $dbuser = 'user=postgres';
        $dbpass = 'password=root';
        $db = pg_connect("$host $dbname $dbuser $dbpass");


        if($_POST != NULL)
        {
            if($result = pg_insert($db, "Ученик", $_POST))
                echo 'Запись добавлена';
            else
                echo 'Ошибка!';
            $_POST = NULL;
        }
        
		$query = 'SELECT "id_ученика", "пол", "№класса", "Фамилия", "Имя", "Отчество"
	FROM public."Ученик"';
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
</body>
</html>