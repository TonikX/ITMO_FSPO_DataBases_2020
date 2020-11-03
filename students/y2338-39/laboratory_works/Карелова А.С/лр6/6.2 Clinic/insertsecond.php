<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='clinic';
$db = pg_connect("host=$host port=5432 dbname=$dbname user=$dbuser password=$dbpass");
if(isset($_POST['sub'])){
  $query2 = "insert into clinic.doctor values('$_POST[d_id]', '$_POST[d_full_name]',
  '$_POST[d_gender]', '$_POST[d_dob]', '$_POST[d_education]', '$_POST[d_profession]', '$_POST[d_phone_num]', '$_POST[d_address]')";
  $result = pg_query($db, $query2);
}
if (isset($_POST['del'])) {
  $query ="delete from clinic.doctor where d_id = '$_POST[1]' ";
  $result = pg_query($db, $query);
}
if(isset($_POST['ch'])){
  $query = "update clinic.doctor set d_full_name ='$_POST[2]',  d_gender = '$_POST[3]',
  d_dob = '$_POST[4]', d_education= '$_POST[5]', d_profession = '$_POST[6]', d_phone_num = '$_POST[7]',
  d_address = '$_POST[8]' where d_id = '$_POST[1]'";
  $result = pg_query($db, $query);
}
?>
