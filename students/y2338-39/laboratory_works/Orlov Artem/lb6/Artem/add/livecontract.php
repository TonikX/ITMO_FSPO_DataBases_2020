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

	<h2>Добавить в таблицу "LivingContract"</h2>
	

    <h3>Введите данные:</h3>
    <form name="insert" action="livecontract.php" method="POST">
    AdminName:<br>
    <input type="text" name="AdminName"/><br>
    ClientName:<br>
	<input type="text" name="ClientName"/><br>
	RoomNumber:<br>
	<input type="int" name="RoomNumber"/><br>
	ContractNumber:<br>
	<input type="text" name="ContractNumber"/><br>
	LivingStatus:<br>
	<select name="LivingStatus">
		<option value="Transit">Transit</option>
		<option value="Evicted">Evicted</option>
		<option value="Populated">Populated</option>
	</select><br>
	ArrivalDate:<br>
	<input type="date" name="ArrivalDate"/><br>
	LivingTime:<br>
	<input type="int" name="LivingTime"/><br>
    <button type = "submit">Добавить запись</button>
    </form>
    <br>
    <?php
	
        include "../bdapi.php";
		
		$bd = bd_myconnect();
		
		if($_POST!=NULL){
			bd_add($bd,'hotel.LiveContract',$_POST);
			$_POST = NULL;
        }
		
		
		bd_close($bd);
    ?>
    </body>
</html>