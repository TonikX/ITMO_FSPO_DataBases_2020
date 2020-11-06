<link rel="stylesheet" href="../assets/style.php">

<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'climb';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = 'SELECT * FROM public.climber
where "id_climber" = ' . $_POST['id_climber'] . '';

$result = pg_query($query);
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
}
echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px\">";
echo "<td>";
echo "ID";
echo "</td>";;
echo "<td>";
echo "Name";
echo "</td>";
echo "<td>";
echo "Club";
echo "</td>";
echo "<td>";
echo "Contact club";
echo "</td>";
echo "<td>";
echo "Address climber";
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
  echo "<td>";
  echo "$row[4]\n";
  echo "</td>";
  echo "</table>";
}
echo "<div style=\"margin-bottom:70px; color:#1b2631\">" . " " . "</div>";

?>