<link rel="stylesheet" href="assets/style.php">
<?php
$arg1 = $_POST['id_class'];
$arg3 = $_POST['number_class'];
$arg4 = $_POST['teacher_id'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'College';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"Classroom\" VALUES ('$arg1','$arg3', '$arg4')");
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"Classroom\" where \"id_class\" = '$arg1'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"Classroom\" SET \"number_class\" = '$arg3',  \"teacher_id\" = '$arg4'
    where \"id_class\" = '$arg1'");
}

$data = $pdo->query('SELECT "id_class", "number_class", public."Teacher"."name", public."Teacher"."surname"
FROM public."Classroom"
inner join public."Teacher" on (public."Classroom"."teacher_id" = public."Teacher"."id")');
echo ("Classrooms: <br/>");
echo "<table>"; 
    echo "<td>";
    echo "Id class";
    echo "</td>";
    echo "<td>";
    echo "Number class";
    echo "</td>";
    echo "<td>";
    echo "Teacher";
    echo "</td>";;
    echo "</table>";

foreach ($data as $row) {
    echo "<table>";
    echo "<td>";
    echo "" . $row['id_class'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['number_class'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['name'] . " " . $row['surname'] . "";
    echo "</td>";
    echo "</table>";
}
?>