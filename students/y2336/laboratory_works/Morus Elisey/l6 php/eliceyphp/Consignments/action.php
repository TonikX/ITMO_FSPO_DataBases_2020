<link rel="stylesheet" href="assets/style.php">
<?php
$arg1 = $_POST['ID_Consignment'];
$arg3 = $_POST['Start_Date'];
$arg4 = $_POST['Prepayment'];
$arg5 = $_POST['Status'];
$arg6 = $_POST['ID_Broker'];
$arg7 = $_POST['Sell_Price'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'OlimpTrade';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"Consignments\" VALUES ('$arg1', '$arg3', '$arg4', '$arg5', '$arg6', '$arg7')");
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"Consignments\" where \"ID_Consignment\" = '$arg1'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"Consignments\" SET \"Start_Date\" = '$arg3',\"Prepayment\" = '$arg4',\"Status\" = '$arg5',\"ID_Broker\" = '$arg6',\"Sell_Price\" = '$arg7' where \"ID_Consignment\" = '$arg1'");
}
$data = $pdo->query('SELECT * FROM public."Consignments"');
echo "<div style=\"
    font_family = 'Montserrat, sans-serif'
font-weight: 500;
font-size: 26px;
text-align: center;
margin-bottom: 20px;\">" . "Consignments <br/>" . "</div>";

echo "<table class='simple-little-table' style=\"
text-align: center;\">"; 
    echo "<td>";
    echo "ID Consignment";
    echo "</td>";;
    echo "<td>";
    echo "Start date";
    echo "</td>";
    echo "<td>";
    echo "Prepayment";
    echo "</td>";
    echo "<td>";
    echo "Status";
    echo "</td>";
    echo "<td>";
    echo "ID Broker";
    echo "</td>";
    echo "<td>";
    echo "Sell price";
    echo "</td>";
echo "</table>";

foreach ($data as $row) {
    echo "<table class='simple-little-table' style=\"
    text-align: center;\">";
    echo "<td>";
    echo " " . $row['ID_Consignment'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['Start_Date'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['Prepayment'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['Status'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['ID_Broker'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['Sell_Price'] . " ";
    echo "</td>";
    echo "</table>";
}
?>