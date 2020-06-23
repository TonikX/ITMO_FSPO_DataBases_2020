<link rel="stylesheet" href="assets/css/style.php">
<?php
echo "<body style='background: linear-gradient(180deg, rgb(69, 129, 168) 0%, rgb(97, 84, 143) 100%)'>";
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='Nikita';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = 'SELECT max("cost"), "order_zakaz"."Order_id" FROM "order_zakaz" GROUP BY "order_zakaz"."Order_id" HAVING MAX("cost")>'.$_POST['cost'].'';
$result = pg_query($query);
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
} 
while ($row = pg_fetch_row($result)) {
  echo "<table>";
  echo "<th>";
  echo "max(cost): $row[0]\n";
  echo "</th>";
  echo "<th>";
  echo "Order id: $row[1]\n";
  echo "</th>";
 
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
