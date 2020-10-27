<link rel="stylesheet" href="assets/style.php">

<?php
$arg1 = $_POST['ID_Office'];
$arg3 = $_POST['Name'];
$arg4 = $_POST['Country'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'OlimpTrade';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"Offices\" VALUES ('$arg1', '$arg3', '$arg4')");
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"Offices\" where \"ID_Office\" = '$arg1'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"Offices\" SET \"Name\" = '$arg3',\"Country\" = '$arg4' where \"ID_Office\" = '$arg1'");
}
$data = $pdo->query('SELECT * FROM public."Offices"');
echo "<div style=\"
font_family = 'Montserrat, sans-serif'
font-weight: 500;
font-size: 26px;
text-align: center;
margin-bottom: 20px;\">" . "Offices <br/>" . "</div>";

echo "<table class='simple-little-table' style=\"
text-align: center;\">";
echo "<td>";
echo "Office Number";
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
    echo " " . $row['ID_Office'] . " ";
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