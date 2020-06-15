<link rel="stylesheet" href="assets/css/style.php">
<?php
echo "<body style='background: linear-gradient(180deg, rgb(69, 129, 168) 0%, rgb(97, 84, 143) 100%)'>";
$arg1 = $_POST['Order_id'];
$arg3 = $_POST['ID_client'];
$arg4 = $_POST['Order_Status'];
$arg5 = $_POST['workloadd'];
$arg6 = $_POST['Name_of_advertising_services'];
$arg7 = $_POST['order_conditions'];
$arg8 = $_POST['order terms'];
$arg9 = $_POST['Phone_number_executor'];
$arg10 = $_POST['finished_materials'];
$arg11 = $_POST['ID_Executor'];
$arg12 = $_POST['ID_invoice_payment'];
$arg13 = $_POST['ID_material'];
$arg14 = $_POST['cost'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'Nikita';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"order_zakaz\" VALUES ('$arg1', '$arg3', '$arg4', '$arg5', '$arg6', '$arg7', '$arg8', '$arg9', '$arg10', '$arg11', '$arg12', '$arg13', '$arg14')");
    echo "\nPDO::errorInfo():\n";
    print_r($pdo->errorInfo());
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"order_zakaz\" where \"Order_id\" = '$arg1'");
    echo "\nPDO::errorInfo():\n";
    print_r($pdo->errorInfo());
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"order_zakaz\" SET \"ID_client\" = '$arg3', \"Order_Status\" = '$arg4', \"workloadd\" = '$arg5', \"Name_of_advertising_services\" = '$arg6', \"order_conditions\" = '$arg7', \"order terms\" = '$arg8', \"Phone_number_executor\" = '$arg9', \"finished_materials\" = '$arg10', \"ID_Executor\" = '$arg11', \"ID_invoice_payment\" = '$arg12', \"ID_material\" = '$arg13', \"cost\" = '$arg14' where \"Order_id\" = '$arg1'");
    echo "\nPDO::errorInfo():\n";
    print_r($pdo->errorInfo());
}
$data = $pdo->query('SELECT * FROM order_zakaz');
echo ("\nOrders: <br/>");

foreach ($data as $row) {
    echo "<table>";
    echo "<th>";
    echo "Order ID: " . $row['Order_id'] . " ";
    echo "</th>";
    echo "<th>";
    echo "Client ID: " . $row['ID_client'] . "<br/>";
    echo "</th>";
    echo "<th>";
    echo "Order Status: " . $row['Order_Status'] . " ";
    echo "</th>";
    echo "<th>";
    echo "Workload:" . $row['workloadd'] . "<br/>";
    echo "</th>";
    echo "<th>";
    echo "Name of advertising services:" . $row['Name_of_advertising_services'] . "<br/>";
    echo "</th>";
    echo "<th>";
    echo "Order conditions: " . $row['order_conditions'] . " ";
    echo "</th>";
    echo "<th>";
    echo "Order terms:" . $row['order terms'] . "<br/>";
    echo "</th>";
    echo "<th>";
    echo "Phone number executor: " .$row['Phone_number_executor']."";
    echo "</th>";
    echo "<th>";
    echo "Finished materials: " . $row['finished_materials']."<br/>";
    echo "</th>";
    echo "<th>";
    echo "Executor ID: " . $row['ID_Executor'] . " ";
    echo "</th>";
    echo "<th>";
    echo "Invoice payment ID: " . $row['ID_invoice_payment']."<br/>";
    echo "</th>";
    echo "<th>";
    echo "Material ID: " . $row['ID_material'] . " ";
    echo "</th>";
    echo "<th>";
    echo "Cost: " . $row['cost'] . "<br/>";
    echo "</th>";
    echo "</table>";
}
echo ("Action was " . $arg2 . "<br/>");
echo ("Order_id was " . $arg1 . "<br/>");
echo ("ID_client was " . $arg3 . "<br/>");
echo ("Order_Status was " . $arg4 . "<br/>");
echo ("workload was " . $arg5 . "<br/>");
echo ("Name_of_advertising_services was " . $arg6 . "<br/>");
echo ("order_conditions was " . $arg7 . "<br/>");
echo ("order terms was " . $arg8 . "<br/>");
echo ("Phone_number_executor was " . $arg9 . "<br/>");
echo ("finished_materials was " . $arg10 . "<br/>");
echo ("ID_Executor was " . $arg11 . "<br/>");
echo ("ID_invoice_payment was " . $arg12 . "<br/>");
echo ("ID_material was " . $arg13 . "<br/>");
echo ("cost was " . $arg14 . "<br/>");
?>