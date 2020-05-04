<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='Annn';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$result = pg_query($db, "SELECT Requirements FROM Vacancy where Salary>='$_POST[Salary]' /*and ConditionVacancies='$_POST[ConditionVacancies]'*/ Order BY numberdays");
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
}
while ($row = pg_fetch_row($result)) {
  echo "Requirements: $row[0] ";
  echo "<br />\n";
}
$rows = pg_num_rows($result);
echo "Возвращено строк: " . $rows . ".\n";
$row = pg_fetch_assoc($result);
 
?>
