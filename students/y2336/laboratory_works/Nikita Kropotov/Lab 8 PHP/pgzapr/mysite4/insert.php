<link rel="stylesheet" href="assets/css/style.php">
<?php
echo "<body style='background: linear-gradient(180deg, rgb(69, 129, 168) 0%, rgb(97, 84, 143) 100%)'>";
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='Nikita';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query =  'SELECT "ID_invoice_payment", "Payment_price", "Payment_time"  FROM "payment" WHERE "ID_invoice_payment" ='.$_POST['ID_invoice_payment'].' GROUP BY "Payment_time", "ID_invoice_payment"';
$result = pg_query($query);
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
} 
while ($row = pg_fetch_row($result)) {
  echo "<table>";
  echo "<th>";
  echo "ID invoice payment: $row[0]\n";
  echo "</th>";
  echo "<th>";
  echo "Payment price: $row[0]\n";
  echo "</th>";
  echo "<th>";
  echo "Payment time: $row[1]\n";
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
