<link rel="stylesheet" href="assets/style.php">
<body style='background: url(https://html5book.ru/wp-content/uploads/2015/07/background39.png)'>
<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='qwerty';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = 'SELECT "Dog_Passport"."Passport_Num", "Dog"."Club_Title", "Dog_Passport"."Klichka", "Dog_Passport"."Poroda", "Dog_Passport"."Age", "Dog_Passport"."Class", 
"Participant"."ID_Participant", "Participant"."Participant_Name" 
from public."Dog" 
inner join public."Dog_Passport" on "Dog"."Passport_Num" = "Dog_Passport"."Passport_Num" 
inner join public."Participant" on "Dog"."ID_Participant" = "Participant"."ID_Participant" 
where "Dog"."Club_Title" = '.$_POST['Club_Title'].'';

$result = pg_query($query);
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
} 
echo ("Dogs from club ".$_POST['Club_Title'].": <br/>");
echo "<table>"; 
    echo "<td>";
    echo "Passport Num";
    echo "</td>";;
    echo "<td>";
    echo "Club Title";
    echo "</td>";
    echo "<td>";
    echo "Klichka";
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
  echo "<table>";
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
?>
