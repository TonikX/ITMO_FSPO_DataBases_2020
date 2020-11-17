<link rel="stylesheet" href="../assets/style.php">

  <?php
  $dbuser = 'postgres';
  $dbpass = '1234';
  $host = 'localhost';
  $dbname = 'ecobd';
  $db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
  $query = 'SELECT "plant"."id", "zone"."type", "plant_type"."name", "plant"."date_of_planting", "plant"."name" 
  FROM public.plant, public.plant_type, public.zone  
  where "zone"."id" = "plant"."zone_id"
  AND "plant_type"."id" = "plant"."plant_type_id"
  AND "plant_type"."id" = ' . $_POST['plant_type_id'] . '';

  $result = pg_query($query);
  if (!$result) {
    echo "Произошла ошибка.\n";
    exit;
  }
  echo "<table class='simple-little-table' style=\"
  text-align: center; margin-top: 20px\">";
  echo "<td>";
  echo "ID растения";
  echo "</td>";
  echo "<td>";
  echo "Зона";
  echo "</td>";
  echo "<td>";
  echo "Вид растения";
  echo "</td>";
  echo "<td>";
  echo "Дата посадки";
  echo "</td>";
  echo "<td style=\"width:23%;\">";
  echo "Название";
  echo "</td>";
  echo "</table>";

  while ($row = pg_fetch_row($result)) {
    echo "<table class='simple-little-table' style=\"
    text-align: center;\">";
    echo "<td>";
    echo "$row[0]\n ";
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
    echo "<td style=\"width:23%;\">";
    echo "$row[4]\n";
    echo "</td>";
    echo "</table>";
  }
  echo "<div style=\"margin-bottom:70px; color:#1b2631\">" . "." . "</div>";

  ?>