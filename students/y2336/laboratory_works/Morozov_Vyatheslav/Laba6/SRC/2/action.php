<link rel="stylesheet" href="assets/style.php">
<?php
$arg1 = $_POST['id'];
$arg3 = $_POST['group_id'];
$arg4 = $_POST['teacher_id'];
$arg5 = $_POST['subject_id'];
$arg6 = $_POST['lesson_number'];
$arg7 = $_POST['lesson_day'];
$arg2 = $_POST['action'];
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'College';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if ($arg2 == "add") {
    $pdo->query("INSERT INTO public.\"Lesson\" VALUES ('$arg1', '$arg3', '$arg4', '$arg5', '$arg6', '$arg7')");
} else if ($arg2 == "delete") {
    $pdo->query("DELETE from public.\"Lesson\" where \"lesson_number\" = '$arg6' AND \"group_id\" = '$arg3' AND \"lesson_day\" = '$arg7'");
} else if ($arg2 == "edit") {
    $pdo->query("UPDATE public.\"Lesson\" SET \"lesson_number\" = '$arg6', \"group_id\" = '$arg3', \"lesson_day\" = '$arg7', 
    \"teacher_id\" = '$arg4', \"subject_id\" = '$arg5'
    where \"id\" = '$arg1'");
}
$data = $pdo->query('SELECT "Lesson"."id", public."Teacher"."name", public."Teacher"."surname", "number_group", public."Subject"."subject_name", 
public."Lesson"."lesson_number", public."Lesson"."lesson_day"
FROM public."Lesson"
inner join public."Teacher" on (public."Teacher"."id" = public."Lesson"."teacher_id")
inner join public."Subject" on (public."Subject"."id" = public."Lesson"."subject_id")
inner join public."Group" on ((public."Group"."id_group" = public."Lesson"."group_id"))');
echo ("Lessons: <br/>");

echo "<table>"; 
    echo "<td>";
    echo "Id lesson";
    echo "</td>";;
    echo "<td>";
    echo "Teacher";
    echo "</td>";
    echo "<td>";
    echo "Group";
    echo "</td>";
    echo "<td>";
    echo "Subject Id";
    echo "</td>";
    echo "<td>";
    echo "Lesson number";
    echo "</td>";
    echo "<td>";
    echo "Day";
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
    echo "<td>";
    echo " ".$row['subject_name']."";
    echo "</td>";
    echo "<td>";
    echo "".$row['lesson_number']."";
    echo "</td>";
    echo "<td>";
    echo "".$row['lesson_day']."";
    echo "</td>";
    echo "<br/>\n";
    echo "</table>";
}
?>