<link rel="stylesheet" href="assets/css/style.php">
<?php
echo "<body style='background: linear-gradient(180deg, rgb(69, 129, 168) 0%, rgb(97, 84, 143) 100%)'>";
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='Nikita';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
if (!$db){
  die ('Не удалось подключиться:'. pg_error ());
  }
$query = 'SELECT "ID_material", "type_material", "date_create_material", "price_material" FROM "Material" WHERE "ID_material" = ALL (SELECT "ID_material" FROM "order_zakaz" where "ID_material"= '.$_POST['ID_material'].')';
$result = pg_query($query);
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
} 
while ($row = pg_fetch_row($result)) {
  echo "<table>";
  echo "<th>";
  echo "ID material: $row[0]\n";
  echo "</th>";
  echo "<th>";
  echo "type_material: $row[1]\n";
  echo "</th>";
  echo "<th>";
  echo "date create material: $row[2]\n";
  echo "</th>";
  echo "<th>";
  echo "price material: $row[3]\n";
  echo "</th>";
  // echo "<th>";
  // echo "Name of advertising services: $row[1]\n";
  // echo "</th>";
 
  echo "<br />\n";
  echo "</th>";
  echo "</table>";
}
$rows = pg_num_rows($result);
echo "<table>";
echo "<td>";
echo "Возвращено строк: " . $rows . ".\n";
echo "</td>";
echo "</table>";
$row = pg_fetch_assoc($result);
?>
