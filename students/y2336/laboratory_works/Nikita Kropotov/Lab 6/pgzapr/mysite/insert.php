<link rel="stylesheet" href="assets/css/style.php">
<?php
echo "<body style='background: linear-gradient(180deg, rgb(69, 129, 168) 0%, rgb(97, 84, 143) 100%)'>";
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='Nikita';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = 'SELECT "Order_id", "Material"."ID_material", "order_zakaz"."Name_of_advertising_services" FROM "order_zakaz", "Material" WHERE "Material"."ID_material" = "order_zakaz"."ID_material" AND "Order_id" = '.$_POST['Order_id'].'';
$result = pg_query($query);
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
} 
while ($row = pg_fetch_row($result)) {
  echo "<tablee>";
  echo "<tht>";
  echo "Order id: $row[0]";
  echo "</tht>";
  echo "<tht>";
  echo "ID material: $row[1]";
  echo "</tht>";
  echo "<tht>";
  echo "Name of advertising services: $row[2] ";
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
