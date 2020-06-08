<link rel="stylesheet" href="assets/style.php">
<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='College';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = 'SELECT "number_group", public."Teacher"."name", public."Teacher"."surname" FROM public."TeachersGroups" 
inner join "Group" on (public."Group"."id_group" = public."TeachersGroups"."group_id")
inner join public."Teacher" on (public."Teacher"."id" = public."TeachersGroups"."teacher_id")
where "id_group" = '.$_POST['id_group'].'';

$result = pg_query($query) or die('Query failed: ' . pg_last_error());;
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
} 
echo "<table>"; 
    echo "<td>";
    echo "Group";
    echo "</td>";;
    echo "<td>";
    echo "Teacher";
    echo "</td>";
    echo "</table>";

while ($row = pg_fetch_row($result)) {
  echo "<table>";
  echo "<td>";
  echo " $row[0]\n";
  echo "</td>";
  echo "<td>";
  echo " $row[1]\n $row[2]\n";
  echo "<br/>\n";
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
