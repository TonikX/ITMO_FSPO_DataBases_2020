<?php
$dbuser = 'postgres';//данные для подключения
$dbpass = '123';//данные для подключения
$host = 'localhost';//данные для подключения
$dbname='project';//данные для подключения
$db = pg_connect("host=$host port=5433 dbname=$dbname user=$dbuser password=$dbpass");//подключение
if(isset($_POST['add'])) {//если пост адд то
  $query2 = "insert into oils(id, name, cost, count) values('$_POST[1]', '$_POST[2]', '$_POST[3]', '$_POST[4]')";//запрос на добавление
  $result = pg_query($db, $query2);//выполнение
}
elseif (isset($_POST['delete'])) {//если делит то
  $query ="delete from oils where id = '$_POST[1]' ";//запрос на удаление
  $result = pg_query($db, $query);//выполнение
}
if(isset($_POST['change'])) {//если чейндж то
  $query = "update oils set name = '$_POST[2]', cost = '$_POST[3]', count = '$_POST[4]' where id = '$_POST[1]'";//запрос на обновление
  $result = pg_query($db, $query);//выполнение
}
?>
