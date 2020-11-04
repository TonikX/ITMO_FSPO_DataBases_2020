<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='clinic';
$db = pg_connect("host=$host port=5432 dbname=$dbname user=$dbuser password=$dbpass");
if(isset($_POST['sub'])){
  $query2 = "insert into clinic.medical_card values('$_POST[mc_id]', '$_POST[mc_full_name]',
  '$_POST[mc_gender]', '$_POST[mc_dob]', '$_POST[mc_address]', '$_POST[mc_phone_num]')";
  $result = pg_query($db, $query2);
}
if (isset($_POST['del'])) {
  $query ="delete from clinic.medical_card where mc_id = '$_POST[1]' ";
  $result = pg_query($db, $query);
}
if(isset($_POST['ch'])){
  $query = "update clinic.medical_card set mc_full_name ='$_POST[2]',  mc_gender = '$_POST[3]',
  mc_dob = '$_POST[4]', mc_address = '$_POST[5]',
  mc_phone_num = '$_POST[6]' where mc_id = '$_POST[1]'";
  $result = pg_query($db, $query);
}
?>
