<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='clinic';
$db = pg_connect("host=$host port=5432 dbname=$dbname user=$dbuser password=$dbpass");
if(isset($_POST['sub'])){
  $query2 = "insert into clinic.cabinet values('$_POST[c_number]', '$_POST[c_wt_start]',
  '$_POST[c_wt_end]', '$_POST[c_phone_num]')";
  $result = pg_query($db, $query2);
}
if (isset($_POST['del'])) {
  $query ="delete from clinic.cabinet where c_number = '$_POST[1]' ";
  $result = pg_query($db, $query);
}
if(isset($_POST['ch'])){
  $query = "update clinic.cabinet set c_wt_start ='$_POST[2]',  c_wt_end = '$_POST[3]',
  c_phone_num = '$_POST[4]' where c_number = '$_POST[1]'";
  $result = pg_query($db, $query);
}
?>
