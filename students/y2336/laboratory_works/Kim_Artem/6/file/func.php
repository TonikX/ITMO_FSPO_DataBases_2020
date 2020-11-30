<?php

$dbuser = 'postgres';
$dbpass = '123';
$host = 'localhost';
$dbname='postgres';

try {
	$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);	
} catch (PDOException $e) {
	die($e->getMessage());
}

if (isset($_POST['submit'])) {

	$name = $_POST['name'];
	$age = $_POST['age'];
	$position = $_POST['position'];
	$salary = $_POST['salary'];


	$sql = ("INSERT INTO \"worker\"(\"name\",\"age\",\"position\",\"salary\") VALUES(?,?,?,?)");
	$query = $pdo->prepare($sql);
	$query->execute([$name, $age,$position,$salary,]);
	$success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Данные успешно отправлены!</strong> Вы можете закрыть это сообщение.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	
}

$sql = $pdo->prepare("SELECT * FROM \"worker\"");
$sql->execute();
$result = $sql->fetchAll();

if (isset($_POST['edit-submit'])) {
	$edit_name = $_POST['edit_name'];
	$edit_age = $_POST['edit_age'];
	$edit_position = $_POST['edit_position'];
	$edit_salary = $_POST['edit_salary'];
	$get_id = $_GET['id']; 

	$sqll = "UPDATE \"worker\" SET \"name\"=?, \"age\"=?, \"position\"=?, \"salary\"=? WHERE id=?";
	$querys = $pdo->prepare($sqll);
	$querys->execute([$edit_name, $edit_age, $edit_position,$edit_salary,$get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['delete_submit'])) {

	$get_id = $_GET['id']; 

	$sql = "DELETE FROM \"worker\" WHERE id=?";
	$query = $pdo->prepare($sql);
	$query->execute([$get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}

?>