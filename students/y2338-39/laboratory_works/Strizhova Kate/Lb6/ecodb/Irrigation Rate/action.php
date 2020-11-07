<link rel="stylesheet" href="../assets/style.php">

<?php
$arg1 = $_POST['season'];
$arg3 = $_POST['plant_type_id'];
$arg4 = $_POST['water_mm'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'ecobd';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"irrigation_rate\" VALUES ('$arg1','$arg3', '$arg4')");
    // echo "\nPDO::errorInfo():\n";
    // print_r($pdo->errorInfo());
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"irrigation_rate\" where \"season\" = '$arg1' AND \"plant_type_id\" = '$arg3'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"irrigation_rate\" SET \"water_mm\" = '$arg4'
    where \"season\" = '$arg1' AND \"plant_type_id\" = '$arg3'");
}

$data = $pdo->query('SELECT "irrigation_rate"."season", "plant_type"."name", "irrigation_rate"."water_mm" from irrigation_rate, plant_type
where "plant_type"."id" = "irrigation_rate"."plant_type_id"');
echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px\">";
echo "<td>";
echo "Сезон";
echo "</td>";;
echo "<td>";
echo "Растение";
echo "</td>";
echo "<td>";
echo "Вода";
echo "</td>";
echo "</table>";

foreach ($data as $row) {
    echo "<table class='simple-little-table' style=\"
    text-align: center;\">";
    echo "<td>";
    echo "" . $row['season'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['name'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['water_mm'] . "";
    echo "</td>";
    echo "</table>";
}
echo "<div style=\"margin-bottom:70px; color:#1b2631\">" . " " . "</div>";

?>