<link rel="stylesheet" href="assets/style.php">
<body style='background: url(https://html5book.ru/wp-content/uploads/2015/07/background39.png)'>
<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='qwerty';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = 'SELECT "Competition"."Competition_Num", "Competition"."Ring_Num", "Expert"."Full_Name" from "Competition" 
inner join "Expert" on "Competition"."Ring_Num" = "Expert"."Ring_Num" 
where "Competition"."Competition_Num" = '.$_POST['Competition_Num'].'';

$result = pg_query($query);
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
} 
echo "<table>"; 
    echo "<td>";
    echo "Competition Num";
    echo "</td>";;
    echo "<td>";
    echo "Ring Num";
    echo "</td>";
    echo "<td>";
    echo "Full Name";
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
  echo "</table>";
}
?>
