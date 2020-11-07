<!DOCTYPE html>
<html>
    <head>
        <title>BD 6.2</title>
            <meta charset="utf-8">
    </head>
    <body>
	<form action="../index.html">
		<button type = "submit">Назад</button>
	</form>	<br>

	<h2>Добавить в таблицу "Admin"</h2>
	

    <h3>Введите данные:</h3>
    <form name="insert" action="admin.php" method="POST">
    AdminName:<br>
    <input type="text" name="AdminName"/><br>
    Post:<br>
	<input type="text" name="Post"/><br>
	Education:<br>
	<input type="text" name="Education"/><br>
	PassportNumber:<br>
	<input type="text" name="PassportNumber"/><br>
	Experience:<br>
	<input type="int" name="Experience"/><br>
    <button type = "submit">Добавить запись</button>
    </form>
    <br>
    <?php
	
        include "../bdapi.php";
		
		$bd = bd_myconnect();
		
		if($_POST!=NULL){
			bd_add($bd,'hotel.Admin',$_POST);
			$_POST = NULL;
        }
		
		
		bd_close($bd);
    ?>
    </body>
</html>