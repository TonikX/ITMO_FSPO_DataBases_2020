<link rel="stylesheet" href="assets/style.php">
<?php
$arg1 = $_POST['group_id'];
$arg3 = $_POST['name'];
$arg4 = $_POST['surname'];
$arg5 = $_POST['id'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'College';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"Student\" VALUES ('$arg5','$arg3', '$arg4', '$arg1')");
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"Student\" where \"id\" = '$arg5'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"Student\" SET \"group_id\" = '$arg1', 
    \"name\" = '$arg3', \"surname\" = '$arg4'
    where \"id\" = '$arg5'");
}

$data = $pdo->query('SELECT public."Student"."id", public."Student"."name", public."Student"."surname", public."Group"."number_group"  from public."Group"
inner join public."Student" on (public."Group"."id_group" = public."Student".group_id)');
echo ("Students: <br/>");
echo "<table>"; 
    echo "<td>";
    echo "Id student";
    echo "</td>";;
    echo "<td>";
    echo "Name Surname";
    echo "</td>";
    echo "<td>";
    echo "Group";
    echo "</td>";
    echo "</table>";

foreach ($data as $row) {
    echo "<table>";
    echo "<td>";
    echo "" . $row['id'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['name'] . " " . $row['surname'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['number_group'] . "";
    echo "</td>";
    echo "</table>";
}
?>