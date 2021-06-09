<?php
$dbuser = 'v4lka004';
$dbpass = 'gfhjkm004';
$host = 'localhost';
$dbname='bibl_final';

$db = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

echo "<pre>";
var_dump($_POST);
echo "</pre>";

if(isset($_POST['sub'])){
  $query2 = "insert into reader(fio, adress, number_phone, date_birh, education, number_pasport) values(?, ?, ?, ?, ?, ?)";

  $result = $db->prepare($query2);

  $result->execute([
    $_POST["fio"],
    $_POST["adress"],
    $_POST["number_phone"],
    $_POST["date_birh"],
    $_POST["education"],
    $_POST["number_pasport"]
  ]);
}

if (isset($_POST['del'])) {
  $query ="delete from reader where number_ticket = ?";
  $result = $db->prepare($query);
  $result->execute([
    $_POST["number_ticket"]
  ]);
}

if(isset($_POST['ch'])){
  $query = "update reader set fio = ?, adress = ?, number_phone = ?, date_birh = ?, education = ?, number_pasport = ? where number_ticket = ?";

  $result = $db->prepare($query);
  $result->execute([
    $_POST["fio"],
    $_POST["adress"],
    $_POST["number_phone"],
    $_POST["date_birh"],
    $_POST["education"],
    $_POST["number_pasport"],
    $_POST["number_ticket"]
  ]);
}

header("Location: add.php?tab=readers");
?>
