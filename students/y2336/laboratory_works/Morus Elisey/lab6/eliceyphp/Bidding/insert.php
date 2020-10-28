<link rel="stylesheet" href="assets/style.php">

<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'OlimpTrade';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = '    SELECT "Bidding"."ID_Bidding", "Date_Bidding", "Manager_Response", "Consignments"."Sell_Price" 
  FROM public."Bidding" 
  inner join "Sale"  
  on ("Bidding"."ID_Bidding" = "Sale"."ID_Bidding") 
  inner join "Consignments"  
  on ("Consignments"."ID_Consignment" = "Sale"."ID_Consignment") 
  where "Consignments"."Status" = ' . $_POST['Status'] . '';



$result = pg_query($query) or die('Query failed: ' . pg_last_error());;
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
}

echo "<div style=\"font-weight: 500; font-size: 26px; text-align: center; margin-bottom: 20px;\">" . "Bidding <br/>" . "</div>";

echo "<table class='simple-little-table' style=\"
  text-align: center;\">";
echo "<td>";
echo "Bidding Num ";
echo "</td>";;
echo "<td>";
echo "Date";
echo "</td>";
echo "<td>";
echo "Manage response";
echo "</td>";
echo "<td>";
echo "Sell price";
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