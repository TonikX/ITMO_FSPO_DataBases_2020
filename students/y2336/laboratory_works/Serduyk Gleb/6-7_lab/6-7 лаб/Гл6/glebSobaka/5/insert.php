<link rel="stylesheet" href="assets/style.php">

<body style='background: #1b2631'>
  <?php
  $dbuser = 'postgres';
  $dbpass = '1234';
  $host = 'localhost';
  $dbname = 'qwerty';
  $db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
  $query = 'SELECT "Event"."Competition_Num", "Event"."Event_Date", "Competition"."Time_Start" from "Event" inner join "Competition" on "Event"."Competition_Num" = "Competition"."Competition_Num"
where "Event"."Competition_Num" = ' . $_POST['Competition_Num'] . '';
  $result = pg_query($query);
  if (!$result) {
    echo "Произошла ошибка.\n";
    exit;
  }
  echo "<table class='simple-little-table' style=\"
  text-align: center; margin-top: 20px\">";
    echo "<td>";
  echo "Competition Num";
  echo "</td>";
  echo "<td>";
  echo "Event Date";
  echo "</td>";
  echo "<td>";
  echo "Time Start";
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
    echo "</table>";
  }
  echo "<div style=\"margin-bottom:70px; color:#1b2631\">" . "." . "</div>";

  ?>