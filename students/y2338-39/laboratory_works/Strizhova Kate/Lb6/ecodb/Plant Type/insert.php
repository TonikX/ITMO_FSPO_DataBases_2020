<link rel="stylesheet" href="../assets/style.php">

<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'ecobd';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = 'SELECT *
FROM public.plant_type 
where  "plant_type"."id" = ' . $_POST['id'] . '';



$result = pg_query($query) or die('Query failed: ' . pg_last_error());;
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
}
// echo "<div style=\"font-size:32px; color:#524f4e; text-align: center; margin-top: 30px; 
//   font-family: 'Montserrat', sans-serif;
//   \">" . "Room" . "</div>";
echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px\">";
echo "<td>";
echo "ID Номера";
echo "</td>";;
echo "<td>";
echo "Тип";
echo "</td>";
echo "<td>";
echo "Описание";
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
  echo "</table>";
}
?>