<link rel="stylesheet" href="assets/style.php">
<body style='background: url(https://html5book.ru/wp-content/uploads/2015/07/background39.png)'>
<?php
$arg1 = $_POST['Competition_Num'];
$arg3 = $_POST['Ring_Num'];
$arg4 = $_POST['Time_Start'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'qwerty';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"Competition\" VALUES ('$arg1','$arg3', '$arg4')");
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"Competition\" where \"Competition_Num\" = '$arg1'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"Competition\" SET \"Ring_Num\" = '$arg3',  \"Time_Start\" = '$arg4'
    where \"Competition_Num\" = '$arg1'");
}

$data = $pdo->query('SELECT * FROM public."Competition"');
echo ("Competition: <br/>");
echo "<table>"; 
    echo "<td>";
    echo "Competition Num";
    echo "</td>";
    echo "<td>";
    echo "Ring Num";
    echo "</td>";
    echo "<td>";
    echo "Time Start";
    echo "</td>";
    echo "</table>";

foreach ($data as $row) {
    echo "<table>";
    echo "<td>";
    echo "" . $row['Competition_Num'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['Ring_Num'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['Time_Start'] . "";
    echo "</td>";
    echo "</table>";
}
?>