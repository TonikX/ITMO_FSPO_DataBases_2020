<link rel="stylesheet" href="assets/style.php">
<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='College';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = 'SELECT public."Student"."name", public."Student"."surname" from public."Group"
inner join public."Student" on (public."Group"."id_group" = public."Student".group_id)
where public."Group"."number_group"= '.$_POST['number_group'].'';
$result = pg_query($query);
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
} 
echo ("Students of group ".$_POST['number_group'].": <br/>");
echo "<table>"; 
    echo "<td>";
    echo "Name";
    echo "</td>";;
    echo "<td>";
    echo "Surname";
    echo "</td>";
    echo "</table>";

while ($row = pg_fetch_row($result)) {
  echo "<table>";
  echo "<td>";
  echo "$row[0]\n";
  echo "</td>";
  echo "<td>";
  echo "$row[1]\n";
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
