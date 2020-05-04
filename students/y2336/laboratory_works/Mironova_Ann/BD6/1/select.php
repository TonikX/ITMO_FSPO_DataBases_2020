<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='Annn';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$result = pg_query($db, "SELECT Specialty, Dischargbymasteredprofessions from Course ,Profession where CoursePrice<='$_POST[CoursePrice]' and Profession.ID_Profession=Course.ID_Profession group by Specialty, Dischargbymasteredprofessions ");
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
}
while ($row = pg_fetch_row($result)) {
  echo "Specialty: $row[0]   Dischargbymasteredprofessions: $row[1]";
  echo "<br />\n";
}
$rows = pg_num_rows($result);
echo "Возвращено строк: " . $rows . ".\n";
$row = pg_fetch_assoc($result);
 
?>
