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
  $query2 = "insert into book(name, year_edition, authors, number_instance, date_create) values(?, ?, ?, ?, ?)";

  $result = $db->prepare($query2);

  $result->execute([
    $_POST["name"],
    $_POST["year_edition"],
    $_POST["authors"],
    $_POST["number_instance"],
    $_POST["date_create"]
  ]);
}
if (isset($_POST['del'])) {
  $query ="delete from book where id_book = ?";
  $result = $db->prepare($query);
  $result->execute([
    $_POST["id_book"]
  ]);
}

if(isset($_POST['ch'])){
  $query = "update book set name = ?, year_edition = ?, authors = ?, number_instance = ?,date_create = ? where id_book = ?";

  $result = $db->prepare($query);
  $result->execute([
    $_POST["name"],
    $_POST["year_edition"],
    $_POST["authors"],
    $_POST["number_instance"],
    $_POST["date_create"],
    $_POST["id_book"],
  ]);
}

header("Location: add.php?tab=books");
?>
