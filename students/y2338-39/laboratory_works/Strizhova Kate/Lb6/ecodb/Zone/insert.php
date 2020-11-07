<link rel="stylesheet" href="../assets/style.php">
<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'ecobd';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");

$query = 'SELECT "zone"."id", "zone"."type", "object"."name" 
FROM public.zone, public.object
where "object"."id" = "zone"."object_id"
AND "zone"."type" = ' . $_POST['type'] . '';

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
echo "Тип";
echo "</td>";
echo "<td>";
echo "Объект";
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