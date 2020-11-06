<!DOCTYPE html>

<head>
	<title>Добавление</title>
</head>

<body>
	<form action="index.html">
		<button type="submit">Назад</button>
	</form>
	
		<h2>Введите информацию о книге:</h2>
		
		    <form name="insert" action="add.php" method="POST">
				Введите номер_зала:<br>
				<input type="text" name="Номер_зала"/><br>
				Введите вместимость:<br>
				<input type="text" name="Вместимость"/><br>
				Введите название:<br>
				<input type="text" name="Название"/><br>
				<button type = "submit">Добавить запись</button>
			</form>
    <br>

		
		


<?php

        $host = 'host=localhost';
        $dbname= 'dbname=Библиотека';
        $dbuser = 'user=postgres';
        $dbpass = 'password=0000';
        $db = pg_connect("$host $dbname $dbuser $dbpass");


        if($_POST != NULL)
        {
            if($result = pg_insert($db, "Библиотека.Читальные_залы", $_POST))
                echo 'Запись добавлена';
            else
                echo 'Ошибка!';
            $_POST = NULL;
        }
        
		$query = 'select * from "Библиотека"."Читальные_залы" order by "Номер_зала" asc';
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