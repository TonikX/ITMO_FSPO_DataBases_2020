<link rel="stylesheet" href="assets/style.php">
<?php
$arg1 = $_POST['ID_Broker'];
$arg3 = $_POST['Name'];
$arg4 = $_POST['Phone_Number'];
$arg5 = $_POST['ID_Offices'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'OlimpTrade';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"Brokers\" VALUES ('$arg1', '$arg3', '$arg4', '$arg5')");
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"Brokers\" where \"ID_Broker\" = '$arg1'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"Brokers\" SET \"Name\" = '$arg3',\"Phone_Number\" = '$arg4', \"ID_Offices\" = '$arg5' where \"ID_Broker\" = '$arg1'");
    // echo "\nPDO::errorInfo():\n";
    // print_r($pdo->errorInfo());
}
$data = $pdo->query('SELECT * FROM public."Brokers"');
echo "<div style=\"font-weight: 500; font-size: 26px; text-align: center; margin-bottom: 20px;\">" . "Brokers <br/>" . "</div>";
echo "<table class='simple-little-table' style=\" text-align: center;\">";
echo "<td>";
echo "ID Broker";
echo "</td>";;
echo "<td>";
echo "Name";
echo "</td>";
echo "<td>";
echo "Phone Number";
echo "</td>";
echo "<td>";
echo "ID Office";
echo "</td>";
echo "</table>";
foreach ($data as $row) {
    echo "<table class='simple-little-table' style=\"text-align: center;\">";
    echo "<td>";
    echo " " . $row['ID_Broker'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['Name'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['Phone_Number'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['ID_Offices'] . " ";
    echo "</td>";
    echo "</table>";
}
?>