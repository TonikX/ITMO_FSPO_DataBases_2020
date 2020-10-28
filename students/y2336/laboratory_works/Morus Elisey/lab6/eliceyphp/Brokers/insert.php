<link rel="stylesheet" href="assets/style.php">

<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'OlimpTrade';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = 'SELECT distinct "Goods_Name" 
  from "Goods" 
  where "Goods_Name" in ( 
  select "Goods_Name" 
  from "Goods" 
  inner join "Goods_In_Consignments"  
  on "Goods"."ID_Good" = "Goods_In_Consignments"."ID_Good" 
  inner join "Consignments"  
  on "Goods_In_Consignments"."ID_Consignment" = "Consignments"."ID_Consignment" 
  inner join "Brokers"  
  on "Consignments"."ID_Broker" = "Brokers"."ID_Broker" 
  inner join "Offices"  
  on "Offices"."ID_Office" = "Brokers"."ID_Offices" 
  where "Brokers"."ID_Broker" = ' . $_POST['ID_Broker'] . ') ';

$result = pg_query($query) or die('Query failed: ' . pg_last_error());;
if (!$result) {
  echo "Произошла ошибка.\n";
  exit;
}

echo "<div style=\"font-weight: 500; font-size: 26px; text-align: center; margin-bottom: 20px;\">" . "Goods <br/>" . "</div>";

echo "<table class='simple-little-table' style=\"
  text-align: center;\">";
echo "<td>";
echo "Goods Name ";
echo "</td>";
echo "</table>";

while ($row = pg_fetch_row($result)) {
  echo "<table class='simple-little-table' style=\"
      text-align: center;\">";
  echo "<td>";
  echo "$row[0]\n";
  echo "</td>";
  echo "</table>";
}
?>