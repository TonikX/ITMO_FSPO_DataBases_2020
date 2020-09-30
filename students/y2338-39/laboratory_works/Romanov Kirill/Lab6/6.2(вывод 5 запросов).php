<?php

	function ViewRequest($db,$query,$str){

		$result1 = pg_query($db, $query );
		$NumFields = pg_num_fields($result1);  

		echo"<br>$str<br>";

		while ($row =  pg_fetch_row($result1) ) {
		  foreach($row as $value)
		  	echo "$value\t";
		echo "<br />";
		}

		echo"------------------------------------------------------------------------------";
		
	}

	$dbuser = 'postgres';
	$dbpass = '1234';
	$host = 'localhost';
	$dbname='12.03';
	$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");

	$query1 = "SELECT \"Name\" FROM \"Student\" INTERSECT SELECT \"Student_Name\" FROM \"Grade_4_quarter\" ";

	$query2 = "SELECT L.\"Lecturer_Name\", S.\"subject_title\" FROM \"Lecturer\" AS L JOIN \"Subject\" AS S ON L.\"Lecturer_ID\" = S.\"Subject_ID\" ";

	$query3 = "SELECT \"Lecturer_Name\", LENGTH(L.\"Lecturer_Name\") AS \"length of Lecturer\'s name\"FROM \"Lecturer\" AS L";

	$query4 = "SELECT \"Student_Name\", count(*) as \"Lecture count\"FROM \"Grade_4_quarter\"
GROUP BY \"Student_Name\"HAVING COUNT(*)>2";

	$query5 = "SELECT DISTINCT * FROM \"Student\" as S WHERE S.\"Name\" = ANY (SELECT \"Student_Name\" FROM  \"Grade_4_quarter\")";
	

	ViewRequest($db,$query1,"9.Имена, находящиеся в обоих таблицах ");
	ViewRequest($db,$query2,"1.Учитель и предмет,который он ведет ");
	ViewRequest($db,$query3,"4.Длина имени учителя");
	ViewRequest($db,$query4,"7.Студенты имеющие более 1 оценненого предмета");
	ViewRequest($db,$query5,"8.Ученики имеющие хоть какие то оценки за четверть");

	pg_close($db);


/*Практическое задание:
Необходимо реализовать вывод пяти сделанных Вами запросов (уже написанных в предыдущей работе). Реализовать форму для добавления новых данных. Реализовать вывод объектов с возможностью их удалить.
Список интфрейсов необходимо согласовать с преподавателем.
1.	Необходимо создать скрипты для простой вставки, редактирования, добавления и удаления данных в таблице СУБД PostgreSQL.
a.	Базовый уровень: создать формы для выборки, вставки, удаления данных с использованием библиотеки PDO.
b.	Повышенный уровень: реализовать интерфейсы для изменения данных (см. пример на рисунке ниже).

*/

?>


