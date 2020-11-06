<link rel="stylesheet" href="../assets/style.php">

<?php
$arg1 = $_POST['id_group'];
$arg3 = $_POST['quantity_member'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'climb';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"group\" VALUES ('$arg1','$arg3')");
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"group\" where \"id_group\" = '$arg1'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"group\" SET \"quantity_member\" = '$arg3' 
    where \"id_group\" = '$arg1'");
}

$data = $pdo->query('SELECT * FROM public."group"');
echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px\">";
echo "<td>";
echo "ID группы";
echo "</td>";
echo "<td>";
echo "Количество участников";
echo "</td>";
echo "</table>";

foreach ($data as $row) {
    echo "<table class='simple-little-table' style=\"
    text-align: center;\">";
    echo "<td>";
    echo "" . $row['id_group'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['quantity_member'] . "";
    echo "</td>";
    echo "</table>";
}
echo "<div style=\"margin-bottom:70px; color:#1b2631\">" . " " . "</div>";

?>