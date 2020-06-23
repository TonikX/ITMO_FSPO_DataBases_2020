<link rel="stylesheet" href="assets/css/style.php">
<?php
echo "<body style='background: linear-gradient(180deg, rgb(69, 129, 168) 0%, rgb(97, 84, 143) 100%)'>";
$arg3 = $_POST['ID_material'];
$arg4 = $_POST['type_material'];
$arg5 = $_POST['name_material'];
$arg6 = $_POST['date_create_material'];
$arg7 = $_POST['Name_developer'];
$arg8 = $_POST['price_material'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'Nikita';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"Material\" VALUES ('$arg3', '$arg4', '$arg5', '$arg6', '$arg7', '$arg8')");
    echo "\nPDO::errorInfo():\n";
    print_r($pdo->errorInfo());
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"Material\" WHERE \"ID_material\" = '$arg3'");
    echo "\nPDO::errorInfo():\n";
    print_r($pdo->errorInfo());
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"Material\" SET \"type_material\" = '$arg4', \"name_material\" = '$arg5', \"date_create_material\" = '$arg6', \"Name_developer\" = '$arg7', \"price_material\" = '$arg8' where \"ID_material\" = '$arg3'");
    echo "\nPDO::errorInfo():\n";
    print_r($pdo->errorInfo());
}
$data = $pdo->query('SELECT * FROM "Material"');
echo ("\nMaterial: <br/>");

foreach ($data as $row) {
    echo "<table>";
    echo "<th>";
    echo "ID material: " . $row['ID_material'] . "<br/>";
    echo "</th>";
    echo "<th>";
    echo "Type material: " . $row['type_material'] . " ";
    echo "</th>";
    echo "<th>";
    echo "Name material:" . $row['name_material'] . "<br/>";
    echo "</th>";
    echo "<th>";
    echo "Date create: " . $row['date_create_material'] . " ";
    echo "</th>";
    echo "<th>";
    echo "Name developer: " . $row['Name_developer'] . "<br/>";
    echo "</th>";
    echo "<th>";
    echo "Price material: " . $row['price_material'] . " ";
    echo "</th>";
    echo "</table>";
}
echo ("Action was " . $arg2 . "<br/>");
echo ("ID material was " . $arg3 . "<br/>");
echo ("Type material was " . $arg4 . "<br/>");
echo ("Name material was " . $arg5 . "<br/>");
echo ("Date create was " . $arg6 . "<br/>");
echo ("Name developer was " . $arg7 . "<br/>");
echo ("Price material was " . $arg8 . "<br/>");
?>