<!DOCTYPE html>
<html>
    <head>
		<title>BD 6.2</title>
         <meta charset="utf-8">
    </head>
    <body>
	
	<form action="index.html">
		<button type = "submit">Назад</button>
	</form><br>
	
	<h2>Вывести таблицу</h2>

    <h3>Введите данные:</h3>
    <form name="insert" action="sel.php" method="POST">
    Имя таблицы:<br>
    <input type="text" name="t_name"/><br>
    <button type = "submit">Вывести</button>
    </form>
    <br>
	
    <?php
		include "bdapi.php";
		
		$bd = bd_myconnect();
		
		if($_POST!=NULL){
			bd_sel($bd,$_POST["t_name"]);
			$_POST = NULL;
        }
		
		
		bd_close($bd);
    ?>
    </body>
</html>
