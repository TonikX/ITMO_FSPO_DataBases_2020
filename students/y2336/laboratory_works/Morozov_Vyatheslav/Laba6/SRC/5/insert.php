<link rel="stylesheet" href="assets/style.php">
<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='College';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = 'SELECT "id_class", "number_class", public."Teacher"."name", public."Teacher"."surname"
	FROM public."Classroom"
  inner join public."Teacher" on (public."Classroom"."teacher_id" = public."Teacher"."id")
  where public."Classroom"."id_class" = '.$_POST['id_class'].'';
$result = pg_query($query);
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
} 
echo "<table>"; 
    // echo "<td>";
    // echo "Id Classroom";
    // echo "</td>";;
    echo "<td>";
    echo "Number Classroom";
    echo "</td>";
    echo "<td>";
    echo "Teacher";
    echo "</td>";
    echo "</table>";

while ($row = pg_fetch_row($result)) {
  echo "<table>";
  // echo "<td>";
  // echo "$row[0]\n ";
  // echo "</td>";
  echo "<td>";
  echo "$row[1]\n";
  echo "</td>";
  echo "<td>";
  echo "$row[2]\n $row[3]\n";
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
