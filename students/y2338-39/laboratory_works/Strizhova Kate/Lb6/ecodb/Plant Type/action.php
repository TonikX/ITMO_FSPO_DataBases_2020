<link rel="stylesheet" href="../assets/style.php">

<?php
$arg1 = $_POST['id'];
$arg3 = $_POST['name'];
$arg4 = $_POST['property'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'ecobd';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"plant_type\" VALUES ('$arg1', '$arg3', '$arg4')");
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"plant_type\" where \"id\" = '$arg1'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"plant_type\" SET \"name\" = '$arg3',\"property\" = '$arg4' where \"id\" = '$arg1'");
}
$data = $pdo->query('SELECT * FROM public."plant_type"');
// echo "<div style=\"font-size:32px; color:#524f4e; text-align: center; margin-top: 30px; 
//   font-family: 'Montserrat', sans-serif;
//   \">" . "Rooms" . "</div>";
echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px; width: 80%;\">";
echo "<td>";
echo "ID Растения";
echo "</td>";;
echo "<td>";
echo "Тип";
echo "</td>";
echo "<td>";
echo "Описание";
echo "</td>";
echo "</table>";

foreach ($data as $row) {
    echo "<table class='simple-little-table' style=\"
    text-align: center; width: 80%;\">";
    echo "<td >";
    echo " " . $row['id'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['name'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['property'] . " ";
    echo "</td>";
    echo "</td>";
    echo "</table>";
}
echo "<div style=\"margin-bottom:70px; color:#1b2631\">" . " " . "</div>";

?>