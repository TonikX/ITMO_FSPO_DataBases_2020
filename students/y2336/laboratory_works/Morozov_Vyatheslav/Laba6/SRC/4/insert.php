<link rel="stylesheet" href="assets/style.php">
<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='College';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = 'SELECT "Student"."name", "Student"."surname", public."Subject"."subject_name", avg(public."Grade"."grade") from public."Grade"
inner join public."Student" on (public."Student"."id" = public."Grade"."student_id")
inner join public."Subject" on (public."Grade"."subject_id" = public."Subject"."id")
where public."Student"."id" = '.$_POST['id'].'
GROUP BY public."Student"."name", public."Student"."surname", public."Subject"."subject_name"';
$result = pg_query($query);
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
} 
echo "<table>"; 
    echo "<td>";
    echo "Student";
    echo "</td>";;
    echo "<td>";
    echo "Subject";
    echo "</td>";
    echo "<td>";
    echo "Average mark";
    echo "</td>";
    echo "</table>";

while ($row = pg_fetch_row($result)) {
  echo "<table>";
  echo "<td>";
  echo "$row[0]\n $row[1]\n";
  echo "</td>";
  echo "<td>";
  echo "$row[2]\n";
  echo "</td>";
  echo "<td>";
  echo "$row[3]\n";
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
