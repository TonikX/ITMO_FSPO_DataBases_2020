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

	<h2>Добавить в таблицу "OrderContract"</h2>
	

    <h3>Введите данные:</h3>
    <form name="insert" action="ordercontract.php" method="POST">
    AdminName:<br>
    <input type="text" name="AdminName"/><br>
    StaffName:<br>
	<input type="text" name="StaffName"/><br>
	Status:<br>
	<select name="Status">
		<option value="Active">Active</option>
		<option value="Rejected">Rejected</option>
		<option value="Finished">Finished</option>
	</select><br>
	Salary:<br>
	<input type="int" name="Salary"/><br>
    <button type = "submit">Добавить запись</button>
    </form>
    <br>
    <?php
	
        include "../bdapi.php";
		
		$bd = bd_myconnect();
		
		if($_POST!=NULL){
			bd_add($bd,'hotel.OrderContract',$_POST);
			$_POST = NULL;
        }
		
		
		bd_close($bd);
    ?>
    </body>
</html>