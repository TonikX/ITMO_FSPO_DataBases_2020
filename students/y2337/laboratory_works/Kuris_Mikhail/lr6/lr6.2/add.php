<a href="/">Назад</a>

<h3>Добавление информации о номере</h3>

<form name="insert" action="add.php" method="POST">
Введите id_номера:<br>
<input type="text" name="Id_номера"><br>
Введите этаж:<br>
<input type="text" name="Этаж"><br>
Введите цену:<br>
<input type="text" name="Цена"><br>
Введите тип:<br>
<input type="text" name="Тип"><br>
<button type='submit'>Добавить запись</button>
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
        $result = pg_insert($db, "Номер", $_POST);
        echo "Успех!<br><br>";
} else $_POST = NULL;


echo "Номера:";
echo "<table border=1>
<tr><th>id_номера</th><th>Этаж</th><th>Цена</th><th>Тип</th></tr>";
        
$sql = 'SELECT * FROM "Номер"';
        
table($sql, $db);
        
echo "</table><br>";

?>



