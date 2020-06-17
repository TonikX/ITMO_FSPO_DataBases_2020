<link rel="stylesheet" href="assets/css/style.php">
<?php
echo "<body style='background: linear-gradient(180deg, rgb(69, 129, 168) 0%, rgb(97, 84, 143) 100%)'>";
$arg3 = $_POST['ID_client'];
$arg4 = $_POST['Mail_adress_client'];
$arg5 = $_POST['Phone_number_client'];
$arg6 = $_POST['The_contact_person'];
$arg7 = $_POST['Phone_number_executor'];
$arg8 = $_POST['Mail_adress_executor'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'Nikita';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"Client\" VALUES ('$arg3', '$arg4', '$arg5', '$arg6', '$arg7', '$arg8')");
    echo "\nPDO::errorInfo():\n";
    print_r($pdo->errorInfo());
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"Client\" WHERE \"ID_client\" = '$arg3'");
    echo "\nPDO::errorInfo():\n";
    print_r($pdo->errorInfo());
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"Client\" SET \"Mail_adress_client\" = '$arg4', \"Phone_number_client\" = '$arg5', \"The_contact_person\" = '$arg6', \"Phone_number_executor\" = '$arg7', \"Mail_adress_executor\" = '$arg8' where \"ID_client\" = '$arg3'");
    echo "\nPDO::errorInfo():\n";
    print_r($pdo->errorInfo());
}
$data = $pdo->query('SELECT * FROM "Client"');
echo ("\nClients: <br/>");

foreach ($data as $row) {
    echo "<table>";
    echo "<th>";
    echo "Client ID: " . $row['ID_client'] . "<br/>";
    echo "</th>";
    echo "<th>";
    echo "Client Mail: " . $row['Mail_adress_client'] . " ";
    echo "</th>";
    echo "<th>";
    echo "Client phone:" . $row['Phone_number_client'] . "<br/>";
    echo "</th>";
    echo "<th>";
    echo "The contact person: " . $row['The_contact_person'] . " ";
    echo "</th>";
    echo "<th>";
    echo "Executor phone: " .$row['Phone_number_executor']."";
    echo "</th>";
    echo "<th>";
    echo "Executor mail: " . $row['Mail_adress_executor']."<br/>";
    echo "</th>";
    echo "</table>";
}
echo ("Action was " . $arg2 . "<br/>");
echo ("ID_client was " . $arg3 . "<br/>");
echo ("Client Mail was " . $arg4 . "<br/>");
echo ("Client phone was " . $arg5 . "<br/>");
echo ("The contact person was " . $arg6 . "<br/>");
echo ("Executor phone was " . $arg7 . "<br/>");
echo ("Executor mail was " . $arg8 . "<br/>");
?>