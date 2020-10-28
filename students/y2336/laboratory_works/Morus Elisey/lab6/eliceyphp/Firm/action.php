<link rel="stylesheet" href="assets/style.php">

<?php
$arg1 = $_POST['Firm_Number'];
$arg3 = $_POST['Name'];
$arg4 = $_POST['Country'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'OlimpTrade';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"Firm\" VALUES ('$arg1', '$arg3', '$arg4')");
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"Firm\" where \"Firm_Number\" = '$arg1'");
    
    // echo "\nPDO::errorInfo():\n";
    // print_r($pdo->errorInfo());
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"Firm\" SET \"Name\" = '$arg3',\"Country\" = '$arg4' where \"Firm_Number\" = '$arg1'");
}
$data = $pdo->query('SELECT * FROM public."Firm"');

echo "<div style=\"font-weight: 500; font-size: 26px; text-align: center; margin-bottom: 20px;\">" . "Firms <br/>" . "</div>";

echo "<table class='simple-little-table' style=\"
text-align: center;\">"; 
    echo "<td>";
    echo "Firm Number";
    echo "</td>";;
    echo "<td>";
    echo "Name";
    echo "</td>";
    echo "<td>";
    echo "Country";
    echo "</td>";
echo "</table>";

foreach ($data as $row) {
    echo "<table class='simple-little-table' style=\"
    text-align: center;\">";
    echo "<td>";
    echo " " . $row['Firm_Number'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['Name'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['Country'] . " ";
    echo "</td>";
    echo "</table>";
}
?>