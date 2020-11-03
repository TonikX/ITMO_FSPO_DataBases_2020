<?php
	require_once "db_functions.php";
	require_once "database_connection.php";
	$message = "";
	$messagedelete = "";
	$checkid = $checkexp = $checkdate = "";
	$check = true;
	$regexp = "/^\d{4}-\d{2}-\d{2}$/";
	$oldid = $_POST["id"] ?? '';
	$oldexp = $_POST["exp"] ?? '';
	$olddate = $_POST["date"] ?? '';
	if (isset($_POST["done"])) {
		/*
		проверка вводимого ID
		*/
		if (!is_numeric($_POST["id"]) and $_POST["id"] != null) {
			$checkid = "Вы можете вводить только числа";
			$check = false;
		}
		/*
		проверка вводимого стажа работы
		*/
		if (!is_numeric($_POST["exp"]) and $_POST["exp"] != null) {
			$checkexp = "Только символы";
			$check = false;
		}
		/*
		проверка вводимой даты
		*/
		if ($_POST["date"] != null) {
			if (preg_match($regexp, $_POST["date"])) {
				$match = array();
				preg_match($regexp, $_POST["date"], $match);
				$year = substr($match[0], 0, 4);
				$month = substr($match[0], 5, 2);
				$day = substr($match[0], -2, 2);
				if ($year > 2020 || $year < 1950 || $month > 12  || $month < 1 || $day > 31 || $day < 1) {
					$checkdate = "Формат даты не распознан";
					$check = false;
				}
			}
			else {
				$checkdate = "Формат даты не распознан";
				$check = false;
			}
		}
		/*
		Если условия выполнены, то: 
		*/
		if ($check) {
			$sth = $pdo->prepare('Insert into employee values (:id, :date, :exp)');
			$sth->bindParam(':id', $_POST["id"]);
			$sth->bindParam(':exp', $_POST["exp"]);
			$sth->bindParam(':date', $_POST["date"]);
			if ($sth->execute() != null) {
				$message = "Информация внесена в таблицу";
			}
			else {
				$message = "Оишбка при вносе информации";
			}
		}
		/*
		проверка на ввод всех значений
		*/
		if (empty($_POST["id"]) || empty($_POST["exp"]) || empty($_POST["date"])) {
			$message = "Введите все поля формы";
		}
	}
	if (isset($_POST["done2"])) {
		$sth = $pdo->prepare('Delete from employee where "id_employee" = :id');
		$sth->bindParam(':id', $_POST["delete_id"]);
		if ($sth->execute() != null) {
				$messagedelete = "Информация удалена из таблицы";
			}
			else {
				$messagedelete = "Ошибка при удалении информации";
			}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="rules.css">
</head>
<body>
	<a href="inserts.php">Меню</a>
	<form action = "<?=$_SERVER["PHP_SELF"]?>" method = "post">
		<ul>
			<li><label for = "id">ID работника: </label><input type = "text" id = "id" name = "id" value = "<?=htmlentities($oldid)?>" placeholder = "Введите ID работника"></li>
			<li style = "color : red"><?=$checkid?></li>
			<li><label for = "exp">Стаж работы: </label><input type = "text" id = "exp" name = "exp" value = "<?=htmlentities($oldexp)?>" placeholder = "Введите стаж работы"></li>
			<li style = "color : red"><?=$checkexp?></li>
			<li><label for = "date">Дата рождения работника (Y-M-D): </label><input type = "text" id = "date" name = "date" value = "<?=htmlentities($olddate)?>" placeholder = "Введите дату рождения работника"></li>
			<li style = "color : red"><?=$checkdate?></li>
			<li><input type = "submit" name = "done" value = "Внести данные"></li>
		</ul>
		</form>
		<p><?=$message?></p>
		<?php
		$result = $pdo->query('Select * from employee order by "id_employee"')->fetchAll(pdo::FETCH_ASSOC);
		$keys = array_keys($result[0]);
		echo "<table><tr><td>";
		foreach($keys as $title) {
			echo "<th>$title</th>";
		}
		echo "</tr>";
		foreach($result as $line) {
			echo "<tr>";
			echo '<td><form method = "post" action = "'.$_SERVER["PHP_SELF"].'">';
			echo '<input type = "hidden" name = "delete_id" value = "'.$line["id_employee"].'">';
			echo '<input type = "submit" name = "done2" value = "Удалить">';
			echo '</form></td>';
			foreach($line as $col_value) {
				echo "<td>$col_value</td>";
			}
			echo '</tr>';	
		}
		?>
		<p><?=$messagedelete?></p>
</body>
</html>