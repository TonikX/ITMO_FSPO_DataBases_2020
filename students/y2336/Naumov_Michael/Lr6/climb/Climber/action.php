<link rel="stylesheet" href="../assets/style.php">

<?php
$arg1 = $_POST['id_climber'];
$arg3 = $_POST['name_climber'];
$arg4 = $_POST['id_club'];
$arg5 = $_POST['contact_climber'];
$arg6 = $_POST['address_climed'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'climb';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"climber\" VALUES ('$arg1','$arg3', '$arg4', '$arg5', '$arg6')");
    // echo "\nPDO::errorInfo():\n";
    // print_r($pdo->errorInfo());
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"climber\" where \"id_climber\" = '$arg1'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"climber\" SET \"name_climber\" = '$arg3', \"id_club\" = '$arg4', \"contact_climber\" = '$arg5', \"address_climed\" = '$arg6'
    where \"id_climber\" = '$arg1'");
}

$data = $pdo->query('SELECT * FROM public.climber');
echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px\">";
echo "<td>";
echo "ID";
echo "</td>";;
echo "<td>";
echo "Name";
echo "</td>";
echo "<td>";
echo "Club";
echo "</td>";
echo "<td>";
echo "Contact club";
echo "</td>";
echo "<td>";
echo "Address climber";
echo "</td>";
echo "</table>";

foreach ($data as $row) {
    echo "<table class='simple-little-table' style=\"
    text-align: center;\">";
    echo "<td>";
    echo "" . $row['id_climber'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['name_climber'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['id_club'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['contact_climber'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['address_climed'] . "";
    echo "</td>";
    echo "</table>";
}
echo "<div style=\"margin-bottom:70px; color:#1b2631\">" . " " . "</div>";

?>