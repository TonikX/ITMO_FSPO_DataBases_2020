<link rel="stylesheet" href="assets/style.php">

<body style='background: #1b2631'>
  <?php
  $dbuser = 'postgres';
  $dbpass = '1234';
  $host = 'localhost';
  $dbname = 'qwerty';
  $db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
  $query = 'SELECT "Dog_Passport"."Passport_Num", "Dog_Passport"."Name" FROM "Dog" LEFT JOIN "Dog_Passport" ON "Dog"."Passport_Num" = "Dog_Passport"."Passport_Num" WHERE "Dog_Passport"."Age" > ' . $_POST['Age'] . '';

  $result = pg_query($query) or die('Query failed: ' . pg_last_error());;
  if (!$result) {
    echo "Произошла ошибка.\n";
    exit;
  }
  echo "<div style=\"font-size:32px; color:#f9e79f; text-align: center; margin-top: 30px; 
  font-family: 'Montserrat', sans-serif;
  \">" . "Собаки" . "</div>";
  echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px\">";
  echo "<td>";
  echo "Dog Passport";
  echo "</td>";;
  echo "<td>";
  echo "Name";
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
    echo "<br/>\n";
    echo "</td>";
    echo "</table>";
  }
  ?>