<link rel="stylesheet" href="assets/style.php">
<body style='background: url(https://html5book.ru/wp-content/uploads/2015/07/background39.png)'>
<?php
$arg1 = $_POST['Competition_Num'];
$arg3 = $_POST['ID_Expert'];
$arg4 = $_POST['ID_Dog'];
$arg5 = $_POST['Points_Amount'];
$arg6 = $_POST['Row_Num'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'qwerty';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"Estimation_Process\" VALUES ('$arg1', '$arg3', '$arg4', '$arg5', '$arg6')");
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"Estimation_Process\" where \"Row_Num\" = '$arg6'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"Estimation_Process\" SET \"Competition_Num\" = '$arg1', \"ID_Expert\" = '$arg3',
    \"ID_Dog\" = '$arg4', \"Points_Amount\" = '$arg5'
    where \"Row_Num\" = '$arg6'");
}
$data = $pdo->query('SELECT "ep"."Row_Num", "dp"."Klichka", "p"."Participant_Name", "e"."Full_Name", "ep"."Points_Amount" from "Estimation_Process" "ep" inner join "Dog" "d" on "ep"."ID_Dog" = "d"."ID_Dog" inner join "Dog_Passport" "dp" on "d"."Passport_Num" = "dp"."Passport_Num" inner join "Participant" "p" on "d"."ID_Participant" = "p"."ID_Participant" inner join "Expert" "e" on "ep"."ID_Expert" = "e"."ID_Expert"');
echo ("Competitions: <br/>");

echo "<table>"; 
    echo "<td>";
    echo "Id";
    echo "</td>";
    echo "<td>";
    echo "Klichka";
    echo "</td>";
    echo "<td>";
    echo "Participant Name";
    echo "</td>";
    echo "<td>";
    echo "Full Name";
    echo "</td>";
    echo "<td>";
    echo "Points Amount";
    echo "</td>";
    echo "</table>";

foreach ($data as $row) {
    echo "<table>";
    echo "<td>";
    echo "" . $row['Row_Num'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['Klichka'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['Participant_Name'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['Full_Name'] . "";
    echo "</td>";
    echo "<td>";
    echo " ".$row['Points_Amount']."";
    echo "</td>";
    
    echo "</table>";
}
?>