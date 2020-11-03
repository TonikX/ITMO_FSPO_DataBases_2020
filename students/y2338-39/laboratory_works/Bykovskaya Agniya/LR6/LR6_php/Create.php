<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'Biblioteka';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");

if (isset( $_POST['sub'])){

$query = "insert into book values('$_POST[shifr_knigi]', '$_POST[name]', '$_POST[author]',
   '$_POST[publishing_house]', '$_POST[year_publishing]', '$_POST[section]', '$_POST[chislo_exempl_v_kajdom_zale]')";
pg_query($db, $query);
}

header('Location: /projects/index1.php');
?>
