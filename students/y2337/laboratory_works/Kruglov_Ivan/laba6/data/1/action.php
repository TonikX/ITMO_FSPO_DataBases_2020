<link rel="stylesheet" href="assets/style.php">
<body style='background: url(https://html5book.ru/wp-content/uploads/2015/07/background39.png)'>
<?php
$arg1 = $_POST['Passport_Num'];
$arg3 = $_POST['Klichka'];
$arg4 = $_POST['Poroda'];
$arg5 = $_POST['Age'];
$arg6 = $_POST['Class'];
$arg7 = $_POST['Dad_Name'];
$arg8 = $_POST['Mom_Name'];
$arg9 = $_POST['Graft_Date'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'qwerty';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"Dog_Passport\" VALUES ('$arg1', '$arg3', '$arg4', '$arg5', '$arg6', '$arg7', '$arg8', '$arg9')");
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"Dog_Passport\" where \"Passport_Num\" = '$arg1'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"Dog_Passport\" SET \"Klichka\" = '$arg3',\"Poroda\" = '$arg4',\"Age\" = '$arg5',\"Class\" = '$arg6',\"Dad_Name\" = '$arg7',\"Mom_Name\" = '$arg8',\"Graft_Date\" = '$arg9' where \"Passport_Num\" = '$arg1'");
}
$data = $pdo->query('SELECT * FROM public."Dog_Passport"');
echo ("\nPassports: <br/>");

echo "<table>"; 
    echo "<td>";
    echo "Passport Num";
    echo "</td>";;
    echo "<td>";
    echo "Klichka";
    echo "</td>";
    echo "<td>";
    echo "Poroda";
    echo "</td>";
    echo "<td>";
    echo "Age";
    echo "</td>";
    echo "<td>";
    echo "Dad Name";
    echo "</td>";
    echo "<td>";
    echo "Mom Name";
    echo "</td>";
    echo "<td>";
    echo "Graft Date";
    echo "</td>";
    echo "</table>";

foreach ($data as $row) {
    echo "<table>";
    echo "<td>";
    echo " " . $row['Passport_Num'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['Klichka'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['Poroda'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['Age'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['Dad_Name'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['Mom_Name'] . " ";
    echo "</td>";
    echo "<td>";
    echo " " . $row['Graft_Date'] ."";
    echo "<br/>\n";
    echo "</td>";
    echo "</table>";
}
?>