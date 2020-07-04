<!DOCTYPE html>
<html>
    <head>
        <title>BDBD Lab 6</title>
        <meta http-equiv="Content Type" content="text/html;charset=UNICODE" />
    </head>
    <body>

	<h2>Удалить запись из таблицы Продукт</h2>
	<form action="../index.html">
		<button type = "submit"><-- Назад на главную</button>
	</form>
	<br>

    <h3>Введите данные:</h3>
    <form name="insert" action="product.php" method="POST">
    Введите id записи, которую хотите удалить:<br>
    <input type="text" name="id"/><br>
    <button type = "submit">Удалить запись</button>
    </form>
    <br>
    <?php
        $host = 'host=localhost';
        $dbname= 'dbname=Birzha';
        $dbuser = 'user=postgres';
        $dbpass = 'password=123456';
        $db = pg_connect("$host $dbname $dbuser $dbpass");


        if($_POST != NULL)
        {
            if($result = pg_delete($db, 'Product', $_POST))
                echo 'Вы что-то удалили!';
            else
                echo 'Произошла ошибка!';
            $_POST = NULL;
        }

        //Вывод всех значений
        echo '<h3>Все данные из таблицы:</h3>';
		$query = 'select * from public."Product" order by id asc';
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