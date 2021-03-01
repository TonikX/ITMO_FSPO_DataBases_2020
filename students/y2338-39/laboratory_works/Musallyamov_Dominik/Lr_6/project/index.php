<!DOCTYPE html>
<html>
	<head>
		<title>Продажа масел || Лабораторная работа студента ******* *******</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
<?php
	$dbuser = 'postgres';//переменные с данными базы
	$dbpass = '123';//переменные с данными базы
	$hostname = 'localhost';//переменные с данными базы
	$database_name='project';//переменные с данными базы
	$db_connect = pg_connect("host=$hostname port=5433 dbname=$database_name user=$dbuser password=$dbpass") or die('Не удалось соединиться: ' . pg_last_error());;//коннект с использованием переменных выше или убить коннект в случае неудачи
	echo '<p> Данные о продаваемом масле: </p>
				<table>
					<thead>
						<tr>
							<th> Артикул </th>
							<th> Название </th>
							<th> Цена </th>
							<th> Кол-во на складе </th>
						</tr>';//вывод начала блока с данными о масле
	$query = "select * from oils"; //Запрос
	$result = pg_query($db_connect, $query);//получение данных из базы
	$count = pg_num_rows($result) * 1;//узнаем сколько строчек в полученном ответе
		for($id = 1; $id <= $count; $id=$id+1){ //цикл первый аргумент счетчик, второй условие - до тех пор пока не тсанет равно колву записей, второе действие в конце каждой итерации
			echo '<tr>';
				$query = "select * from oils where ID = " .$id;//получаем текущее масло внутри цикла
				$result = pg_query($db_connect, $query);
				$result = pg_fetch_row($result);

		foreach($result as $value) { //второй цикл
			?>
			<td><input type="text" class="form-control" value="<?= $value ?>" </td>
		  <?php
					}
		echo '</tr>';
}
	echo '</thead></table>';
	echo '</br></br>
					<p> Заказы </p>
					<table class="table table-striped" frame="border">
						<thead>
							<tr>
								<th> Номер </th>
								<th> Артикул масла </th>
								<th> Имя </th>
								<th> Номер телефона </th>
							</tr>';
		$query = "select * from orders";
		$result1 = pg_query($db_connect, $query);//получаем все записи из заказов
			while($result = pg_fetch_row($result1)) //цикл до тех пор пока не {
				echo '<tr>';
				foreach ($result as $value) //второй цикл для вывода
					echo '<td><input type="text" class="form-control" value="' . $value . '" </td>';
				echo '</tr>';
			}
			echo '</thead></table>
			';
			//в коде ниже переходим на страницу add.php с пост запросом, а там уже определяется зачем мы пришли по нейму кнопки
		?>
		<br>
		<br>
		<hr>
		<div>
		<h1>Добавление записей</h1>
		<ul>
			<form method="POST" action="add.php" >
				<button type="submit" name="oil">Добавить масло</button>
				<button type="submit" name="orders">Добавить покупку</button>
			</form>
		</ul>
	</div>
<hr>
</body>
</html>
