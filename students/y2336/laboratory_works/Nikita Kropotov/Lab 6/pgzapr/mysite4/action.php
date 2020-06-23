<link rel="stylesheet" href="assets/css/style.php">
<?php
echo "<body style='background: linear-gradient(180deg, rgb(69, 129, 168) 0%, rgb(97, 84, 143) 100%)'>";
$arg3 = $_POST['ID_invoice_payment'];
$arg4 = $_POST['payment_State'];
$arg5 = $_POST['Payment_price'];
$arg6 = $_POST['Payment_time'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'Nikita';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"payment\" VALUES ('$arg3', '$arg4', '$arg5', '$arg6')");
    echo "\nPDO::errorInfo():\n";
    print_r($pdo->errorInfo());
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"payment\" WHERE \"ID_invoice_payment\" = '$arg3'");
    echo "\nPDO::errorInfo():\n";
    print_r($pdo->errorInfo());
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"payment\" SET \"payment_State\" = '$arg4', \"Payment_price\" = '$arg5', \"Payment_time\" = '$arg6' where \"ID_invoice_payment\" = '$arg3'");
    echo "\nPDO::errorInfo():\n";
    print_r($pdo->errorInfo());
}
$data = $pdo->query('SELECT * FROM payment');
echo ("\nPayment: <br/>");

foreach ($data as $row) {
    echo "<table>";
    echo "<th>";
    echo "ID invoice payment: " . $row['ID_invoice_payment'] . "<br/>";
    echo "</th>";
    echo "<th>";
    echo "State: " . $row['payment_State'] . " ";
    echo "</th>";
    echo "<th>";
    echo "Price:" . $row['Payment_price'] . "<br/>";
    echo "</th>";
    echo "<th>";
    echo "Time: " . $row['Payment_time'] . " ";
    echo "</th>";
    echo "</table>";
}
echo ("Action was " . $arg2 . "<br/>");
echo ("ID invoice payment was " . $arg3 . "<br/>");
echo ("State was " . $arg4 . "<br/>");
echo ("Price was " . $arg5 . "<br/>");
echo ("Time was " . $arg6 . "<br/>");
?>