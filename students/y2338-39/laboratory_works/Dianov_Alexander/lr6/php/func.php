<?php

$dbuser = 'postgres';
$dbpass = '123';
$host = 'localhost';
$dbname='CellPhone';

try {
	$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);	
} catch (PDOException $e) {
	die($e->getMessage());
}

if (isset($_POST['submit'])) {

	$name = $_POST['name'];
	$price = $_POST['price'];


	$sql = ("INSERT INTO \"Product\"(\"name\",\"price\") VALUES(?,?)");
	$query = $pdo->prepare($sql);
	$query->execute([$name, $price,]);
	$success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Данные успешно отправлены!</strong> Вы можете закрыть это сообщение.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	
}

$sql = $pdo->prepare("SELECT * FROM \"Product\"");
$sql->execute();
$result = $sql->fetchAll();

if (isset($_POST['edit-submit'])) {
	$edit_name = $_POST['edit_name'];
	$edit_price = $_POST['edit_price'];
	$get_id = $_GET['id_phone']; 

	$sqll = "UPDATE \"Product\" SET \"name\"=?, price=? WHERE id_phone=?";
	$querys = $pdo->prepare($sqll);
	$querys->execute([$edit_name, $edit_price,$get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['delete_submit'])) {

	$get_id = $_GET['id_phone']; 

	$sql = "DELETE FROM \"Product\" WHERE id_phone=?";
	$query = $pdo->prepare($sql);
	$query->execute([$get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}

?>