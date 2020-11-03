<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'Biblioteka';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");

if (isset( $_POST['edit'])){

   $query = "update book set name = '$_POST[name]', author='$_POST[author]', publishing_house='$_POST[publishing_house]',
   year_publishing='$_POST[year_publishing]', section='$_POST[section]', chislo_exempl_v_kajdom_zale='$_POST[chislo_exempl_v_kajdom_zale]' where
   shifr_knigi = '$_POST[shifr_knigi]'";
pg_query($db, $query);
}

header('Location: /projects/index1.php');

?>
