<!DOCTYPE html>
   <head>
		<title>Insert data to PostgreSQL with php</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style>
			li {listt-style: none;}
		</style>
   </head>
   <body>
	<h2>Enter book information</h2>
	<ul>
 	 <form name="insert_book" action="insert_book.php" method="POST" >
	  <li>ID:</li>
	  <li><input type="text" name="ID_Book" /></li>
	  <li>Author:</li>
	  <li><input type="text" name="Author_Book" /></li>
	  <li>Name:</li>
	  <li><input type="text" name="Name_Book" /></li>
	  <li>Pages count:</li>
	  <li><input type="text" name="Pages_Book" /></li>
	  <li>Pictures count:</li>
	  <li><input type="text" name="Pictures_Book" /></li>
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

$arg1 = $_POST['ID_Book'];
$arg2 = $_POST['Author_Book'];
$arg3 = $_POST['Name_Book'];
$arg4 = $_POST['Pages_Book'];
$arg5 = $_POST['Pictures_Book'];
$arg6 = $_POST['action'];
$select = $_POST['select'];


echo("row was ".$arg6. "<br/>");

$dbuser = 'danzolax';
$dbpass = '161200';
$host = 'localhost';
$dbname='zolax';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if($arg6 == "add"){
	$pdo->query("INSERT INTO public.\"Book\" VALUES ('$arg1', '$arg2','$arg3','$arg4','$arg5')");
}elseif($arg6 == "delete"){
	$pdo->query("delete from public.\"Book\" where \"ID_Book\" = '$arg1'");
}elseif($arg6 == "edit"){
	$pdo->query("update public.\"Book\" set \"Author_Book\" = '$arg2',
 \"Name_Book\" = '$arg3',
 \"Pages_Book\" = '$arg4',
 \"Pictures_Book\" = '$arg5'
  where \"ID_Book\" = '$arg1'");
}elseif($arg6 == "select"){
	$data1 = $pdo->query($select);
}
$data = $pdo->query('SELECT * FROM public."Book"');
echo("Books: <br/>");
foreach($data as $row){
	echo " ID: ".$row['ID_Book']. " ";	
	echo " Author: ".$row['Author_Book']. " ";
	echo " Name: ".$row['Name_Book']. " ";
	echo " Pages: ".$row['Pages_Book']. " ";
	echo " Pictures: ".$row['Pictures_Book']. "<br/>";
}

echo("Select: <br/>");
$data2 = $data1->fetchAll();
print_r($data2);
?>
