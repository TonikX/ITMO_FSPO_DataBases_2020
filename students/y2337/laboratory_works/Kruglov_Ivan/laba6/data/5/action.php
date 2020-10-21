<link rel="stylesheet" href="assets/style.php">
<body style='background: url(https://html5book.ru/wp-content/uploads/2015/07/background39.png)'>
<?php
$arg1 = $_POST['ID_Sponsor'];
$arg3 = $_POST['Total_Investment'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'qwerty';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"Sponsor\" VALUES ('$arg1','$arg3')");
    
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"Sponsor\" where \"ID_Sponsor\" = '$arg1'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"Sponsor\" SET \"Total_Investment\" = '$arg3'
    where \"ID_Sponsor\" = '$arg1'");
}

$data = $pdo->query('SELECT * FROM public."Sponsor"');
echo ("Sponsors: <br/>");
echo "<table>";
    echo "<td>";
    echo "Sponsor";
    echo "</td>";
    echo "<td>";
    echo "Total Investment";
    echo "</td>";;
    echo "</table>";

foreach ($data as $row) {
    echo "<table>";
    echo "<td>";
    echo "" . $row['ID_Sponsor'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['Total_Investment'] . "";
    echo "</td>";
    echo "</table>";
}
?>