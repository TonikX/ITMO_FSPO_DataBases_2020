<!DOCTYPE html>
   <head>
		<title>Insert data to PostgreSQL with php</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style>
			li {listt-style: none;}
		</style>
   </head>
   <body>
	<h2>Enter manager information</h2>
	<ul>
 	 <form name="insert_manager" action="insert_manager.php" method="POST" >
	  <li>Manager ID:</li>
	  <li><input type="text" name="ID_manager" /></li>
	  <li>Manager FIO:</li>
	  <li><input type="text" name="FIO_manager" /></li>
	  <li>Manager stage:</li>
	  <li><input type="text" name="Stage_manager" /></li>
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
$arg1 = $_POST['ID_manager'];
$arg2 = $_POST['FIO_manager'];
$arg3 = $_POST['Stage_manager'];
$arg4 = $_POST['action'];
$select = $_POST['select'];
echo("row was ".$arg4. "<br/>");
$dbuser = 'danzolax';
$dbpass = '161200';
$host = 'localhost';
$dbname='zolax';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if($arg4 == "add"){
	$pdo->query("INSERT INTO public.\"Manager\" VALUES ('$arg1', '$arg2','$arg3')");
}elseif($arg4 == "delete"){
	$pdo->query("delete from public.\"Manager\" where \"ID_manager\" = '$arg1'");
}elseif($arg4 == "edit"){
	$pdo->query("update public.\"Manager\" set \"FIO_manager\" = '$arg2', \"Stage_manager\" = '$arg3' where \"ID_manager\" = '$arg1'");
}elseif($arg4 == "select"){
	$data1 = $pdo->query($select);
}
$data = $pdo->query('SELECT * FROM public."Manager"');
echo("Managers: <br/>");
foreach($data as $row){
	echo " ID: ".$row['ID_manager']. " ";	
	echo " FIO: ".$row['FIO_manager']. " ";
	echo " FIO: ".$row['Stage_manager']. "<br/>";
}
echo("Select: <br/>");
$data2 = $data1->fetchAll();
print_r($data2);
?>
