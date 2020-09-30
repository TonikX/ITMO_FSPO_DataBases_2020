<?php

$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='12.03';

try {
	$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);	
} catch (PDOException $e) {
	die($e->getMessage());
}

if (isset($_POST['submit'])) {

	$name = $_POST['name'];
	$class = $_POST['class'];

	$sql = ("INSERT INTO \"Student\"(\"Name\",\"class_number\") VALUES(?,?)");
	$query = $pdo->prepare($sql);
	$query->execute([$name, $class,]);
	$success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Данные успешно отправлены!</strong> Вы можете закрыть это сообщение.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	
}

$sql = $pdo->prepare("SELECT * FROM \"Student\"");
$sql->execute();
$result = $sql->fetchAll();

if (isset($_POST['edit-submit'])) {
	$edit_name = $_POST['edit_name'];
	$edit_class = $_POST['edit_class'];
	$get_id = $_GET['student_id']; 

	$sqll = "UPDATE \"Student\" SET \"Name\"=?, class_number=? WHERE student_id=?";
	$querys = $pdo->prepare($sqll);
	$querys->execute([$edit_name, $edit_class,$get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['delete_submit'])) {

	$get_id = $_GET['student_id']; 

	$sql = "DELETE FROM \"Student\" WHERE student_id=?";
	$query = $pdo->prepare($sql);
	$query->execute([$get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}

?>