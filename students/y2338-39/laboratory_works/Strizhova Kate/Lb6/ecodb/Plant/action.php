<link rel="stylesheet" href="../assets/style.php">

<?php
$arg1 = $_POST['id'];
$arg3 = $_POST['zone_id'];
$arg4 = $_POST['plant_type_id'];
$arg5 = $_POST['date_of_planting'];
$arg6 = $_POST['name'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'ecobd';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"plant\" VALUES ('$arg1', '$arg3', '$arg4', '$arg5', '$arg6')");
    // echo "\nPDO::errorInfo():\n";
    // print_r($pdo->errorInfo());
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"plant\" where \"id\" = '$arg1'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"plant\" SET \"zone_id\" = '$arg3', \"plant_type_id\" = '$arg4' , \"date_of_planting\" = '$arg5' , \"name\" = '$arg6' 
    where \"id\" = '$arg1'");
    // echo "\nPDO::errorInfo():\n";
    // print_r($pdo->errorInfo());
}

$data = $pdo->query('SELECT * FROM public."plant"');
echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px; width: 70%\">";
echo "<td>";
echo "ID растения";
echo "</td>";
echo "<td>";
echo "ID зоны";
echo "</td>";
echo "<td>";
echo "ID типа растения";
echo "</td>";
echo "<td>";
echo "Дата посадки";
echo "</td>";
echo "<td style=\"width: 23%\">";
echo "Название растения";
echo "</td>";
echo "</table>";

foreach ($data as $row) {
    echo "<table class='simple-little-table' style=\"
    text-align: center; width: 70%\">";
    echo "<td>";
    echo "" . $row['id'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['zone_id'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['plant_type_id'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['date_of_planting'] . "";
    echo "</td>";
    echo "<td style=\"width: 23%\">";
    echo "" . $row['name'] . "";
    echo "</td>";
    echo "</table>";
}
echo "<div style=\"margin-bottom:70px; color:#1b2631\">" . " " . "</div>";

?>