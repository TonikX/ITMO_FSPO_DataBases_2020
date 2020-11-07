<link rel="stylesheet" href="../assets/style.php">

<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'climb';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = 'SELECT * FROM public."group" where "id_group" = ' . $_POST['id_group'] . '';

$result = pg_query($query);
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
}
echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px\">";
echo "<td>";
echo "Id";
echo "</td>";;
echo "<td>";
echo "Quantity member";
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
  echo "</table>";
}
?>