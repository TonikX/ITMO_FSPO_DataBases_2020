<link rel="stylesheet" href="assets/style.php">

  <?php
  $dbuser = 'postgres';
  $dbpass = '1234';
  $host = 'localhost';
  $dbname = 'OlimpTrade';
  $db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
  $query = 'SELECT "Consignments"."ID_Consignment", "Consignments"."Sell_Price" 
  FROM public."Consignments" 
  where "ID_Consignment" = any( 
  select "Goods_In_Consignments"."ID_Consignment" 
  from "Firm"  
  inner join "Goods"  
  on (public."Firm"."Firm_Number" = "Goods"."Firm_Number") 
  inner join "Goods_In_Consignments"  
  on (public."Goods"."ID_Good" = "Goods_In_Consignments"."ID_Good") 
  where "Country" = ' . $_POST['Country'] . ' )';

  $result = pg_query($query) or die('Query failed: ' . pg_last_error());;
  if (!$result) {
    echo "Произошла ошибка.\n";
    exit;
  }

  echo "<div style=\"font-weight: 500; font-size: 26px; text-align: center; margin-bottom: 20px;\">" . "Consignments <br/>" . "</div>";

  echo "<table class='simple-little-table' style=\"
  text-align: center;\">";
  echo "<td>";
  echo "Consignment num";
  echo "</td>";;
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
    echo "</table>";
  }
  ?>