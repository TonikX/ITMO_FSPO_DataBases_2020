<?php
$dbuser = 'postgres';
$dbpass = '123';
$host = '192.168.64.1';
$dbname='Bibl';
$db = pg_connect("host=$host port=5433 dbname=$dbname user=$dbuser password=$dbpass");
if(isset($_POST['sub'])){
  $query2 = "insert into reader values('$_POST[nt]', '$_POST[name]',
  '$_POST[ad]', '$_POST[np]', '$_POST[db]', '$_POST[ed]', '$_POST[npas]')";
  $result = pg_query($db, $query2);
}
if (isset($_POST['del'])) {
  $query ="delete from reader where number_ticket = '$_POST[1]' ";
  $result = pg_query($db, $query);
}
if(isset($_POST['ch'])){
  $query = "update reader set fio ='$_POST[2]', adress = '$_POST[3]',
  number_phone = '$_POST[4]', date_birh = '$_POST[5]',
  education = '$_POST[6]', number_pasport = '$_POST[7]' where number_ticket = '$_POST[1]'";
  $result = pg_query($db, $query);
}
?>
