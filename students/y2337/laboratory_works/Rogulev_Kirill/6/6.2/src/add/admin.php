<!DOCTYPE html>
<html>
    <head>
        <title>BD 6.2</title>
        <meta http-equiv="Content Type" content="text/html;charset=UNICODE" />
    </head>
    <body>
	<form action="../index.html">
		<button type = "submit">Назад</button>
	</form>	<br>

	<h2>Добавить в таблицу "Админ гостиницы"</h2>
	

    <h3>Введите данные:</h3>
    <form name="insert" action="admin.php" method="POST">
    ФИО Админа:<br>
    <input type="text" name="ФИО Админа"/><br>
    Должность:<br>
	<input type="text" name="Должность"/><br>
	Время работы:<br>
	<input type="int" name="Время работы"/><br>
	Образование:<br>
    <input type="text" name="Образование"/><br>
	Номер паспорта:<br>
    <input type="int" name="Номер паспорта"/><br>
    <button type = "submit">Добавить запись</button>
    </form>
    <br>
    <?php
	
        include "../bdapi.php";
		
		$bd = bd_myconnect();
		
		if($_POST!=NULL){
			bd_sel($bd,'Админ гостиницы',$_POST);
			$_POST = NULL;
        }
		
		
		bd_close($bd);
    ?>
    </body>
</html>