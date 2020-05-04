<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='Annn';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$result = pg_query($db, "Select Specialty from Profession where EXISTS ( Select Requirements from Vacancy where NumberDays>='$_POST[NumberDays]')");
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
}
while ($row = pg_fetch_row($result)) {
  echo "Specialty: $row[0] ";
  echo "<br />\n";
}
$rows = pg_num_rows($result);
echo "Возвращено строк: " . $rows . ".\n";
$row = pg_fetch_assoc($result);
 
?>
