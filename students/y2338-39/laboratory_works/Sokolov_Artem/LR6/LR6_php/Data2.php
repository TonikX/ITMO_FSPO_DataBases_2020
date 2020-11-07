<?php
    require_once "./Database.php";

    $db = Database::getInstance();

    $query = '
        SELECT book."Name", LENGTH(book."Name") as length
        FROM public."Book" as book
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
            <h1 class="container-title">Информация о количестве символов в названии книг</h1>

            <div class="table">
                <div class="row table-heading">
                    <div class="row">Name</div>
                    <div class="row">Length</div>
                </div>
                <?php foreach ($data as $row): ?>
                    <div class="row">
                        <div class="value"><?php echo $row['Name']; ?></div>
                        <div class="value"><?php echo $row['length']; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </body>
</html>
