<!DOCTYPE html>
   <head>
		<title>Insert data to PostgreSQL with php</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style>
			li {listt-style: none;}
		</style>
   </head>
   <body>
	<h2>Enter author information</h2>
	<ul>
 	 <form name="insert" action="insert.php" method="POST" >
	  <li>Author ID:</li>
	  <li><input type="text" name="ID_author" /></li>
	  <li>Author FIO:</li>
	  <li><input type="text" name="FIO_auuthor" /></li>
	  <li>Select:</li>
	  <li><input type="text" name="select" /></li>
	  <li>Action:</li>
      <li><input type="radio" name="action" value="add"/> add</li>
	  <li><input type="radio" name="action" value="delete"/> delete</li>
	  <li><input type="radio" name="action" value="edit"/> edit</li>
	  <li><input type="radio" name="action" value="select"/> select</li>
	  <li><input type="submit" /></li>
  	 </form>
	</ul>
   </body>
</html>
<?php 
ini_set('display_errors','Off');
$arg1 = $_POST['ID_author'];
$arg2 = $_POST['FIO_auuthor'];
$arg3 = $_POST['action'];
$select = $_POST['select'];
echo("row was ".$arg3. "<br/>");
$dbuser = 'danzolax';
$dbpass = '161200';
$host = 'localhost';
$dbname='zolax';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if($arg3 == "add"){
	$pdo->query("INSERT INTO public.\"Author\" VALUES ('$arg1', '$arg2')");
}elseif($arg3 == "delete"){
	$pdo->query("delete from public.\"Author\" where \"ID_author\" = '$arg1'");
}elseif($arg3 == "edit"){
	$pdo->query("update public.\"Author\" set \"FIO_auuthor\" = '$arg2' where \"ID_author\" = '$arg1'");
}elseif($arg3 == "select"){
	$data1 = $pdo->query($select);
}
$data = $pdo->query('SELECT * FROM public."Author"');
echo("Authors: <br/>");
foreach($data as $row){
	echo " ID: ".$row['ID_author']. " ";	
	echo " FIO: ".$row['FIO_auuthor']. "<br/>";
}

echo("Select: <br/>");
$data2 = $data1->fetchAll();
print_r($data2);

?>
