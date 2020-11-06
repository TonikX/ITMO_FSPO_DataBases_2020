<link rel="stylesheet" href="../assets/style.php">
<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'climb';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");

$query = 'SELECT * FROM public.insurance_contract where
 "insurance_contract"."id_insurance_contract" = ' . $_POST['id_insurance_contract'] . '';

$result = pg_query($query);
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
}
echo "<table class='simple-little-table' style=\"
  text-align: center; margin-top: 20px\">";
echo "<td>";
echo "ID agency";
echo "</td>";;
echo "<td>";
echo "ID climber";
echo "</td>";
echo "<td>";
echo "Terms";
echo "</td>";
echo "<td>";
echo "ID insurance contract";
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
  echo "<td>";
  echo "$row[3]\n";
  echo "</td>";
  echo "</table>";
}
?>