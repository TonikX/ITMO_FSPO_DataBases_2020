<?php
	require_once "db_functions.php";
	require_once "database_connection.php";
	$sql1 = 'select "id_animal", "view_animal", "date_animal" from public."animal" inner join "mammal" using ("id_animal") where (select extract (year from "date_animal")) > 2016';
	$sql2 = 'select * from animal where "view_animal" like \'c%\' and "sex_animal" = \'m\'';
	$sql3 = 'select distinct a."id_employee", a."experience_employee", b."id_animal" from public."employee" a inner join "feeding" b using ("id_employee") inner join "mammal" c using ("id_animal") where a."experience_employee" > 2 and (select extract (year from c."date_mammal")) > 2016';
	$sql4 = 'select * from public."animal" a where (select extract (year from a."date_animal")) > 2015 and a."sex_animal" = \'w\'';
	$sql5 = 'select a."id_animal", a."view_animal" from public."animal" a where exists (select 1 from public."feeding" b where a."id_animal" = b."id_animal" and b."id_employee" = 55) order by "id_animal"';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="rules.css">
</head>
<body>
	<a href="index.php">Меню</a>
	<p>Запрос 1: ID, вид и дата рождения млекопитающих, родившихся раньше 2016 года</p>
	<p><?=selecting($pdo, $sql1)?></p>
	<p>Запрос 2: Информация о животных мужского пола, вид которых начинается на 'C'</p>
	<p><?=selecting($pdo, $sql2)?></p>
	<p>Запрос 3: ID рабочих со стажем больше 2 лет и ID накормленных ими млекопитающих, родившихся раньше 2016 года</p>
	<p><?=selecting($pdo, $sql3)?></p>
	<p>Запрос 4: Животные женского пола, родившиеся после 2015 года</p>
	<p><?=selecting($pdo, $sql4)?></p>
	<p>Запрос 5: ID и вид животных, которых хотя бы раз кормил работник зоопарка с ID = 1</p>
	<p><?=selecting($pdo, $sql5)?></p>
</body>
</html>