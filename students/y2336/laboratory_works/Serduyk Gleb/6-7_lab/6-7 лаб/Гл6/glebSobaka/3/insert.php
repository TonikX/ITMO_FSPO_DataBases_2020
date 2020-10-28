<link rel="stylesheet" href="assets/style.php">

<body style='background: #1b2631'>
  <?php
  $dbuser = 'postgres';
  $dbpass = '1234';
  $host = 'localhost';
  $dbname = 'qwerty';
  $db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
  $query = 'SELECT "Dog_Passport"."Passport_Num", "Dog"."Club_Title", "Dog_Passport"."Name", "Dog_Passport"."Poroda", "Dog_Passport"."Age", "Dog_Passport"."Class", 
"Participant"."ID_Participant", "Participant"."Participant_Name" 
from public."Dog" 
inner join public."Dog_Passport" on "Dog"."Passport_Num" = "Dog_Passport"."Passport_Num" 
inner join public."Participant" on "Dog"."ID_Participant" = "Participant"."ID_Participant" 
where "Dog"."Club_Title" = ' . $_POST['Club_Title'] . '';

  $result = pg_query($query);
  if (!$result) {
    echo "Произошла ошибка.\n";
    exit;
  }
  echo "<div style=\"font-size:32px; color:#f9e79f; text-align: center; margin-top: 30px; 
  font-family: 'Montserrat', sans-serif;
  \">" . "Dogs from club " . $_POST['Club_Title'] . ": <br/>" . "</div>";
    echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px\">";
  echo "<td>";
  echo "Passport Num";
  echo "</td>";;
  echo "<td>";
  echo "Club Title";
  echo "</td>";
  echo "<td>";
  echo "Name";
  echo "</td>";
  echo "<td>";
  echo "Poroda";
  echo "</td>";
  echo "<td>";
  echo "Age";
  echo "</td>";
  echo "<td>";
  echo "Class";
  echo "</td>";
  echo "<td>";
  echo "ID Participant";
  echo "</td>";
  echo "<td>";
  echo "Participant Name";
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
    echo "<td>";
    echo "$row[5]\n";
    echo "</td>";
    echo "<td>";
    echo "$row[6]\n";
    echo "</td>";
    echo "<td>";
    echo "$row[7]\n";
    echo "</td>";
    echo "</table>";
  }
  echo "<div style=\"margin-bottom:70px; color:#1b2631\">" . "." . "</div>";

  ?>