<!DOCTYPE html>
<html>
    <head>
        <title>BD 6.2</title>
        <meta http-equiv="Content Type" content="text/html;charset=UNICODE" />
    </head>
    <body>

	<h2>Добавить в таблицу "Номер"</h2>
	
	<form action="../index.html">
		<button type = "submit"><-- Назад на главную</button>
	</form>
	<br>

    <h3>Введите данные:</h3>
    <form name="insert" action="admin.php" method="POST">
    Номер:<br>
    <input type="text" name="Номер"/><br>
    Стоимость:<br>
	<input type="text" name="Стоимость"/><br>

    <button type = "submit">Добавить запись</button>
    </form>
    <br>
    <?php
	
        include "../bdapi.php";
		
		$bd = bd_myconnect();
		
		if($_POST!=NULL){
			bd_sel($bd,'Номер',$_POST);
			$_POST = NULL;
        }
		
		
		bd_close($bd);
    ?>
    </body>
</html>