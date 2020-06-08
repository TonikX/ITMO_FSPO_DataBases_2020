<link rel="stylesheet" href="assets/style.php">
<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='College';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = 'SELECT public."Teacher"."name", public."Teacher"."surname", "number_group", public."Subject"."subject_name", "lesson_number", "lesson_day" FROM public."Lesson"
inner join public."Teacher" on (public."Teacher"."id" = public."Lesson"."teacher_id")
inner join public."Subject" on (public."Subject"."id" = public."Lesson"."subject_id")
inner join "Group" on (public."Group"."id_group" = public."Lesson"."group_id")
where ("number_group" = '.$_POST['number_group'].' AND lesson_day = '.$_POST['lesson_day'].')';

$result = pg_query($query);
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
} 
echo "<table>"; 
    echo "<td>";
    echo "Teacher";
    echo "</td>";;
    echo "<td>";
    echo "Group";
    echo "</td>";
    echo "<td>";
    echo "Subject name";
    echo "</td>";
    echo "<td>";
    echo "Lesson number";
    echo "</td>";
    echo "<td>";
    echo "Day";
    echo "</td>";
    echo "</table>";

while ($row = pg_fetch_row($result)) {
  echo "<table>";
  echo "<td>";
  echo "$row[0]\n   $row[1]\n";
  echo "</td>";
  echo "<td>";
  echo "$row[2]\n";
  echo "</td>";
  echo "<td>";
  echo "$row[3]\n";
  echo "</td>";
  echo "<td>";
  echo "$row[4]\n";
  echo "</td>";
  echo "<td>";
  echo "$row[5]\n";
  echo "</td>";
  echo "</table>";
}
$rows = pg_num_rows($result);
echo "<tablee>";
echo "<tdt>";
echo "Возвращено строк: " . $rows . ".\n";
echo "</tdt>";
echo "</tablee>";
$row = pg_fetch_assoc($result);
?>
