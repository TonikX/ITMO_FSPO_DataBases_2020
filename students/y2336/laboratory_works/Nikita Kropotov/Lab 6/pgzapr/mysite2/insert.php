<link rel="stylesheet" href="assets/css/style.php">
<?php
echo "<body style='background: linear-gradient(180deg, rgb(69, 129, 168) 0%, rgb(97, 84, 143) 100%)'>";
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='Nikita';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = 'SELECT * from public."Client" WHERE ("ID_client" = '.$_POST['ID_client'].')';
$result = pg_query($query);
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
} 
while ($row = pg_fetch_row($result)) {
  echo "<tablee>";
  echo "<tht>";
  echo "ID client: $row[0]\n";
  echo "</tht>";
  echo "<tht>";
  echo "Mail adress client: $row[1]\n";
  echo "</tht>";
  echo "<tht>";
  echo "Phone number: $row[2]\n";
  echo "<tht>";
  echo "The contact person: $row[3]\n";
  echo "</tht>";
  echo "<tht>";
  echo "Phone number executor: \n$row[4]\n";
  echo "</tht>";
  echo "<tht>";
  echo "Mail adress executor: $row[5]\n";
  echo "</tht>";
  echo "<br />\n";
  echo "</tht>";
  echo "</tablee>";
}
$rows = pg_num_rows($result);
echo "<tablee>";
echo "<tdt>";
echo "Возвращено строк: " . $rows . ".\n";
echo "</tdt>";
echo "</tablee>";
$row = pg_fetch_assoc($result);
?>
