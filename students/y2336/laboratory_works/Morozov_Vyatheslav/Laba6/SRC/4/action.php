<link rel="stylesheet" href="assets/style.php">
<?php
$arg1 = $_POST['id'];
$arg3 = $_POST['subject_id'];
$arg4 = $_POST['student_id'];
$arg5 = $_POST['grade'];
$arg6 = $_POST['date'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'College';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"Grade\" VALUES ('$arg1','$arg3', '$arg4', '$arg5', '$arg6')");
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"Grade\" where \"id\" = '$arg1'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"Grade\" SET \"subject_id\" = '$arg3',  \"student_id\" = '$arg4', \"grade\" = '$arg5', \"date\" = '$arg6'
    where \"id\" = '$arg1'");
}

$data = $pdo->query('SELECT public."Grade"."id", public."Student"."name", public."Student"."surname", public."Subject"."subject_name", public."Grade"."grade", public."Grade"."date"
from public."Grade"
inner join public."Student" on (public."Student"."id" = public."Grade"."student_id")
inner join public."Subject" on (public."Grade"."subject_id" = public."Subject"."id")');
echo ("Grades: <br/>");
echo "<table>"; 
    echo "<td>";
    echo "Id grade";
    echo "</td>";
    echo "<td>";
    echo "Subject";
    echo "</td>";
    echo "<td>";
    echo "Student";
    echo "</td>";
    echo "<td>";
    echo "Grade";
    echo "</td>";
    echo "<td>";
    echo "Date";
    echo "</td>";
    echo "</table>";

foreach ($data as $row) {
    echo "<table>";
    echo "<td>";
    echo "" . $row['id'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['subject_name'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['name'] . " " . $row['surname'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['grade'] . "";
    echo "</td>";
    echo "<td>";
    echo "" . $row['date'] . "";
    echo "</td>";
    echo "</table>";
}
?>