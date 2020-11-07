<link rel="stylesheet" href="../assets/style.php">

<?php
$arg1 = $_POST['country_mountain'];
$arg3 = $_POST['area_mountain'];
$arg4 = $_POST['id_mountain'];
$arg5 = $_POST['name_mountain'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'climb';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"mountain\" VALUES ('$arg1', '$arg3', '$arg4', '$arg5')");
    // echo "\nPDO::errorInfo():\n";
    // print_r($pdo->errorInfo());
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"mountain\" where \"id_mountain\" = '$arg4'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"mountain\" SET \"country_mountain\" = '$arg1', \"area_mountain\" = '$arg3' , \"name_mountain\" = '$arg5'
    where \"id_mountain\" = '$arg4'");
    // echo "\nPDO::errorInfo():\n";
    // print_r($pdo->errorInfo());
}

$data = $pdo->query('SELECT * FROM public.mountain');
echo "<table class='simple-little-table' style=\"
text-align: center; margin-top: 20px; width: 70%\">";
echo "<td>";
  echo "Country";
  echo "</td>";
  echo "<td>";
  echo "Area";
  echo "</td>";
  echo "<td>";
  echo "ID";
  echo "</td>";
  echo "<td>";
  echo "Name";
  echo "</td>";
  echo "</table>";

foreach ($data as $row) {
    echo "<table class='simple-little-table' style=\"
    text-align: center; width: 70%\">";
    echo "<td>";
    echo "" . $row['country_mountain'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['area_mountain'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['id_mountain'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['name_mountain'] . "";
    echo "</td>";
    echo "</table>";
}
echo "<div style=\"margin-bottom:70px; color:#1b2631\">" . " " . "</div>";

?>