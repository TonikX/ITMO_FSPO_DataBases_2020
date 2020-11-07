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

	<h2>Добавить в таблицу "Cleaning"</h2>
	

    <h3>Введите данные:</h3>
    <form name="insert" action="cleaning.php" method="POST">
    RoomNumber:<br>
    <input type="int" name="RoomNumber"/><br>
    AdminName:<br>
    <input type="text" name="AdminName"/><br>
    Staffname:<br>
	<input type="text" name="Staffname"/><br>
	Status:<br>
	<select name="Status">
		<option value="Active">Active</option>
		<option value="Rejected">Rejected</option>
		<option value="Finished">Finished</option>
	</select><br>
	CleaningDate:<br>
	<input type="date" name="CleaningDate"/><br>
	Time:<br>
	<input type="text" name="Time"/><br>
	Floor:<br>
	<input type="int" name="Floor"/><br>
    <button type = "submit">Добавить запись</button>
    </form>
    <br>
    <?php
	
        include "../bdapi.php";
		
		$bd = bd_myconnect();
		
		if($_POST!=NULL){
			bd_add($bd,'hotel.Cleaning',$_POST);
			$_POST = NULL;
        }
		
		
		bd_close($bd);
    ?>
    </body>
</html>