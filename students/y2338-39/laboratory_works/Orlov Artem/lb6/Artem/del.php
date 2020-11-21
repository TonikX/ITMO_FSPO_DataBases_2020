<!DOCTYPE html>
<html>
    <head>
        <title>BD 6.2</title>
        <meta http-equiv="Content Type" content="text/html;charset=UNICODE" />
    </head>
    <body>
	<form action="index.html">
		<button type = "submit">Назад</button>
	</form>
	
	<h2>Удалить из таблицы</h2><br>

    <h3>Введите данные:</h3>
    <form name="insert" action="del.php" method="POST">
    Имя таблицы:<br>
    <input type="text" name="t_name"/><br>
    Имя поля:<br>
	<input type="text" name="field"/><br>
	Зачение поля:<br>
	<input type="text" name="value"/><br>
    <button type = "submit">Удалить запись</button>
    </form>
    <br>
    <?php
        include "bdapi.php";
		
		$bd = bd_myconnect();
		
		if($_POST!=NULL){
			bd_del($bd,$_POST["t_name"],$_POST["field"],$_POST["value"]);
			$_POST = NULL;
        }
		
		
		bd_close($bd);
    ?>
    </body>
</html>