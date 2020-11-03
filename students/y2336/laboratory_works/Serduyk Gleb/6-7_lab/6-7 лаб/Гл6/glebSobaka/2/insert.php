<link rel="stylesheet" href="assets/style.php">

<body style='background: #1b2631'>
  <?php
  $dbuser = 'postgres';
  $dbpass = '1234';
  $host = 'localhost';
  $dbname = 'qwerty';
  $db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");

  $query = 'SELECT "dp"."Name", "p"."Participant_Name", "e"."Full_Name", "ep"."Points_Amount" FROM "Estimation_Process" "ep" INNER JOIN "Dog" "d" ON "ep"."ID_Dog" = "d"."ID_Dog" INNER JOIN "Dog_Passport" "dp" ON "d"."Passport_Num" = "dp"."Passport_Num" INNER JOIN "Participant" "p" ON "d"."ID_Participant" = "p"."ID_Participant" INNER JOIN "Expert" "e" ON "ep"."ID_Expert" = "e"."ID_Expert" WHERE "ep"."Competition_Num" = ' . $_POST['Competition_Num'] . '';

  $result = pg_query($query);
  if (!$result) {
    echo "Произошла ошибка.\n";
    exit;
  }
  echo "<table class='simple-little-table' style=\"
  text-align: center; margin-top: 20px\">";
  echo "<td>";
  echo "Name";
  echo "</td>";;
  echo "<td>";
  echo "Participant Name";
  echo "</td>";
  echo "<td>";
  echo "Full Name";
  echo "</td>";
  echo "<td>";
  echo "Points Amount";
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