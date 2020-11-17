<link rel="stylesheet" href="../assets/style.php">

<?php
$arg1 = $_POST['id'];
$arg3 = $_POST['type'];
$arg4 = $_POST['object_id'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'ecobd';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"zone\" VALUES ('$arg1', '$arg3', '$arg4')");
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"zone\" where \"id\" = '$arg1'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"zone\" SET \"type\" = '$arg3', \"object_id\" = '$arg4' where \"id\" = '$arg1'");
}

$data = $pdo->query('SELECT * from "zone"');
echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px\">";
echo "<td>";
echo "Id Зоны";
echo "</td>";
echo "<td>";
echo "Тип";
echo "</td>";
echo "<td>";
echo "ID Объекта";
echo "</td>";
echo "</table>";

foreach ($data as $row) {
    echo "<table class='simple-little-table' style=\"
    text-align: center;\">";
    echo "<td>";
    echo "" . $row['id'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['type'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['object_id'] . "";
    echo "</td>";
    echo "</table>";
}
echo "<div style=\"margin-bottom:70px; color:#1b2631\">" . " " . "</div>";
?>