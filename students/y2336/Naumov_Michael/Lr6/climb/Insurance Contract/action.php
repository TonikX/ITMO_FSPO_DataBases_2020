<link rel="stylesheet" href="../assets/style.php">

<?php
$arg1 = $_POST['id_agency'];
$arg3 = $_POST['id_climber'];
$arg4 = $_POST['insurance_contract_terms'];
$arg5 = $_POST['id_insurance_contract'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'climb';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"insurance_contract\" VALUES ('$arg1', '$arg3', '$arg4', '$arg5')");
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"insurance_contract\" where \"id_insurance_contract\" = '$arg5'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"insurance_contract\" SET \"id_agency\" = '$arg1', \"id_climber\" = '$arg3', \"insurance_contract_terms\" = '$arg4' where \"id_insurance_contract\" = '$arg5'");
}

$data = $pdo->query('SELECT * FROM public.insurance_contract');
echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px\">";
echo "<td>";
echo "ID agency";
echo "</td>";;
echo "<td>";
echo "ID climber";
echo "</td>";
echo "<td>";
echo "Terms";
echo "</td>";
echo "<td>";
echo "ID insurance contract";
echo "</td>";
echo "</table>";

foreach ($data as $row) {
    echo "<table class='simple-little-table' style=\"
    text-align: center;\">";
    echo "<td>";
    echo "" . $row['id_agency'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['id_climber'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['insurance_contract_terms'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['id_insurance_contract'] . "";
    echo "</td>";
    echo "</table>";
}
echo "<div style=\"margin-bottom:70px; color:#1b2631\">" . " " . "</div>";
?>