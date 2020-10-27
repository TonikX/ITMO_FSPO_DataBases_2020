<link rel="stylesheet" href="assets/style.php">

  <?php
  $dbuser = 'postgres';
  $dbpass = '1234';
  $host = 'localhost';
  $dbname = 'OlimpTrade';
  $db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
  $query = 'SELECT "Offices"."Name", (select sum("Consignments"."Sell_Price" * "Amount_Goods")  
    from "Consignments"  
    inner join "Goods_In_Consignments"  
    on "Consignments"."ID_Consignment" = "Goods_In_Consignments"."ID_Consignment" 
    inner join "Brokers"  
    on "Consignments"."ID_Broker" = "Brokers"."ID_Broker" 
    where "Brokers"."ID_Offices" = "Offices"."ID_Office" 
    ) as "Total revenue" 
    FROM "Offices"
    where "Offices"."ID_Office" = ' . $_POST['ID_Office'] . '';

  $result = pg_query($query) or die('Query failed: ' . pg_last_error());;
  if (!$result) {
    echo "Произошла ошибка.\n";
    exit;
  }

  echo "<div style=\"font-weight: 500; font-size: 26px; text-align: center; margin-bottom: 20px;\">" . "Office <br/>" . "</div>";

  echo "<table class='simple-little-table' style=\"
  text-align: center;\">";
  echo "<td>";
  echo "Office Name ";
  echo "</td>";;
  echo "<td>";
  echo "Total revenue";
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