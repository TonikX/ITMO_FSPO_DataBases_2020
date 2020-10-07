<!DOCTYPE html>
<html>
    <head>
        <title>Lab 6</title>
        <meta charset="UTF-8" />
		<style>
		input {width: 100px;}
		</style>
    </head>
    <body>

	<form action="/opbd/index.php">
		<button type="submit">Назад</button>
	</form>
    <br>
	<h2>Редактирование</h2>

	<?php
		$host = 'host=localhost';
		$dbname= 'dbname=Sobaki';
		$dbuser = 'user=postgres';
		$dbpass = 'password=postgres';
		$db = pg_connect("$host $dbname $dbuser $dbpass");

		$type =  $_GET["type"];
		
		$pk2 = ($type == "Sponsirovanie_vistavki" || $type == "Vistuplenie_porodi_na_ringe");

		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$query = 'SELECT * FROM "' . $type . '" LIMIT 0';
			$result = pg_query($db, $query);
			if (isset($_POST["del"]))
				$idx = $_POST["del"];
			else if (isset($_POST["smt"]))
				$idx = $_POST["smt"];
			
			$key1 = pg_field_name($result, 0);
			$key2 = $pk2 ? pg_field_name($result, 1) : null;

			if ($idx == "new")
			{
				$q = 'INSERT INTO "' . $type . '" (';
				for ($i = ($pk2 ? 0 : 1); $i < pg_num_fields($result); $i++)
				{
					$q .= pg_field_name($result, $i);
					if ($i != pg_num_fields($result) - 1)
						$q .= ", ";
				}
				$q .= ') VALUES (';
				for ($i = ($pk2 ? 0 : 1); $i < pg_num_fields($result); $i++)
				{
					$q .= "'" . $_POST["fld_" . $i . "_n"] . "'";
					if ($i != pg_num_fields($result) - 1)
						$q .= ", ";
				}
				$q .= ")";
				$result = pg_query($db, $q);
			}
			else if (isset($_POST["del"]))
			{
				$q = 'DELETE FROM "' . $type . '" t WHERE t.' . $key1 . '=' . $_POST['fld_0_' . $idx];
				if ($pk2)
					$q .= ' AND t.' . $key2 . '=' . $_POST['fld_1_' . $idx];
				$result = pg_query($db, $q);
			}
			else if (isset($_POST["smt"]))
			{
				$q = 'UPDATE "' . $type . '" t SET ';
				for ($i = ($pk2 ? 2 : 1); $i < pg_num_fields($result); $i++)
				{
					$q .= ' ' . pg_field_name($result, $i) . '=\'' . $_POST['fld_' . $i . '_' . $idx] . '\'';
					if ($i != pg_num_fields($result) - 1)
						$q .= ", ";
				}
				$q .= ' WHERE t.' . $key1 . '=' . $_POST['fld_0_' . $idx];
				if ($pk2)
					$q .= ' AND t.' . $key2 . '=' . $_POST['fld_1_' . $idx];
				$result = pg_query($db, $q);
			}
		}

		$query = 'SELECT * FROM "' . $type . '";';
		$result = pg_query($db, $query);
		echo '<form method="POST">';
		echo '<table border=1>';
		echo '<tr>';
		for ($i=0; $i<pg_num_fields($result); $i++) {
			echo '<th>' . pg_field_name($result, $i) . '</th>';
        }
        echo '<th>+</th>';
        echo '<th>X</th>';
		echo '</tr>';
		$k = 0;
		while ($row = pg_fetch_row($result)) {
			echo '<tr>';
			for ($i=0; $i<pg_num_fields($result); $i++) {
				if ($i == 0 || $pk2 && $i == 1)
				{
					echo '<td>' . $row[$i] . '</td>';
					echo '<input type="hidden" name="fld_' . $i . '_' . $k . '" value="' . $row[$i] . '">';
				}
				else
					echo '<td><input type="text" name="fld_' . $i . '_' . $k . '" value="'
						. $row[$i] . '"></td>';
			}
			echo '<td><button type="submit" name="smt" value="' . $k . '">+</button></td>';
			echo '<td><button type="submit" name="del" value="' . $k++ . '">X</button></td>';
			echo '</tr>';
		}
		echo '<tr>';
		for ($i=0; $i<pg_num_fields($result); $i++) {
			if ($i == 0 && !$pk2)
				echo '<td></td>';
			else
				echo '<td><input type="text" name="fld_' . $i . '_n" value=""></td>';
		}
		echo '<td><button type="submit" name="smt" value="new">+</button></td>';
		echo '<td></td>';
		echo '</tr>';
		echo '</table>';
		echo '</form>';

		pg_close($db);
    ?>
    <br>
    </body>
</html> 
