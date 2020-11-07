<link rel="stylesheet" href="../assets/style.php">

<?php
$arg1 = $_POST['id'];
$arg3 = $_POST['address'];
$arg4 = $_POST['name'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'ecobd';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"object\" VALUES ('$arg1','$arg3','$arg4')");
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"object\" where \"id\" = '$arg1'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"object\" SET \"address\" = '$arg3', \"name\" = '$arg4' 
    where \"id\" = '$arg1'");
}

$data = $pdo->query('SELECT * FROM public."object"');
echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px\">";
echo "<td>";
echo "ID объекта";
echo "</td>";
echo "<td>";
echo "Адрес";
echo "</td>";
echo "<td>";
echo "Название объекта";
echo "</td>";
echo "</table>";

foreach ($data as $row) {
    echo "<table class='simple-little-table' style=\"
    text-align: center;\">";
    echo "<td>";
    echo "" . $row['id'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['address'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['name'] . "";
    echo "</td>";
    echo "</table>";
}
echo "<div style=\"margin-bottom:70px; color:#1b2631\">" . " " . "</div>";

?>