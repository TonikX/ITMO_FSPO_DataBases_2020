<a href="/">Назад</a>

<h3>Удалить информацию о номере</h3>

<form name="insert" action="delete.php" method="POST">
Введите id_номера:<br>
<input type="text" name="Id_номера"><br>

<button type='submit'>Удалить</button>
</form>

<?php 

require_once('funcs.php');

$host = 'host=localhost';
$dbname= 'dbname=Hotel';
$dbuser = 'user=postgres';
$dbpass = 'password=password';
$db = pg_connect("$host $dbname $dbuser $dbpass");

if($_POST != NULL)
{
        
        $result = pg_delete($db, "Номер", $_POST);
        
        echo "Успех!<br><br>";
} 

echo "Номера:";
echo "<table border=1>
<tr><th>id_номера</th><th>Этаж</th><th>Цена</th><th>Тип</th></tr>";
        
$sql = 'SELECT * FROM "Номер"';
        
table($sql, $db);
        
echo "</table><br>";

?>



