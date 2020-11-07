<?php
    require_once "./Database.php";

    $db = Database::getInstance();

    $query = '
        SELECT book."Shifr_knigi", book."Name", book."Author"
        FROM public."Book" as book
        WHERE book."Shifr_knigi" IN (
            SELECT poluchenie_exemplyara_knigi."Shifr_knigi" 
            FROM public."Poluchenie_exemplyara_knigi" as poluchenie_exemplyara_knigi
            WHERE poluchenie_exemplyara_knigi."Shifr_knigi" IN (
                SELECT Poluchenie_knigi."Shifr_knigi" 
                FROM public."Poluchenie_knigi" as Poluchenie_knigi
            )
        )
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
            <h1 class="container-title">Информация обо всех выданных книгах</h1>

            <div class="table">
                <div class="row table-heading">
                    <div class="value">Id книги</div>
                    <div class="value">Name</div>
                    <div class="value">Author</div>
                </div>

                <?php foreach ($data as $row): ?>
                    <div class="row">
                        <div class="value"><?php echo $row['Shifr_knigi']; ?></div>
                        <div class="value"><?php echo $row['Name']; ?></div>
                        <div class="value"><?php echo $row['Author']; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </body>
</html>
