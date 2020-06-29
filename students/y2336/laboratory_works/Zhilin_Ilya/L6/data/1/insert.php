<link rel="stylesheet" href="assets/style.php">
<body style='background: url(https://html5book.ru/wp-content/uploads/2015/07/background39.png)'>
<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='qwerty';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = 'SELECT "Dog_Passport"."Passport_Num", "Dog_Passport"."Klichka" FROM "Dog" LEFT JOIN "Dog_Passport" ON "Dog"."Passport_Num" = "Dog_Passport"."Passport_Num" WHERE "Dog_Passport"."Age" > '.$_POST['Age'].'';

$result = pg_query($query) or die('Query failed: ' . pg_last_error());;
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
} 
echo "<alltable>";
echo "<table>"; 
    echo "<td>";
    echo "Dog Passport";
    echo "</td>";;
    echo "<td>";
    echo "Name";
    echo "</td>";
    echo "</table>";

while ($row = pg_fetch_row($result)) {
  echo "<table>";
  echo "<td>";
  echo " $row[0]\n";
  echo "</td>";
  echo "<td>";
  echo " $row[1]\n";
  echo "<br/>\n";
  echo "</td>";
  echo "</table>";
}
echo "</alltable>";
?>
