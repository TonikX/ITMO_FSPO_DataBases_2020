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

	<h2>Добавить в таблицу "Room"</h2>
	

    <h3>Введите данные:</h3>
    <form name="insert" action="room.php" method="POST">
    RoomNumber:<br>
    <input type="text" name="RoomNumber"/><br>
    Type:<br>
	<input type="text" name="Type"/><br>
	Price:<br>
	<input type="int" name="Price"/><br>

    <button type = "submit">Добавить запись</button>
    </form>
    <br>
    <?php
	
        include "../bdapi.php";
		
		$bd = bd_myconnect();
		
		if($_POST!=NULL){
			bd_add($bd,'hotel.Room',$_POST);
			$_POST = NULL;
        }
		
		
		bd_close($bd);
    ?>
    </body>
</html>