<?php
    require_once "./Database.php";

    $db = Database::getInstance();

    $query = '
        SELECT reader."Fio", reader."Date_of_birth", visit."Room_number", visit."Number_visited"
        FROM public."Reader" as reader
        JOIN public."Visit" as visit ON(reader."Nomer_chit_bileta" = visit."Nomer_chit_bileta")
    ';

    $data = $db->query($query)->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title> Library</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container">
            <h1 class="container-title">Информация о читателях библиотеки и количестве посещений</h1>

            <div class="table">
                <div class="row table-heading">
                    <div class="value">FIO</div>
                    <div class="value">Date of birth</div>
                    <div class="value">Room number</div>
                    <div class="value">Number visited</div>
                </div>

                <?php foreach ($data as $row): ?>
                    <div class="row">
                        <div class="value"><?php echo $row['Fio']; ?></div>
                        <div class="value"><?php echo $row['Date_of_birth']; ?></div>
                        <div class="value"><?php echo $row['Room_number']; ?></div>
                        <div class="value"><?php echo $row['Number_visited']; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </body>
</html>
