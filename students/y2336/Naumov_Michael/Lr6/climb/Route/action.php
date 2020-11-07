<link rel="stylesheet" href="../assets/style.php">

<?php
$arg1 = $_POST['id_route'];
$arg3 = $_POST['description_route'];
$arg4 = $_POST['name_route'];
$arg5 = $_POST['Id_peak'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'climb';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"route\" VALUES ('$arg1', '$arg3', '$arg4', '$arg5')");
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"route\" where \"id_route\" = '$arg1'");
} 
// else if ($arg2 == "edit") {
//     $pdo->query("UPDATE public.\"route\" SET \"description_route\" = '$arg3', \"Id_peak\" = '$arg4' where \"id_route\" = '$arg1'");
//      echo "\nPDO::errorInfo():\n";
//     print_r($pdo->errorInfo());
// }
$data = $pdo->query('SELECT * FROM public.route');
echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px; width: 80%;\">";
echo "<td>";
echo "ID Route";
echo "</td>";;
echo "<td>";
echo "Description";
echo "</td>";
echo "<td>";
echo "Name route";
echo "</td>";
echo "<td>";
echo "Id peak";
echo "</td>";
echo "</table>";

foreach ($data as $row) {
    echo "<table class='simple-little-table' style=\"
    text-align: center; width: 80%;\">";
    echo "<td >";
    echo " " . $row['id_route'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['description_route'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['name_route'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['Id_peak'] . " ";
    echo "</td>";
    echo "</table>";
}
echo "<div style=\"margin-bottom:70px; color:#1b2631\">" . " " . "</div>";

?>