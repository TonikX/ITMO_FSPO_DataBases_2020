<?php
	require_once "db_functions.php";
	require_once "database_connection.php";
	$message = "";
	$messagedelete = "";
	$checkage = $checkhealth = $checkdate = $checkbreakfast = $checklunch = $checkdinner = $checkid = "";
	$check = true;
	$regexp = "/^\d{4}-\d{2}-\d{2}$/";
	$oldration = $_POST["ration"] ?? '';
	$oldage = $_POST["age"] ?? '';
	$oldhealth = $_POST["health"] ?? '';
	$olddate = $_POST["date"] ?? '';
	$oldbreakfast = $_POST["breakfast"] ?? '';
	$oldlunch = $_POST["lunch"] ?? '';
	$olddinner = $_POST["dinner"] ?? '';
	$oldid = $_POST["id"] ?? '';
	if (isset($_POST["done"])) {
		/*
		проверка вводимого возраста
		*/
		if (!is_numeric($_POST["age"]) and $_POST["age"] != null) {
			$checkage = "You can enter only numbers!";
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
		проверка вводимого завтрака
		*/
		if (!ctype_alpha($_POST["breakfast"]) and $_POST["breakfast"] != null) {
			$checkbreakfast = "Wrong string format!";
			$check = false;
		}
		/*
		проверка вводимого обеда
		*/
		if (!ctype_alpha($_POST["lunch"]) and $_POST["lunch"] != null) {
			$checklunch = "Wrong string format!";
			$check = false;
		}		
		/*
		проверка вводимого ужина
		*/
		if (!ctype_alpha($_POST["dinner"]) and $_POST["dinner"] != null) {
			$checkdinner = "Wrong string format!";
			$check = false;
		}

		/*
		проверка вводимого ID
		*/
		if (!is_numeric($_POST["id"]) and $_POST["id"] != null) {
			$checkid = "You can only enter numbers!";
			$check = false;
		}
		/*
		Если условия выполнены, то: 
		*/
		if ($check) {
			$sth = $pdo->prepare('Insert into ration values (:age, :health, :date, :breakfast, :lunch, :dinner, :id)');
			$health = $_POST["health"];
			$date = $_POST["date"];
			$breakfast = $_POST["breakfast"];
			$lunch = $_POST["lunch"];
			$dinner = $_POST["dinner"];
			$health = '{'.$health.'}';
			$date = '{'.$date.'}';
			$breakfast = '{'.$breakfast.'}';
			$lunch = '{'.$lunch.'}';
			$dinner = '{'.$dinner.'}';
			$sth->bindParam(':age', $_POST["age"]);
			$sth->bindParam(':health', $health);
			$sth->bindParam(':date', $date);
			$sth->bindParam(':breakfast', $breakfast);
			$sth->bindParam(':lunch', $lunch);
			$sth->bindParam(':dinner', $dinner);
			$sth->bindParam(':id', $_POST["id"]);
			if ($sth->execute() != null) {
				$message = "Information succesfully inserted!";
			}
			else {
				$message = "Information couldn't be inserted!";
			}
		}
		/*
		проверка на ввод всех значений
		*/
		if (empty($_POST["age"]) || empty($_POST["health"]) || empty($_POST["date"]) || empty($_POST["breakfast"]) || empty($_POST["lunch"]) || empty($_POST["dinner"]) || empty($_POST["id"])) {
			$message = "You have to enter all fields!";
		}
	}
	if (isset($_POST["done2"])) {
		$sth = $pdo->prepare('Delete from ration where "id_ration" = :id');
		$sth->bindParam(':id', $_POST["delete_id"]);
		if ($sth->execute() != null) {
				$messagedelete = "Information succesfully deleted!";
			}
			else {
				$messagedelete = "Information couldn't be deleted!";
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
			<li><label for = "age">Возраст животного: </label><input type = "text" id = "age" name = "age" value = "<?=htmlentities($oldage)?>" placeholder = "Введите возраст животного"></li>
			<li style = "color : red"><?=$checkage?></li>
			<li><label for = "health">Оценка здоровья животного: </label>
				<select size = "1" name = "health" id = "health">
					<option disabled>Выберите вариант</option>
					<option value = "a" selected>a</option>
					<option value = "b">b</option>
					<option value = "c">c</option>
					<option value = "d">d</option>
					<option value = "f">f</option>
				</select></li>
			<li style = "color : red"><?=$checkhealth?></li>
			<li><label for = "date">Промежуток смены рациона (Y-M-D): </label><input type = "text" id = "date" name = "date" value = "<?=htmlentities($olddate)?>" placeholder = "Введите промежуток смены рациона"></li>
			<li style = "color : red"><?=$checkdate?></li>
			<li><label for = "breakfast">Завтрак животного: </label><input type = "text" id = "breakfast" name = "breakfast" value = "<?=htmlentities($oldbreakfast)?>" placeholder = "Введите завтрак животного"></li>
			<li style = "color : red"><?=$checkbreakfast?></li>
			<li><label for = "lunch">Обед животного: </label><input type = "text" id = "lunch" name = "lunch" value = "<?=htmlentities($oldlunch)?>" placeholder = "Введите обед животного"></li>
			<li style = "color : red"><?=$checklunch?></li>
			<li><label for = "dinner">Ужин животного:  </label><input type = "text" id = "dinner" name = "dinner" value = "<?=htmlentities($olddinner)?>" placeholder = "Введите ужин животного"></li>
			<li style = "color : red"><?=$checkdinner?></li>
			<li><label for = "id">Id рациона: </label><input type = "text" id = "id" name = "id" value = "<?=htmlentities($oldid)?>" placeholder = "Введите ID рациона"></li>
			<li style = "color : red"><?=$checkid?></li>
			<li><input type = "submit" name = "done" value = "Внести данные"></li>
		</ul>
		</form>
		<p><?=$message?></p>
		<?php
		$result = $pdo->query('Select * from ration order by "id_ration"')->fetchAll(pdo::FETCH_ASSOC);
		$keys = array_keys($result[0]);
		echo "<table><tr><td>";
		foreach($keys as $title) {
			echo "<th>$title</th>";
		}
		echo "</tr>";
		foreach($result as $line) {
			echo "<tr>";
			echo '<td><form method = "post" action = "'.$_SERVER["PHP_SELF"].'">';
			echo '<input type = "hidden" name = "delete_id" value = "'.$line["id_ration"].'">';
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