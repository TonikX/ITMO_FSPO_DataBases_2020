<link rel="stylesheet" href="../assets/style.php">

<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'climb';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = 'SELECT * FROM public.route
where  "route"."id_route" = ' . $_POST['id_route'] . '';

$result = pg_query($query) or die('Query failed: ' . pg_last_error());;
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
}

echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px\">";
echo "<td>";
echo "ID Route";
echo "</td>";;
echo "<td>";
echo "Description";
echo "</td>";
echo "<td>";
echo "Name route";
echo "</td>";
echo "<td>";
echo "Id peak";
echo "</td>";
echo "</table>";

while ($row = pg_fetch_row($result)) {
  echo "<table class='simple-little-table' style=\"
  text-align: center;\">";
  echo "<td>";
  echo " $row[0]\n";
  echo "</td>";
  echo "<td>";
  echo " $row[1]\n";
  echo "</td>";
  echo "<td>";
  echo " $row[2]\n";
  echo "</td>";
  echo "<td>";
  echo " $row[3]\n";
  echo "</td>";
  echo "</table>";
}
?>