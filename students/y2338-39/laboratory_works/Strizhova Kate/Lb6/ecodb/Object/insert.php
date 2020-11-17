<link rel="stylesheet" href="../assets/style.php">

<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'ecobd';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = 'SELECT * FROM public.object where "id" = ' . $_POST['id'] . '';

$result = pg_query($query);
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
}
echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px\">";
echo "<td>";
echo "Номер";
echo "</td>";;
echo "<td>";
echo "Адрес";
echo "</td>";
echo "<td>";
echo "Название";
echo "</td>";
echo "</table>";

while ($row = pg_fetch_row($result)) {
  echo "<table class='simple-little-table' style=\"
    text-align: center;\">";
  echo "<td>";
  echo "$row[0]\n";
  echo "</td>";
  echo "<td>";
  echo "$row[1]\n";
  echo "</td>";
  echo "<td>";
  echo "$row[2]\n";
  echo "</td>";
  echo "</table>";
}
?>