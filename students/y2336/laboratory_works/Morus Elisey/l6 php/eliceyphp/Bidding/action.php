<link rel="stylesheet" href="assets/style.php">

<?php
$arg1 = $_POST['ID_Bidding'];
$arg3 = $_POST['Date_Bidding'];
$arg4 = $_POST['Manager_Response'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'OlimpTrade';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"Bidding\" VALUES ('$arg1', '$arg3', '$arg4')");
    // echo "\nPDO::errorInfo():\n";
    // print_r($pdo->errorInfo());
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"Bidding\" where \"ID_Bidding\" = '$arg1'");
    
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"Bidding\" SET \"Date_Bidding\" = '$arg3',\"Manager_Response\" = '$arg4' where \"ID_Bidding\" = '$arg1'");
    
}
$data = $pdo->query('SELECT * from "Bidding"');

echo "<div style=\"font-weight: 500; font-size: 26px; text-align: center; margin-bottom: 20px;\">" . "Bidding <br/>" . "</div>";

echo "<table class='simple-little-table' style=\"
text-align: center;\">";
echo "<td>";
echo "ID Bidding";
echo "</td>";;
echo "<td>";
echo "Date Bidding";
echo "</td>";
echo "<td>";
echo "Manager Response";
echo "</td>";
echo "</table>";

foreach ($data as $row) {
    echo "<table class='simple-little-table' style=\"
    text-align: center;\">";
    echo "<td>";
    echo " " . $row['ID_Bidding'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['Date_Bidding'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['Manager_Response'] . " ";
    echo "</td>";
    echo "</table>";
}
?>