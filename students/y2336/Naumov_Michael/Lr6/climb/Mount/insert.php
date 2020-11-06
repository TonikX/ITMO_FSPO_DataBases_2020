<link rel="stylesheet" href="../assets/style.php">

  <?php
  $dbuser = 'postgres';
  $dbpass = '1234';
  $host = 'localhost';
  $dbname = 'climb';
  $db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
  $query = 'SELECT * FROM public.mountain where "mountain"."id_mountain" = ' . $_POST['id_mountain'] . '';

  $result = pg_query($query);
  if (!$result) {
    echo "Произошла ошибка.\n";
    exit;
  }
  echo "<table class='simple-little-table' style=\"
  text-align: center; margin-top: 20px\">";
  echo "<td>";
  echo "Country";
  echo "</td>";
  echo "<td>";
  echo "Area";
  echo "</td>";
  echo "<td>";
  echo "ID";
  echo "</td>";
  echo "<td>";
  echo "Name";
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
    echo "</table>";
  }
  echo "<div style=\"margin-bottom:70px; color:#1b2631\">" . "." . "</div>";

  ?>