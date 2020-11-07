<!DOCTYPE html>
<html>
    <head>
        <title>BD 6.2</title>
            <meta charset="utf-8">
    </head>
    <body>
    <form action="../index.html">
        <button type = "submit">Назад</button>
    </form> <br>

    <h2>Добавить в таблицу "Client"</h2>
    

    <h3>Введите данные:</h3>
    <form name="insert" action="client.php" method="POST">
    ClientName:<br>
    <input type="text" name="ClientName"/><br>
    PassportNumber:<br>
    <input type="text" name="PassportNumber"/><br>
    City:<br>
    <input type="text" name="City"/><br>
    <button type = "submit">Добавить запись</button>
    </form>
    <br>
    <?php
    
        include "../bdapi.php";
        
        $bd = bd_myconnect();
        
        if($_POST!=NULL){
            bd_add($bd,'hotel.Client',$_POST);
            $_POST = NULL;
        }
        
        
        bd_close($bd);
    ?>
    </body>
</html>