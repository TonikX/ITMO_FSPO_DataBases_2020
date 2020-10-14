<?php
$dbuser = 'postgres';
$dbpass = '123';
$host = '192.168.64.1';
$dbname='Bibl';
$db = pg_connect("host=$host port=5433 dbname=$dbname user=$dbuser password=$dbpass");
if(isset($_POST['sub'])){
  $query2 = "insert into book values('$_POST[id_book]', '$_POST[name]',
  '$_POST[de]', '$_POST[aut]', '$_POST[ni]', '$_POST[dc]')";
  $result = pg_query($db, $query2);
}
if (isset($_POST['del'])) {
  $query ="delete from book where id_book = '$_POST[1]' ";
  $result = pg_query($db, $query);
}
if(isset($_POST['ch'])){
  $query = "update book set name ='$_POST[2]', year_edition = '$_POST[3]',
  authors = '$_POST[4]', number_instance = '$_POST[5]',
  date_create = '$_POST[6]' where id_book = '$_POST[1]'";
  $result = pg_query($db, $query);
}
?>
