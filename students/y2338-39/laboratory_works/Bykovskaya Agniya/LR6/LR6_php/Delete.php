<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'Biblioteka';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");

if (isset( $_GET['del'])){
  $del = $_GET['del'];

$query = 'DELETE FROM "book" WHERE "shifr_knigi" = '.$del.'';
pg_query($db, $query) or die(pg_error($db));
}

header('Location: /projects/index1.php');
?>
