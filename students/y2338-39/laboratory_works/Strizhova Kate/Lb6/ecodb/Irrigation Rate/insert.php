<link rel="stylesheet" href="../assets/style.php">

<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'ecobd';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = 'SELECT "irrigation_rate"."season", "plant_type"."name", "irrigation_rate"."water_mm" from irrigation_rate, plant_type
where "plant_type"."id" = "irrigation_rate"."plant_type_id"
AND "season" = ' . $_POST['season'] . '';


$result = pg_query($query);
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
}
// echo "<div style=\"font-size:32px; color:#524f4e; text-align: center; margin-top: 30px; 
//   font-family: 'Montserrat', sans-serif;
//   \">" . "Счёт клиента <br/>" . "</div>";
echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px\">";
echo "<td>";
echo "Сезон";
echo "</td>";;
echo "<td>";
echo "Растение";
echo "</td>";
echo "<td>";
echo "Вода";
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
echo "<div style=\"margin-bottom:70px; color:#1b2631\">" . " " . "</div>";

?>