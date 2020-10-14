<!DOCTYPE html>
<html>
	<head>
		<title>Inteface for my database</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
		integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="container">
		<h1 align="center" class="header-h1">Choose the table</h1>
		<ul>
			<form method="POST" action="add.php" >
				<button class="btn btn-info" type="submit" name="b">About books</button>
				<button class="btn btn-info" type="submit" name="readers">About readers</button>
			</form>
		</ul>
	</div>

<?php
$dbuser = 'postgres';
$dbpass = '123';
$host = '192.168.64.1';
$dbname='Bibl';
$db = pg_connect("host=$host port=5433 dbname=$dbname user=$dbuser password=$dbpass");
echo '
<p> Вывод информации о библиотеки и работниках, которые там работают: </p>
<table class="table table-striped" frame="border">
	<thead>
		<tr>
			<th> FIO librarian </th>
			<th> ID librarian </th>
			<th> address of Library </th>
			<th> ID_read_hall </th>
</tr>
';
$query = "select bibliotekar.fio_bibl, bibliotekar.id_bibliotekar,
biblioteka.adress_b, biblioteka.id_rad_hall from biblioteka join bibliotekar
on bibliotekar.id_bibliotekar = biblioteka.id_bibl";
$result = pg_query($db, $query);
$count = pg_num_rows($result) * 11;
for($i = 11; $i <= $count; $i=$i +11){
	echo '<tr>';
	$query = "select bibliotekar.fio_bibl, bibliotekar.id_bibliotekar,
	biblioteka.adress_b, biblioteka.id_rad_hall from biblioteka join bibliotekar
	on bibliotekar.id_bibliotekar = biblioteka.id_bibl where bibliotekar.id_bibliotekar = " .$i;
	$result = pg_query($db, $query);
	$result = pg_fetch_row($result);

	foreach($result as $value) {
		?><td><input type="text" class="form-control" value="<?= $value ?>" </td>
		  <?php
	}
	echo '</tr>';
}
echo '</thead></table>
';
echo '
</br></br>
<p> Вывод всех читателей библиотеки, у которых номер паспорта имеет меньше
среднего количество цифр (для того чтобы узнать количество иностранных читателей): </p>
<table class="table table-striped" frame="border">
	<thead>
	<tr>
		<th> number ticket </th>
		<th> name </th>
		<th> address </th>
		<th> number phone </th>
		<th> date birthday </th>
		<th> education </th>
		<th> number passport</th>
	</tr>
';
$query = "select * from reader where number_pasport<(select avg(number_pasport)
from reader)";
	$result1 = pg_query($db, $query);
	while($result = pg_fetch_row($result1)) {
		echo '<tr>';
		foreach ($result as $value)
			echo '<td><input type="text" class="form-control" value="' . $value . '" </td>';
		echo '</tr>';
	}
	echo '</thead></table>
	';
	echo '
	</br></br>
	<p>Вывод информации о библиотеке, который имеет в себе читальные залы: </p>
	<table class="table table-striped" frame="border">
		<thead>
		<tr>
			<th> Address of library </th>
			<th> date open </th>
			<th> date close </th>
			<th> ID_read_hall </th>
			<th> ID_librarian </th>
			<th> ID_library </th>
		</tr>
	';
	$query = "select * from biblioteka where id_rad_hall = any(select id_read_hall
	from reading_hall)";
		$result1 = pg_query($db, $query);
		while($result = pg_fetch_row($result1)) {
			echo '<tr>';
			foreach ($result as $value)
				echo '<td><input type="text" class="form-control" value="' . $value . '" </td>';
			echo '</tr>';
		}
		echo '</thead></table>
		';
		echo '
		</br></br>
		<p>Объединение атрибутов времени открытия и закрытия, ID читального зала
		библиотеки и читального зала : </p>
		<table class="table table-striped" frame="border">
			<thead>
			<tr>
				<th> date opening</th>
				<th> date closing </th>
				<th> ID_read_hall </th>
			</tr>
		';
		$query = "select date_opening, date_closing,id_read_hall from reading_hall union
		select date_op, date_cl, id_b from biblioteka";
			$result1 = pg_query($db, $query);
			while($result = pg_fetch_row($result1)) {
				echo '<tr>';
				foreach ($result as $value)
					echo '<td><input type="text" class="form-control" value="' . $value . '" </td>';
				echo '</tr>';
			}

			echo '</thead></table>
			';
			echo '
			</br></br>
			<p>Вывод количества читателей, которые уже зарегистрированы в библиотеке: </p>
			<table class="table table-striped" frame="border">
				<thead>
				<tr>
					<th> count of reader </th>
				</tr>
			';
			$query = "select count(reader.number_pasport) from reader join registration on
			reader.number_pasport = registration.number_pasport";
				$result1 = pg_query($db, $query);
				while($result = pg_fetch_row($result1)) {
					echo '<tr>';
					foreach ($result as $value)
						echo '<td><input type="text" class="form-control" value="' . $value . '" </td>';
					echo '</tr>';
				}
 ?>
</body>
</html>
