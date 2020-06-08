<link rel="stylesheet" href="assets/style.php">
<?php
$arg1 = $_POST['id_group'];
$arg3 = $_POST['number_group'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'College';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"Group\" VALUES ('$arg1', '$arg3')");
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"Group\" where \"id_group\" = '$arg1'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"Group\" SET \"number_group\" = '$arg3' where \"id_group\" = '$arg1'");
}
$data = $pdo->query('SELECT * FROM public."Group"');
echo ("\nGroups: <br/>");

foreach ($data as $row) {
    echo "<table>";
    echo "<td>";
    echo "ID group:  " . $row['id_group'] . " ";
    echo "</td>";
    echo "<td>";
    echo "Number group:  " . $row['number_group'] ."";
    echo "<br/>\n";
    echo "</td>";
    echo "</table>";
}
?>